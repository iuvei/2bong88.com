<?php

class ProcessBetController extends Controller
{
	public $mainUrl;
	public $key;
	public $bong88;
	public function actionIndex()
	{
		$this->render('index');
	}

	public function init()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$this->mainUrl = $dataBong88->mainUrl;
		$this->bong88 = new Bong88();
		require_once(Yii::app()->basePath . '/components/ganon.php');
	
	}
	public function actionProcessBet()
	{
	
		
		//date_default_timezone_set("America/Anguilla");
		//$today = urlencode(date("m/d/Y"));
		//$dataPost = "mode=normal&selectDate=".$today."&sportType=&league=&SelectSport=1&SelectLeague=";
		//$data = $this->bong88->curl->post($this->mainUrl.'/Result.aspx',$dataPost);
		//echo $data;
		//$data =  $this->bong88->curl->getData($this->mainUrl.'/Result.aspx');
		//$data = file_get_contents('result.txt');
		date_default_timezone_set("America/Anguilla");
		$curl = new Curl;
		$url = ('http://www.365bong.com/result.aspx');
		if($url=="false")
			return "url error";
		
		$data = $curl->get($url);
		$html = str_get_dom($data);
		$totalText = $html->getplaintext();
		$criteria = new CDbCriteria();
		$criteria->condition = "lbloddsStatus = :st";
		$criteria->params = array(':st'=>'running');
		//$criteria->limit = 100;
		//$criteria->order = "timeBet ASC";
		$totalBetProcess = betData::model()->findAll($criteria);
		foreach($totalBetProcess as $key=>$bet)
		{
			
			$string = "";
			$string = $bet->lblHome." -vs- ".$bet->lblAway;
			
			if(strpos($totalText,$string)!==false)
			{
				
				$dataResult = $this->getResult($bet->lblHome,$bet->lblAway,$html);
				if($dataResult!='false' && ($dataResult['status']=="Completed" || $dataResult['status']=="Running"))
				{
				
					$this->totalWinLost($bet,$dataResult);
					
				
				}
				elseif(($dataResult['status']=="Refund" || $dataResult['status']=="Refund FT") && $dataResult!='false')
				{
				
					$user = User::model()->findByAttributes(array(
		
						'username'=>$bet->username,
					
					));
					if($user!=null)
					{
					
						$totalBet = $bet->BPstake;
						if($bet->oddsRequest<0)
							$user->betCredit = $totalBet*abs($bet->oddsRequest)+$user->betCredit;
						else
							$user->betCredit = $totalBet+$user->betCredit;
						
						//$user->balance = $totalBet+$user->balance;
						if($bet->oddsRequest<0)
							$user->outStanding = $user->outStanding - $bet->BPstake*abs($bet->oddsRequest);
						else
							$user->outStanding = $user->outStanding - $totalBet;
						if(!$user->save())
						{
						
							error_log('error from processBet with ID dataBet '.$dataBet->Id." and user: ".$user->Id );
							error_log("#######################");
							foreach($user->getErrors() as $errors)
							{
							
								foreach($errors as $error)
								{
								
									error_log($error);
								
								}
							
							}
							error_log("#######################");
							
						
						}
					
					}
					$bet->lbloddsStatus = 'Refund';
					$bet->winLost = 0;
					if($bet->save())
					{
						
						$time = strtotime("today");
						if($bet->lbloddsStatus!="running" && $bet->lbloddsStatus!="waiting" && $bet->lbloddsStatus!="canceled")
						{
							$statement = Statement::model()->findByAttributes(array(
							
								'username'=>$bet->username,
								'time'=>$time,
								'type'=>0,
							
							));
							if($statement==null)
							{
								
								$statement = new Statement;
								$statement->time = $time;
								$statement->username = $bet->username;
								$statement->type = 0;
								$statement->turnover = $bet->BPstake;
								$statement->credit   = $bet->winLost;
								$statement->com = 0;
								$statement->balance = $statement->credit + $statement->com;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
							else
							{
								$statement->turnover += $bet->BPstake;
								$statement->credit   += $bet->winLost;
								$statement->com = 0;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
						}
				//
					}
				
				
				}
				else
				{
				
					error_log("problem with bet Id: ".$bet->Id);
					error_log($dataResult['status']);
					//error_log($totalText);
					//error_log($string);
					error_log("###############################");
				
				}
			
			}
			else
			{
			
				error_log("failed string: ".$string." with bet Id: ".$bet->Id);
				
			
			}
			
			
		
		}
	
	}
	
	
	
	public function getResult($home,$away,$dataHtml)
	{
	
		$string = $home." -vs- ".$away;
		
		$table = $dataHtml(".oddsTable",0);
		if($table)
		{
		
			foreach($table('tr') as $tr)
			{
			
				foreach($tr('td') as $td)
				{
				
					if(strpos($td->getplaintext(),$string)!==false)
					{
					
						$haftTime = $tr('td',2);
						if($haftTime)
							$haftTime = $tr('td',2)->getplaintext();
						else
							return "false";
						
						$fullTime = $tr('td',3);
						if($fullTime)
							$fullTime = $tr('td',3)->getplaintext();
						else
							return "false";
						
						$status = $tr('td',4);
						if($status)
							$status = $tr('td',4)->getplaintext();
						else
							return "false";
						$dataGet = array(
						
							'haftTime'=>$haftTime,
							'fullTime'=>$fullTime,
							'status'=>$status,
						
						);
						
						return $dataGet;
					
					}
				
				}
			
			}
		
		}
		else
			return "false";
		
		
		
	
	}
	
	public function analyticBet($result,$currentScore)
	{
		
		$dataHaftTime = explode("-",$result['haftTime']);
		$dataFullTime = explode("-",$result['fullTime']);
		//ReGion HaftTime
		$scoreHomeHaft = $dataHaftTime[0]-$currentScore['home'];
		$scoreAwayHaft = $dataHaftTime[1]-$currentScore['away'];
		$diffScoreHaft = $scoreHomeHaft - $scoreAwayHaft;
		$totalScoreHaft = $scoreHomeHaft + $scoreAwayHaft;
		
		
		//Region FullTime//
		$scoreHomeFull = $dataFullTime[0]-$currentScore['home'];
		$scoreAwayFull = $dataFullTime[1]-$currentScore['away'];
		$diffScoreFull = $scoreHomeFull - $scoreAwayFull;
		$totalScoreFull = $scoreHomeFull + $scoreAwayFull;
		
		//End
		$data = array(
		
			'scoreHomeHaft'=>$scoreHomeHaft,
			'scoreAwayHaft'=>$scoreAwayHaft,
			'diffScoreHaft'=>$diffScoreHaft,
			'totalScoreHaft'=>$totalScoreHaft,
			'scoreHomeFull'=>$scoreHomeFull,
			'scoreAwayFull'=>$scoreAwayFull,
			'diffScoreFull'=>$diffScoreFull,
			'totalScoreFull'=>$totalScoreFull,
			
		
		);
		return $data;
		
	
	}
	
	public function totalWinLost($dataBet,$dataResult)
	{
	
		$typeBet = $dataBet->lblBetKind;
		$typeCom = "";
		$com = 0;
		$money = 0;
		$refund = 0;
		$lblBetKindValue = abs($dataBet->lblBetKindValue);
		$decBetKind = $lblBetKindValue - floor($lblBetKindValue);
		
		$intBetKind = floor($lblBetKindValue);
		
		$betKey = $dataBet->BPBetKey;
		$betKey = explode('_',$betKey);
		$betKey = $betKey[1];
		$totalBet = $dataBet->BPstake;
		$oddsValue = $dataBet->oddsRequest;
		$lblScoreValue = $dataBet->lblScoreValue;
		if($lblScoreValue=="")
			$lblScoreValue = "[0-0]";
		$lblScoreValue = str_replace(array('[',']'),'',$lblScoreValue);
		$lblScoreValue = explode('-',$lblScoreValue);
		$dataScore = array(
		
			'home'=>$lblScoreValue[0],
			'away'=>$lblScoreValue[1],
		
		);
		$dataMatch = $this->analyticBet($dataResult,$dataScore);
		$diffScoreFull = $dataMatch['diffScoreFull'];
		$diffScoreHaft = $dataMatch['diffScoreHaft'];
		
		$ddHandicap = $dataMatch['diffScoreFull'] + $dataBet->lblBetKindValue;
		$ddHiep1 = $dataMatch['diffScoreHaft'] + $dataBet->lblBetKindValue;
		$ddkHandicap = $dataBet->lblBetKindValue - $dataMatch['diffScoreFull'];
		$ddkHiep1 = $dataBet->lblBetKindValue - $dataMatch['diffScoreHaft'];
		
		
		
		if($typeBet=="Handicap" || $typeBet=="1H Handicap")
		{										
			if($betKey=='h')//Chọn đội nhà thắng
			{					
				if($typeBet=="Handicap" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")//Loại kèo chấp Toàn thời gian
				{					
					if($ddHandicap== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddHandicap== -0.25)
					{																				
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddHandicap== 0.25)							
					{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
					}
					elseif($ddHandicap> 0.25)
					{
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue);
						else $money = $totalBet;
					}
					else
					{
						if($oddsValue<0)
							$money = -$totalBet*abs($oddsValue);
						else
							$money = -$totalBet;
					}
				}
				
				
				elseif($typeBet=="1H Handicap" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")//Loại kèo chấp Hiệp 1
				{	
					if($ddHiep1== 0)
					{
							$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddHiep1== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
						elseif($ddHiep1== 0.25)							
							{							
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue)/2;
							else $money = $totalBet/2;
								$typeCom = "haft";							
							}
						elseif($ddHiep1> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
						else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
				}									
			}
			elseif($betKey=='a')//Chọn đội khách thắng
				{
					if($typeBet=="Handicap" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")//Loại kèo chấp Toàn thời gian
					{	
					if($ddkHandicap== 0)
					{
							$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddkHandicap== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddkHandicap== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddkHandicap> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
				}	
					if($typeBet=="1H Handicap" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")
				{
					if($ddkHiep1== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddkHiep1== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddkHiep1== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddkHiep1> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
				}				
			}
		
		}
		
		//Start Process User Data
		
		elseif($typeBet=="Over/Under" || $typeBet=="1H Over/Under")
		{
		
			
			$finalScore = str_replace(array('[',']'),'',$dataResult['fullTime']);
			$dataScoreFinal = explode("-",$finalScore);
			$homeScore = $dataScoreFinal[0];
			$awayScore = $dataScoreFinal[1];
			$totalScore = $homeScore+$awayScore;
			
			//Data Haft time
			$finalScoreHaft = str_replace(array('[',']'),'',$dataResult['haftTime']);
			$dataScoreFinalHaft = explode("-",$finalScoreHaft);
			$homeScoreHaft = $dataScoreFinalHaft[0];
			$awayScoreHaft = $dataScoreFinalHaft[1];
			$totalScoreHaft = $homeScoreHaft+$awayScoreHaft;
			
			$ddovertotal = $totalScore - $dataBet->lblBetKindValue;
			$ddundertotal = $dataBet->lblBetKindValue -$totalScore;
			$ddoverhaft = $totalScoreHaft - $dataBet->lblBetKindValue;
			$ddunderhaft = $dataBet->lblBetKindValue - $totalScoreHaft;
			
			
			if($typeBet=="Over/Under" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")//Tài xỉu toàn thời gian
			{
					if($dataBet->lblChoiceValue=="Over")
				{
					
						if($ddovertotal== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddovertotal== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddovertotal== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddovertotal> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
					
				}
				elseif($dataBet->lblChoiceValue=="Under")
				{
					
						if($ddundertotal== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddundertotal== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddundertotal== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddundertotal> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
					
				}
				
				
			}
				elseif($typeBet=="1H Over/Under" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")//Kèo hiệp 1
				{
				
					if($dataBet->lblChoiceValue=="Over")
					{
					
						if($ddoverhaft== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddoverhaft== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddoverhaft== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddoverhaft> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
					
					}
					elseif($dataBet->lblChoiceValue=="Under")
					{
					
						if($ddunderhaft== 0)
					{
						$refund = $totalBet;//Trả lại tiền
					}
					elseif($ddunderhaft== -0.25)
					{												
						if($oddsValue<0)
							$money = -($totalBet*abs($oddsValue)/2);
						else $money = -($totalBet/2);
							$typeCom = "haft";							
					}
					elseif($ddunderhaft== 0.25)							
						{							
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue)/2;
						else $money = $totalBet/2;
							$typeCom = "haft";							
							}
					elseif($ddunderhaft> 0.25)
						{
							if($oddsValue>0)
								$money = $totalBet*abs($oddsValue);
							else $money = $totalBet;
						}
					else
						{
							if($oddsValue<0)
								$money = -$totalBet*abs($oddsValue);
							else
								$money = -$totalBet;
						}
					
					}
				
				
				}
			
			
			
			
			
			
		}
		
		elseif($typeBet=="FT.1X2" || $typeBet=="1H 1X2")
		{
		
			
			$finalScore = str_replace(array('[',']'),'',$dataResult['fullTime']);
			$dataScoreFinal = explode("-",$finalScore);
			$homeScore = $dataScoreFinal[0];
			$awayScore = $dataScoreFinal[1];

			$diffScoreFull = $homeScore - $awayScore;
			//Data Haft time
			$finalScoreHaft = str_replace(array('[',']'),'',$dataResult['haftTime']);
			$dataScoreFinalHaft = explode("-",$finalScoreHaft);
			$homeScoreHaft = $dataScoreFinalHaft[0];
			$awayScoreHaft = $dataScoreFinalHaft[1];
			$diffScoreHaft = $homeScoreHaft - $awayScoreHaft;
			if($typeBet=="FT.1X2" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")
			{
			
				if($diffScoreFull>0)
				{
				
					if($betKey==1)
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
				elseif($diffScoreFull==0)
				{
				
					if($betKey=="x")
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
				elseif($diffScoreFull<0)
				{
				
					if($betKey==2)
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
			
			}
			elseif($typeBet=="1H 1X2" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")
			{
				
				if($diffScoreHaft>0)
				{
				
					if($betKey==1)
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
				elseif($diffScoreHaft==0)
				{
				
					if($betKey=="x")
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
				elseif($diffScoreHaft<0)
				{
				
					if($betKey==2)
						$money = $totalBet*$oddsValue;
					else $money = -$totalBet;
				
				}
			
			
			}
			else
			{
				
				error_log("failed type");
				
			}
		
		}
		
		elseif($typeBet=="Correct Score")
		{
		
			
			
			$finalScore = str_replace(array('[',']'),'',$dataResult['fullTime']);
			$dataScoreFinal = explode("-",$finalScore);
			$homeScore = $dataScoreFinal[0];
			$awayScore = $dataScoreFinal[1];
			$betScoreC = str_replace(array(' ','UP'),'',$dataBet->lblChoiceValue);
			$betScoreData = explode("-",$betScoreC);
			$homeBetScore = $betScoreData[0];
			$awayBetScore = $betScoreData[1];
			if(strpos($dataBet->lblChoiceValue,"UP")===false)
			{
			
				if($dataBet->lblChoiceValue==$finalScore)
				{
				
					$money = $totalBet*$oddsValue;
				
				}else $money = -$totalBet;
			
			}
			else
			{
			
				if($homeScore==$homeBetScore && $awayScore>=$awayBetScore)
					$money = $totalBet*$oddsValue;
				else
					$money = -$totalBet;
			
			}
		
		}
		elseif($typeBet=="Total Goal" || $typeBet=="1H Total Goal")
		{
		
			
			
			$finalScore = str_replace(array('[',']'),'',$dataResult['fullTime']);
			$dataScoreFinal = explode("-",$finalScore);
			$homeScore = $dataScoreFinal[0];
			$awayScore = $dataScoreFinal[1];
			$totalScore = $homeScore+$awayScore;
			
			//Data Haft time
			$finalScoreHaft = str_replace(array('[',']'),'',$dataResult['haftTime']);
			$dataScoreFinalHaft = explode("-",$finalScoreHaft);
			$homeScoreHaft = $dataScoreFinalHaft[0];
			$awayScoreHaft = $dataScoreFinalHaft[1];
			$totalScoreHaft = $homeScoreHaft+$awayScoreHaft;
			if($typeBet=="Total Goal" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")
			{
			
				if(strpos($dataBet->lblChoiceValue,"Over")!==false)
				{
				
					//error_log($dataBet->lblChoiceValue);
					$dataBetChoice = str_replace("&amp;Over","",$dataBet->lblChoiceValue);
					if($totalScore>=$dataBetChoice)
						$money = $totalBet*$oddsValue;
					else
						$money = -$totalBet;
						
					
				
				}
				else
				{
				
					//error_log($dataBet->lblChoiceValue);
					$dataBetChoice = explode("-",$dataBet->lblChoiceValue);
					
					if($totalScore>=$dataBetChoice[0] && ($totalScore<=$dataBetChoice[1]))
						$money = $totalBet*$oddsValue;
					else
						$money = -$totalBet;
				
				}
			
			}
			elseif($typeBet=="1H Total Goal" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")
			{
				
				if(strpos($dataBet->lblChoiceValue,"Over")!==false)
				{
				
					
					$dataBetChoice = str_replace("&Over","",$dataBet->lblChoiceValue);
					if($totalScoreHaft>=$dataBetChoice)
						$money = $totalBet*$oddsValue;
					else
						$money = -$totalBet;
					
				
				}
				else
				{
				
					$dataBetChoice = explode("-",$dataBet->lblChoiceValue);
					
					if($totalScoreHaft>=$dataBetChoice[0] && ($totalScoreHaft<=$dataBetChoice[1]))
						$money = $totalBet*$oddsValue;
					else
						$money = -$totalBet;
				
				}
			
			}
		
		}
		elseif($typeBet=="Odd/Even" || $typeBet=="1H Odd/Even")
		{
		
			$finalScore = str_replace(array('[',']'),'',$dataResult['fullTime']);
			$dataScoreFinal = explode("-",$finalScore);
			$homeScore = $dataScoreFinal[0];
			$awayScore = $dataScoreFinal[1];
			$totalScore = $homeScore+$awayScore;
			
			//Data Haft time
			$finalScoreHaft = str_replace(array('[',']'),'',$dataResult['haftTime']);
			$dataScoreFinalHaft = explode("-",$finalScoreHaft);
			$homeScoreHaft = $dataScoreFinalHaft[0];
			$awayScoreHaft = $dataScoreFinalHaft[1];
			$totalScoreHaft = $homeScoreHaft+$awayScoreHaft;
			if($typeBet=="Odd/Even" && $dataResult['status']=="Completed" && $dataResult['fullTime']!="-")
			{
			
				if($dataBet->lblChoiceValue=="Odd")
				{
				
					if($totalScore%2!=0)
					{
					
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue);
						else $money = $totalBet;
					
					}
					else
					{
					
						if($oddsValue<0)
							$money = -$totalBet*abs($oddsValue);
						else $money = -$totalBet;
					
					}
				
				}
				else
				{
				
				
					if($totalScore%2==0)
					{
					
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue);
						else $money = $totalBet;
					
					}
					else
					{
					
						if($oddsValue<0)
							$money = -$totalBet*abs($oddsValue);
						else $money = -$totalBet;
					
					}
				
				
				}
			
			}
			elseif($typeBet=="1H Odd/Even" && ($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-")
			{
			
				if($dataBet->lblChoiceValue=="Odd")
				{
				
					if($totalScoreHaft%2!=0)
					{
					
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue);
						else $money = $totalBet;
					
					}
					else
					{
					
						if($oddsValue<0)
							$money = -$totalBet*abs($oddsValue);
						else $money = -$totalBet;
					
					}
				
				}
				else
				{
				
				
					if($totalScoreHaft%2==0)
					{
					
						if($oddsValue>0)
							$money = $totalBet*abs($oddsValue);
						else $money = $totalBet;
					
					}
					else
					{
					
						if($oddsValue<0)
							$money = -$totalBet*abs($oddsValue);
						else $money = -$totalBet;
					
					}
				
				
				}
			
			
			}
		
		}
		else
		{
		
			
			error_log("Type bet error");
		
		}
		if( (($typeBet=="Handicap" || $typeBet=="Over/Under" || $typeBet=="FT.1X2" || $typeBet=="Correct Score" || $typeBet=="Total Goal" || $typeBet=="Odd/Even") && ($dataResult['status']=="Completed" && $dataResult['fullTime']!="-"))
			|| (($typeBet=="1H Handicap" || $typeBet=="1H Over/Under" || $typeBet=="1H 1X2" || $typeBet=="1H Total Goal" || $typeBet=="1H Odd/Even") && (($dataResult['status']=="Running" || $dataResult['status']=="Completed") && $dataResult['haftTime']!="-"))
			
		)
		{
			
			$user = User::model()->findByAttributes(array(
			
				'username'=>$dataBet->username,
			
			));
			
			if($user!=null)
			{
			
				
				if($money!=0)
				{
					
					$com = ($typeCom=="")?($totalBet*0.25/100):($totalBet*0.25/100/2);
				
				}
				else
					$com = 0;
				if(strpos($typeBet,"Handicap")!==false || strpos($typeBet,"Over")!==false || strpos($typeBet,"Odd/Even")!==false)
				{
					
					if($dataBet->oddsType==4 || $dataBet->oddsType==2)//Odds My Or HK
					{
						if($dataBet->oddsRequest<0)
						{
							if($money > 0)
								$user->betCredit = $money+$user->betCredit+$com+$dataBet->BPstake*abs($dataBet->oddsRequest);
							elseif($money < 0)
								$user->betCredit = $user->betCredit+$com+$dataBet->BPstake*abs($dataBet->oddsRequest)+$money;
							else
								$user->betCredit += $dataBet->BPstake*abs($dataBet->oddsRequest);
								
						}
						else
						{
							if($money > 0)
								$user->betCredit = $money+$user->betCredit+$com+$dataBet->BPstake;
							elseif($money < 0)
								$user->betCredit = $user->betCredit+$com+$dataBet->BPstake+$money;
							else
								$user->betCredit += $dataBet->BPstake;
						}
						
						$user->balance = $money+$user->balance+$com;
						if($dataBet->oddsRequest<0)
						{	
							$user->outStanding = $user->outStanding - $dataBet->BPstake*abs($dataBet->oddsRequest);
						}
						else
						{
							$user->outStanding = $user->outStanding - $totalBet;
						}
					
					}
					elseif($dataBet->oddsType==1)//Odd DECS
					{
					
						if($money>0)
						{
							$user->betCredit = $money+$user->betCredit+$com;
							$user->balance = $money+$user->balance+$com - $totalBet;
						}
						elseif($money<0)
						{
						
							$user->betCredit = $user->betCredit+$com;
							$user->balance = $money+$user->balance+$com;
						}
						
						$user->outStanding = $user->outStanding - $totalBet;
					
					}
				}
				else
				{
				
					if($money>0)
					{
					
						$user->betCredit = $money + $user->betCredit+$com;
						$user->balance = $money+$user->balance+$com - $totalBet;
						$user->outStanding = $user->outStanding - $totalBet;
					}
					elseif($money<0)
					{
					
						$user->betCredit = $user->betCredit+$com;
						$user->balance = $money+$user->balance+$com;
						$user->outStanding = $user->outStanding - $totalBet;
					
					}
					
				
				}
				
				if(!$user->save())
				{
				
					error_log('error from processBet with ID dataBet '.$dataBet->Id." and user: ".$user->Id );
					error_log("#######################");
					foreach($user->getErrors() as $errors)
					{
					
						foreach($errors as $error)
						{
						
							error_log($error);
						
						}
					
					}
					//error_log(json_encode($user->getErrors()));
					error_log("#######################");
					return;
				
				}
			
			}
			if($refund==0)
			{
				if($money>0)
					$dataBet->lbloddsStatus = 'win';
				elseif($money<0)
					$dataBet->lbloddsStatus = 'lost';
				else
					$dataBet->lbloddsStatus = 'Draw';
			}
			else
				$dataBet->lbloddsStatus = 'Draw';
			if(strpos($typeBet,"Handicap")!==false || strpos($typeBet,"Over")!==false || strpos($typeBet,"Odd/Even")!==false)
			{
				if($dataBet->oddsType==4  )//Odds My Or HK
				{
					
					$dataBet->winLost = $money;
				}
				elseif($dataBet->oddsType==2)
				{
				
					$dataBet->winLost = $money;
				
				}
				elseif($dataBet->oddsType==1)//DECS
				{
				
					if($money>0)
						$dataBet->winLost = $money - $totalBet;
					else
						$dataBet->winLost = $money;
				
				}
			}
			else
			{
				if($money>0)
					$dataBet->winLost = $money - $totalBet;
				else
					$dataBet->winLost = $money;
			}
			$dataBet->fullScore = $dataResult['fullTime'];
			$dataBet->haftScore = $dataResult['haftTime'];
			$dataBet->com = $com;
			if(!$dataBet->save())
			{
			
				error_log("bet save error!!!");
				foreach($dataBet->getErrors() as $errors)
				{
				
					foreach($errors as $error)
					{
					
						error_log($error);
					
					}
				
				}
			
			}
			else
			{
				
				$time = strtotime("today");
				if($dataBet->lbloddsStatus!="running" && $dataBet->lbloddsStatus!="waiting" && $dataBet->lbloddsStatus!="canceled")
				{
					$statement = Statement::model()->findByAttributes(array(
					
						'username'=>$dataBet->username,
						'time'=>$time,
						'type'=>0,
					
					));
					if($statement==null)
					{
						
						$statement = new Statement;
						$statement->time = $time;
						$statement->username = $dataBet->username;
						$statement->type = 0;
						$statement->turnover = $dataBet->BPstake;
						$statement->credit   = $dataBet->winLost;
						if($dataBet->winLost!=0)
						{
							$statement->com = $com;
						}
						else
							$statement->com = 0;
						$statement->balance = $statement->credit + $statement->com;
						if(!$statement->save())
						{
							foreach($statement->getErrors() as $errors)
							{
								foreach($errors as $error)
								{
									error_log($error);
								}
							}
						}
						
					}
					else
					{
						$statement->turnover += $dataBet->BPstake;
						$statement->credit   += $dataBet->winLost;
						if($dataBet->winLost!=0)
						{
							$statement->com += $com;
						}
						$statement->balance = $statement->credit + $statement->com;
						if(!$statement->save())
						{
							foreach($statement->getErrors() as $errors)
							{
								foreach($errors as $error)
								{
									error_log($error);
								}
							}
						}
						
					}
				}
		//
			}
			
		}
		else
		{
			error_log("Fales Bet Type!!!!!!!!!!!!!!!!!!!!!!!==>".$typeBet."===>".$dataBet->Id);
		}
		//return;
	
	}
	
	
	public function actionProcessBetYestoday()
	{
	
		date_default_timezone_set("America/Anguilla");
		$curl = new Curl;
		$url = ('http://www.365bong.com/result.aspx');
		if($url=="false")
			return "url error";
		
		$yesToday = urlencode(date("n/d/Y",strtotime("yesterday")));
		$dataPost = "mode=normal&selectDate=".$yesToday."&sportType=1&league=&SelectSport=1&SelectLeague=";
		$data = $curl->post($url,$dataPost);
		
		
		//$data = file_get_contents('result.txt');
		$criteria = new CDbCriteria();
		$criteria->condition = "lbloddsStatus = :st";
		$criteria->params = array(':st'=>'running');
		$criteria->limit = 200;
		$criteria->order = "timeBet ASC";
		$totalBet = betData::model()->findAll($criteria);
		
		$html = str_get_dom($data);
		$totalText = $html->getplaintext();
		//error_log($totalText);
		foreach($totalBet as $bet)
		{
		
			$string = "";
			$string = $bet->lblHome." -vs- ".$bet->lblAway;
			
			if(strpos($totalText,$string)!==false)
			{
				
				
				$dataResult = $this->getResult($bet->lblHome,$bet->lblAway,$html);
				echo '<pre>';
				print_r($dataResult);
				echo '</pre>';
				if($dataResult!='false' && $dataResult['status']=="Completed")
				{
				
					$this->totalWinLost($bet,$dataResult);
					
				
				}
				elseif($dataResult!='false' && $dataResult['status']=="Refund")
				{
				
					$user = User::model()->findByAttributes(array(
		
						'username'=>$bet->username,
					
					));
					if($user!=null)
					{
					
						$totalBet = $bet->BPstake;
						if($bet->oddsRequest<0)
							$user->betCredit = $totalBet*abs($bet->oddsRequest)+$user->betCredit;
						else
							$user->betCredit = $totalBet+$user->betCredit;
						//$user->balance = $totalBet+$user->balance;
						if($bet->oddsRequest<0)
							$user->outStanding = $user->outStanding - $bet->BPstake*abs($bet->oddsRequest);
						else
							$user->outStanding = $user->outStanding - $totalBet;
						if(!$user->save())
						{
						
							error_log('error from processBet with ID dataBet '.$dataBet->Id." and user: ".$user->Id );
							error_log("#######################");
							foreach($user->getErrors() as $errors)
							{
							
								foreach($errors as $error)
								{
								
									error_log($error);
								
								}
							
							}
							error_log("#######################");
							return;
						
						}
					
					}
					$bet->lbloddsStatus = 'Refund';
					$bet->winLost = 0;
					if($bet->save())
					{
						
						$time = strtotime("today");
						if($bet->lbloddsStatus!="running" && $bet->lbloddsStatus!="waiting" && $bet->lbloddsStatus!="canceled")
						{
							$statement = Statement::model()->findByAttributes(array(
							
								'username'=>$bet->username,
								'time'=>$time,
								'type'=>0,
							
							));
							if($statement==null)
							{
								
								$statement = new Statement;
								$statement->time = $time;
								$statement->username = $bet->username;
								$statement->type = 0;
								$statement->turnover = $bet->BPstake;
								$statement->credit   = $bet->winLost;
								$statement->com = 0;
								$statement->balance = $statement->credit + $statement->com;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
							else
							{
								$statement->turnover += $bet->BPstake;
								$statement->credit   += $bet->winLost;
								if($bet->winLost!=0)
								{
									$statement->com += ($bet->BPstake*0.25/100);
								}
								$statement->balance = $statement->credit + $statement->com;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
						}
				//
					}
				
				}
			
			}
			else
			{
				echo 'not found '.$string."<br>";
			}
			
			
		
		}
	
	}
	
	public function actionProcessBetBeforeYestoday()
	{
	
		
		date_default_timezone_set("America/Anguilla");
		
		$curl = new Curl;
		$url = ('http://www.365bong.com/result.aspx');
		if($url=="false")
			return "url error";
		
		$beforeYesToday = urlencode(date("m/d/Y",strtotime("-48 hours")));
		$dataPost = "mode=normal&selectDate=".$beforeYesToday."&sportType=1&league=&SelectSport=1&SelectLeague=";
		$data = $curl->post($url,$dataPost);
		
		//$data = file_get_contents('result.txt');
		$criteria = new CDbCriteria();
		$criteria->condition = "lbloddsStatus = :st";
		$criteria->params = array(':st'=>'running');
		$criteria->limit = 30;
		$criteria->order = "timeBet ASC";
		$totalBet = betData::model()->findAll($criteria);
		
		$html = str_get_dom($data);
		$totalText = $html->getplaintext();
		foreach($totalBet as $bet)
		{
		
			$string = "";
			$string = $bet->lblHome." -vs- ".$bet->lblAway;
			
			
			
			if(strpos($totalText,$string)!==false)
			{
				
				$dataResult = $this->getResult($bet->lblHome,$bet->lblAway,$html);
				if($dataResult!='false' && $dataResult['status']=="Completed")
				{
				
					$this->totalWinLost($bet,$dataResult);
					
				
				}
				elseif($dataResult!='false' && $dataResult['status']=="Refund")
				{
				
					$user = User::model()->findByAttributes(array(
		
						'username'=>$bet->username,
					
					));
					if($user!=null)
					{
					
						$totalBet = $bet->BPstake;
						if($bet->oddsRequest<0)
							$user->betCredit = $totalBet*abs($bet->oddsRequest)+$user->betCredit;
						else
							$user->betCredit = $totalBet+$user->betCredit;
						//$user->balance = $totalBet+$user->balance;
						if($bet->oddsRequest<0)
							$user->outStanding = $user->outStanding - $bet->BPstake*abs($bet->oddsRequest);
						else
							$user->outStanding = $user->outStanding - $totalBet;
						if(!$user->save())
						{
						
							error_log('error from processBet with ID dataBet '.$dataBet->Id." and user: ".$user->Id );
							error_log("#######################");
							foreach($user->getErrors() as $errors)
							{
							
								foreach($errors as $error)
								{
								
									error_log($error);
								
								}
							
							}
							error_log("#######################");
							
						
						}
					
					}
					$bet->lbloddsStatus = 'Refund';
					$bet->winLost = 0;
					if($bet->save())
					{
						
						$time = strtotime("today");
						if($bet->lbloddsStatus!="running" && $bet->lbloddsStatus!="waiting" && $bet->lbloddsStatus!="canceled")
						{
							$statement = Statement::model()->findByAttributes(array(
							
								'username'=>$bet->username,
								'time'=>$time,
								'type'=>0,
							
							));
							if($statement==null)
							{
								
								$statement = new Statement;
								$statement->time = $time;
								$statement->username = $bet->username;
								$statement->type = 0;
								$statement->turnover = $bet->BPstake;
								$statement->credit   = $bet->winLost;
								$statement->com = 0;
								$statement->balance = $statement->credit + $statement->com;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
							else
							{
								$statement->turnover += $bet->BPstake;
								$statement->credit   += $bet->winLost;
								$statement->com = 0;
								if(!$statement->save())
								{
									foreach($statement->getErrors() as $errors)
									{
										foreach($errors as $error)
										{
											error_log($error);
										}
									}
								}
								
							}
						}
				//
					}
				
				
				}
			
			}
			
			
		
		}
	
	}
	
	public function actionresetBalance()
	{
	
		
	
	}
	/*
	public function actionDataRef()
	{
	
		$criteria = new CDbCriteria;
		$criteria->condition = "isRef = :is AND nextTimeCal <= :time";
		$criteria->params = array(":is"=>1,":time"=>time());
		$userRef = User::model()->findAll($criteria);
		if($userRef!=null)
		{
		
			$totalWinLost = 0;
			foreach($userRef as $user)
			{
			
				$criteria = new CDbCriteria;
				$criteria->select = array("username");
				$criteria->condition = "idRef = :id";
				$criteria->params = array(":id"=>$user->Id);
				$userChild = User::model()->findAll($criteria);
				if($userChild!=null)
				{
				
					foreach($userChild as $username)
					{
					
						$criteria = new CDbCriteria;
						$criteria->condition = "username = :username AND timeBet > :time AND lbloddsStatus = :lost";
						$criteria->params = array("username"=>$username->username,":time"=>$user->lastCalRef,":lost"=>"lost");
						$criteria->select = array("winLost");
						$dataBet = betData::model()->findAll($criteria);
						if($dataBet!=null)
						{
							
							foreach($dataBet as $bet)
							{
							
								
								$totalWinLost += abs($bet->winLost);
								
							
							}
						
						}
					
					}
				
				}
				$user->bonusBalance += ($totalWinLost*28/100);
				$user->lastCalRef = time();
				$user->nextTimeCal = time() + 60*60*24*30;
				$user->save();
			
			}
		
		}
		
	
	}
	*/
	public function ProcessWaitingNew()
	{
	
		//error_log("time boot: ".date("d/m/Y H:i:s"));
		$betData = betData::model()->findAllByAttributes(
			array(
		
				'lbloddsStatus'=>'waiting',
		
			),
			array(
			
				'limit'=>10,
				'order'=>'Id ASC',
			
			)
		
		
		);
		if($betData!=null)
		{
		
			
			//error_log(count($betData));
			foreach($betData as $bet)
			{
			
				
				$user = User::model()->findByAttributes(array(
				
					'username'=>$bet->username
				
				));
				if($user!=null)
				{
					
					
					
					$timeCheck = rand(15,30);
					if(time() - $bet->timeBet > $timeCheck)
					{
						
						$event = new EventB();
						$data = $event->AnalyTicOddsLive($bet->matchid);
						
						if($data!="false")
						{
						
							
							if($data['TimerSuspend']!=1 && $data['score']==$bet->lblScoreValue)
							{
							
								$bet->lbloddsStatus = "running";
								$bet->save();
							
							}
							else
							{
							
								$bet->lbloddsStatus = "canceled";
								$totalBet = $bet->BPstake;
								if($bet->oddsRequest<0)
									$user->betCredit = $totalBet*abs($bet->oddsRequest)+$user->betCredit;
								else
									$user->betCredit = $totalBet+$user->betCredit;
								//$user->balance = $totalBet+$user->balance;
								if($bet->oddsRequest<0)
									$user->outStanding = $user->outStanding - $bet->BPstake*abs($bet->oddsRequest);
								else
									$user->outStanding = $user->outStanding - $totalBet;
								$user->save();
								$bet->save();
							
							}
						
						}
						else
						{
						
							$bet->lbloddsStatus = "canceled";
							$totalBet = $bet->BPstake;
							if($bet->oddsRequest<0)
								$user->betCredit = $totalBet*abs($bet->oddsRequest)+$user->betCredit;
							else
								$user->betCredit = $totalBet+$user->betCredit;
							//$user->balance = $totalBet+$user->balance;
							if($bet->oddsRequest<0)
								$user->outStanding = $user->outStanding - $bet->BPstake*abs($bet->oddsRequest);
							else
								$user->outStanding = $user->outStanding - $totalBet;
							$user->save();
							$bet->save();
						
						}
						
					}
				
					
					
					
					
				}else error_log("user null");
			
			
			}
			
		
		}
		
		
	
	}
	public function ProcessWaitingBet()
	{
	
		error_log("time boot: ".date("d/m/Y H:i:s"));
		
		$betData = betData::model()->findAllByAttributes(
			array(
		
				'lbloddsStatus'=>'waiting',
		
			),
			array(
			
				'limit'=>10,
				'order'=>'Id ASC',
			
			)
		
		
		);
		if($betData!=null)
		{
		
			
			error_log(count($betData));
			foreach($betData as $bet)
			{
			
				
				$user = User::model()->findByAttributes(array(
				
					'username'=>$bet->username
				
				));
				if($user!=null)
				{
					
					if(time() - $bet->timeBet > 120)
					{
						
						$dataBong88 = tblBong88::model()->findByPk(1);
						$key = $dataBong88->key;
						$key = explode("-",$key);
						
						$bp_Match = $bet->BPBetKey."_".$bet->oddsRequest;
						$url = "autoLoad=yes&bp_Match=".$bp_Match."&UN=TV31288803A&bp_ssport=1&chk_BettingChange=4&".$key[0]."=".$key[1];
						$url = $this->mainUrl."BetProcess_Data.aspx?".$url;
						
						$data = $this->bong88->curl->getBetData($url);
						
						if($data!="")
						{
							//error_log($data);
							if(strpos($data,"SetConfirmBetResult")!==false)
							{
							
								$bet->lbloddsStatus = "canceled";
								$user->betCredit = $user->betCredit + $bet->BPstake;
								$user->outStanding = $user->outStanding - $bet->BPstake;
								$user->save();
								$bet->save();
							
							}
							$lbloddsStatus = $this->GetCaptcha("\'lbloddsStatus\'\:\'","',",$data);
							$dataOdds = $this->GetCaptcha("\'lblOddsValue\'\:\'","',",$data);
							$dataMatchId = $this->GetCaptcha("\'lblOddsValue\'\:\'","',",$data);
							if($lbloddsStatus=="running")
							{
							
								$bet->lbloddsStatus = "running";
								$bet->save();
							
							}
							else
							{
							
								$bet->lbloddsStatus = "canceled";
								$user->betCredit = $user->betCredit + $bet->BPstake;
								$user->outStanding = $user->outStanding - $bet->BPstake;
								$user->save();
								$bet->save();
							
							}
						
						}
						else
						{
						
							$bet->lbloddsStatus = "canceled";
							$user->betCredit = $user->betCredit + $bet->BPstake;
							$user->outStanding = $user->outStanding - $bet->BPstake;
							$user->save();
							$bet->save();
						
						}
						
					}
					
					else
					{
				
						$event = new EventCreation();
						$matchid = $bet->matchid;
						$dataEvent = $event->eventCreateTionRun($matchid,$bet->username,$bet->Id);
						if($dataEvent=="okie")
						{
						
							$bet->lbloddsStatus = "running";
							$bet->save();
							//$event->CreateObjectS888bet($bet->username)->clearCookie();
						
						}
						elseif($dataEvent=="sleep")
						{
							
							
						
						}
						else
						{
						
							error_log("event false");
							if(time() - $bet->timeBet > 90)
							{
								
								$dataBong88 = tblBong88::model()->findByPk(1);
								$key = $dataBong88->key;
								$key = explode("-",$key);
								
								$bp_Match = $bet->BPBetKey."_".$bet->oddsRequest;
								$url = "autoLoad=yes&bp_Match=".$bp_Match."&UN=TV31288803A&bp_ssport=1&chk_BettingChange=4&".$key[0]."=".$key[1];
								$url = $this->mainUrl."BetProcess_Data.aspx?".$url;
								
								$data = $this->bong88->curl->getBetData($url);
								
								if($data!="")
								{
								
									
									if(strpos($data,"SetConfirmBetResult")!==false)
									{
									
										$bet->lbloddsStatus = "canceled";
										$user->betCredit = $user->betCredit + $bet->BPstake;
										$user->outStanding = $user->outStanding - $bet->BPstake;
										$user->save();
										$bet->save();
									
									}
									$lbloddsStatus = $this->GetCaptcha("\'lbloddsStatus\'\:\'","',",$data);
									$dataOdds = $this->GetCaptcha("\'lblOddsValue\'\:\'","',",$data);
									$dataMatchId = $this->GetCaptcha("\'lblOddsValue\'\:\'","',",$data);
									if($lbloddsStatus=="running")
									{
									
										$bet->lbloddsStatus = "running";
										$bet->save();
									
									}
									else
									{
									
										$bet->lbloddsStatus = "canceled";
										$user->betCredit = $user->betCredit + $bet->BPstake;
										$user->outStanding = $user->outStanding - $bet->BPstake;
										$user->save();
										$bet->save();
									
									}
								
								}
								else
								{
								
									$bet->lbloddsStatus = "canceled";
									$user->betCredit = $user->betCredit + $bet->BPstake;
									$user->outStanding = $user->outStanding - $bet->BPstake;
									$user->save();
									$bet->save();
								
								}
								
							}
						
						}
						
					}
					
				}else error_log("user null");
			
			
			}
			
		
		}else error_log("nulled");
		
	}
	
	public function actionWaitingBet()
	{
	
		
		$i = 0;
		for ($i = 0; $i <=60; ++$i)
		{
		
			$this->ProcessWaitingNew();
			sleep(5);
			$i+=5;
		
		}
		
	
	}
	
	public function GetCaptcha($start,$end,$str)
	{
		
		
		$matches = array();
		$regex = "~$start(.*)$end~";
		preg_match_all($regex, $str, $matches);
		return $matches[1][0];
		
		
	}
	public function getOnProcessMatch($idMatch)
	{
	
		$api_cache_id = 'cache_onProcess_match';

		// Attempt to load the data from the cache, based on the key
		$apidata = Yii::app()->cache->get( $api_cache_id  );

		// If the results were false, then we have no valid data, 
		// so load it
		if($apidata===false)
		{
			// No valid cached data was found, so we will generate it.
			$apidata = $idMatch.",";
			
			// Store the data into the cache and allow it to be
			// valid for 1 hour (3600 seconds)
			Yii::app()->cache->set( $api_cache_id , $apidata, 180 );
		}
		return $apidata;

	
	}
	public function actionGetHotNew()
	{
		
		$data = $this->bong88->curl->get($this->mainUrl.'/topmenu.aspx');
		$html = str_get_dom($data);
		$message = $html("marquee#Hotnews",0);
		if($message)
		{
		
			$text = $message->getplaintext();
			
			$criteria = new CDbCriteria;
			$criteria->limit = 1;
			$criteria->order = "Id DESC";
			
			$lastHot = hotNew::model()->findAll($criteria);
			if($lastHot!=null)
			{
			
				if($lastHot[0]->content!=$text)
				{
				
					$hotNew = new hotNew;
					$hotNew->content = $text;
					$hotNew->timeAdd = time();
					$hotNew->save();
				
				}
			
			}
			else
			{
			
				$hotNew = new hotNew;
				$hotNew->content = $text;
				$hotNew->timeAdd = time();
				$hotNew->save();
			
			}
		
		}
	
	}
	public function actionStatementRes()
	{
		$thisH = date("H");
		$thisM = date("i");
		if($thisH=="00" && $thisM=="00")
		{  
			
			$timeToday = strtotime("yesterday");
			
			$statement = Statement::model()->findAllByAttributes(array(
			
				'time'=>$timeToday
			
			));
			if($statement!=null)
			{
				foreach($statement as $data)
				{
					$uStatement = new Statement;
					$uStatement->username = $data->username;
					$uStatement->time = $timeToday;
					$uStatement->turnover = -($data->balance);
					$uStatement->credit = -($data->balance);
					$uStatement->com = 0;
					$uStatement->balance = -($data->balance);
					$uStatement->type = 1;
					$uStatement->save();
					$user = User::model()->findByAttributes(array(
					
						'username'=>$data->username
					
					));
					if($user!=null)
					{
						$user->betCredit = $user->credit - $user->outStanding;
						$user->balance = 0;
						$user->save();
					}
				}
			}
			
		}
	}
	public function actionStatement()
	{
		$thisH = date("H");
		$thisM = date("i");
		if($thisH=="11" && $thisM=="00")
		{	
			$time = strtotime("yesterday");
			$timeToday = strtotime("today");
			
			$from = strtotime(date("m/d/Y",$time)." 11:00:00");
			$to = strtotime(date("m/d/Y",$timeToday)." 10:59:59");
			
			$criteria = new CDbCriteria;
			$criteria->select = array("username");
			$criteria->distinct = true;
			$criteria->condition = "timeBet >= :from AND timeBet <= :to AND lbloddsStatus != :stt1 AND lbloddsStatus != :stt2 AND lbloddsStatus != :stt3";
			$criteria->params = array(":from"=>$from,":to"=>$to,":stt1"=>"running",":stt2"=>"waiting",":stt3"=>"canceled");
			$betData = betData::model()->findAll($criteria);
			
			foreach($betData as $user)
			{
				$criteria2 = new CDbCriteria;
				
				$criteria2->condition = "timeBet >= :from AND timeBet <= :to AND username = :user AND lbloddsStatus != :stt1 AND lbloddsStatus != :stt2 AND lbloddsStatus != :stt3";
				$criteria2->params = array(":from"=>$from,":to"=>$to,":user"=>$user->username,":stt1"=>"running",":stt2"=>"waiting",":stt3"=>"canceled");
				$criteria2->select = array("BPstake","winLost","lbloddsStatus");
				$betBuyUser = betData::model()->findAll($criteria2);
				$totalBet = 0;
				$totalWinLost = 0;
				$com = 0;
				$final = 0;
				
				foreach($betBuyUser as $bet)
				{
					$totalBet += $bet->BPstake;
					$totalWinLost += $bet->winLost;
					if($bet->winLost > 0)
					{
						$com += $bet->BPstake*0.25/100;
					}
					
					
				}
				$final = $totalWinLost+$com;
				$statement = new Statement;
				$statement->username = $user->username;
				$statement->time = $timeToday;
				$statement->turnover = $totalBet;
				$statement->credit = $totalWinLost;
				$statement->com = $com;
				$statement->balance = $final;
				if($statement->save())
				{
					$user = User::model()->findByAttributes(array(
					
						'username'=>$user->username,
					
					));
					if($user!=null)
					{
						$user->balance = 0;
						$user->betCredit = $user->credit;
						$user->save();
					}
				}
				
				
			}
			
		}
	}
}