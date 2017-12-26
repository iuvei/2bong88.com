<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $mainUrl;
	public $key;
	public $bong88;
	public $layout = "//layouts/main";
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function init()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$this->mainUrl = $dataBong88->mainUrl;
		$this->bong88 = new Bong88();
		
		/*
		$file = file_get_contents($this->bong88->curl->cookie);
		preg_match_all("/ASP.NET_SessionId\s+[a-z0-9]+/",$file,$out,PREG_SET_ORDER);
		preg_match_all("/[a-z0-9]+/",$out[0][0],$re,PREG_SET_ORDER);
		$session = $re[2][0];
		
		Yii::app()->request->cookies['_SessionId'] = new CHttpCookie('_SessionId', trim($session));
		*/
	}
	
	
	public function filters() {
        return array(
            'accessControl',
        );
    }
	public function accessRules() {
        return array(
            
            array('allow',
                'users' => array('@'),
            ),
			array('allow',
				
				'users'=>array('*'),
				'actions'=>array('login'),
			),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(isset($_GET['ref']))
		{
		
			$ref = (int)$_GET['ref'];
			$user = User::model()->findByPk($ref);
			if($user!=null)
			{
			
				$ip = Yii::app()->getRequest()->getUserHostAddress();
				if($user->ipLogin!=$ip)
				{
					
					$cookieOld = Yii::app()->request->cookies["KadKzaskJ"];
					if($cookieOld=="")
					{
					
						$crypt = new Crypt;
						$idRef = $crypt->encrypt($ref);
						$cookie = new CHttpCookie('KadKzaskJ', $idRef);
						$cookie->expire = time()+60*60*24*180; 
						
						Yii::app()->request->cookies['KadKzaskJ'] = $cookie;
						
					
					}
					
					
				
				}
			
			}
			
		
		}
		
		if(!Yii::app()->user->isGuest)
		{
		
			if(Yii::app()->request->cookies["KadKzaskJ"]!="")
			{
			
				$user = User::model()->findByPk(Yii::app()->user->getId());
				if($user!=null && $user->idRef==0)
				{
				
					$crypt = new Crypt;
					$idRef = $crypt->decrypt(Yii::app()->request->cookies["KadKzaskJ"]);
					$user->idRef = $idRef;
					$user->save();
				
				}
			
			}
		
		}
		
		$this->render('index');
	}
	
	public function actionGetSession()
	{
	
		$file = file_get_contents($this->bong88->curl->cookie);
		preg_match_all("/ASP.NET_SessionId\s+[a-z0-9]+/",$file,$out,PREG_SET_ORDER);
		
		$session = str_replace("ASP.NET_SessionId ","",$out[0][0]);
		echo $session;
	
	}
	public function actionCheckBong88()
	{
	
		echo $this->bong88->checkLogin();
	
	}
	public function actionCheckLogin()
	{
	
		if(isset($_POST['key']))
		{
		
			$key = urlencode($_POST['key']);
			$username = $_POST['username'];
			$cookie = isset(Yii::app()->request->cookies['_cookieLogin'])?Yii::app()->request->cookies['_cookieLogin']->value:"";
			if($cookie=="")
			{
			
				Yii::app()->user->logout();
				echo '<script>alert("Logout force!!!");window.top.location.href = "/index.php?r=site/login";</script>';
				
			
			}
			$user = User::model()->findByAttributes(array(
			
				'username'=>$username,
			
			));
			if($user!=null)
			{
			
				if($user->cookie!=$cookie)
				{
				
					Yii::app()->user->logout();
					echo '<script>alert("Logout force!!!");window.top.location.href = "/index.php?r=site/login";</script>';
				
				}
				if($user->status==2)
				{
					Yii::app()->user->logout();
					echo '<script>alert("Logout force!!!");window.top.location.href = "/index.php?r=site/login";</script>';
				}
			
			}
			else
			{
			
				Yii::app()->user->logout();
					echo '<script>alert("Logout force!!!");window.top.location.href = "/index.php?r=site/login";</script>';
			
			}
			$data = 'username=TV312888ZZZ&key='.$key;
			$this->bong88->curl->post($this->mainUrl."login_checkin.aspx",$data);
		
		}
	
	}
	public function actionTopMenu()
	{
	
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = "Id DESC";
		$criteria->condition = "type = 1";
		$lastHot = hotNew::model()->findAll($criteria);
		if($lastHot==null)
			$message = "";
		else
			$message = $lastHot[0]->content;
		$this->render('template/topMenu',array(
		
			'message'=>$message,
		
		));
	
	}
	public function actionUnderOver()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$key = $dataBong88->key;
		$key = explode("-",$key);
		$sport = 1;
		$Market = "t";
		if(isset($_GET['Sport']) && isset($_GET['Market']))
		{
		
			$sport = $_GET['Sport'];
			$Market = $_GET['Market'];
		
		}
		if($Market=="t")
		{
			$this->render('template/UnderOver',array(
			
				'key'=>$key,
			
			));
		}
		else
		{
		
			$this->render('template/Early',array(
			
				'key'=>$key,
				'sport'=>$sport,
				'Market'=>$Market,
			
			));
		
		}
	
	}
	public function action1X2()
	{
	
		$this->render("template/1X2");
	
	}
	public function actionMiniOdds()
	{
	
		$data = $this->bong88->getMain($this->mainUrl."miniOdds_data.aspx");
		echo $data;
	
	}
	public function actionMiniOddsTpl()
	{
	
		$this->render('template/MiniOdds_tpl');
	
	}
	
	
	public function actionUnderOverTpl()
	{
	
		$template = "underOverTpl";
		if(isset($_GET['form']))
		{
		
			$form = $_GET['form'];
			if($form==1)
				$template = 'underOverTpl1';
			if($form==2)
				$template = 'underOverTpl';
			if($form=="1H")
				$template = 'underOverTpl1H';
			if($form=="1F")
				$template = 'underOverTpl1F';
		
		}else $template = "underOverTpl";
		
		$this->render('template/'.$template);
	
	}
	public function actionMenuTpl()
	{
	
		$data = $this->bong88->getMain($this->mainUrl."menu/Menu_tmpl.aspx");
		//$this->render('template/MenuTpl',array('data'=>$data));
		echo $data;
	
	}
	public function actionLeftMenu()
	{
	
		
		$userId = Yii::app()->user->getId();
		if($userId>0)
		{
			$user =  User::model()->findByPk($userId);
		}
		else $user = new User;
		$dataBong88 = tblBong88::model()->findByPk(1);
		$key = $dataBong88->key;
		$key = explode("-",$key);
		$this->render('template/leftMenu',array(
			
			
			'user'=>$user,
			'key'=>$key,
		
		));
	
	}
	
	public function actionBetProcessData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="bp_key" || $key=="CT")
				$value = urlencode($value);
			if($key=="UN")
				$value = "TV31288803A";
			
				
			$url .= $key.="=".$value."&";
			
		
		}
		$url = str_replace("r=site/BetProcessData&","",$url);
		$url = $this->mainUrl."BetProcess_Data.aspx?".$url;
		
		
		
		$data = $this->bong88->curl->getData($url);
		
		preg_match_all("/\'lblMaxBetValue\'\:\'[0-9]+,[0-9]+\',/",$data,$out,PREG_PATTERN_ORDER);
		$user = User::model()->findByPk(Yii::app()->user->getId());
		$betLimit = json_decode($user->settingOptions)->bettingLimit->BettingLimitItems[0];
		$maxBet = $betLimit->MaxBet;
		$minBet = $betLimit->MinBet;
		if(isset($out[0][0]))
		{
			
			$max = $out[0][0];
			$max = explode("'",$max);
			
			if(isset($max[3]))
			{
				$bMax = $max[3];
				$max[3] = str_replace(",","",$max[3]);
				$bMaxC = $max[3];
				if($bMaxC > $maxBet )
				{
					$data = str_replace("'lblMaxBetValue':'".$bMax."',","'lblMaxBetValue':'".$maxBet."',",$data);
				}
			}
			
		}
		preg_match_all("/\'lblMinBetValue\':\'[0-9]\',/",$data,$out2,PREG_PATTERN_ORDER);
		if(isset($out2[0][0]))
		{
			
			$min = $out2[0][0];
			$data = str_replace($min,"'lblMinBetValue':'".$minBet."',",$data);
			
		}
		
		echo $data;
	
	}
	public function actionBetProcessDataOutRight()
	{
	
		if(isset($_POST['otbp_Match']))
		{
		
			$data = "otbp_Match=".$_POST['otbp_Match'];
			$url = $this->mainUrl."outright/BetProcess_Data.aspx";
			$outRight = $this->bong88->curl->postData($url,$data);
			echo $outRight;
		
		}
	
	}
	
	public function actionUnderOverData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			if($key=="OddsType")
				$value = 4;
			else
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."UnderOver_data.aspx?".$url);
		echo $data;
		//$this->render('template/UnderOverData');
	
	}
	
	public function action1X2Data()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."1X2_data.aspx?".$url);
		echo $data;
		//$this->render('template/UnderOverData');
	
	}
	public function action1X2Tpl()
	{
	
		$this->render('template/1X2Tpl');
	
	}
	public function actionCorrectScrore()
	{
	
		$this->render('template/CorrectScore');
	
	}
	public function actionCorrectScoreData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."CorrectScore_data.aspx?".$url);
		echo $data;
	
	}
	public function actionCorrectScoreTpl()
	{
	
		$this->render('template/CorrectScoreTpl');
	
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$errors = null;
		if(!Yii::app()->user->isGuest)
			$this->redirect("/");
		$this->layout = "white";
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('/');
			else
				$errors = $model->getErrors();
		}
		// display the login form
		$this->render('login',array('model'=>$model,'errors'=>$errors));
	}
	public function actionLoginAjax()
	{
		if(!Yii::app()->user->isGuest)
		{
		
			echo 'okie';
			return;
		
		}
		
		$model=new LoginForm;
		//$errors = null;
		$message = "";

		// collect user input data
		if(isset($_POST['username']))
		{
			$model->username=$_POST['username'];
			$model->password = $_POST['password'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				echo "okie";
			else 
			{
				foreach($model->getErrors() as $errors)
				{
				
					foreach($errors as $error)
					{
					
						$message.= "alert('".$error."');";
					
					}
				
				}
				echo $message;
			}
		}
		
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionGetUrl()
	{
	
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$bong88 = new Bong88();
		echo $bong88->getMain($dataBong88->mainUrl."main.aspx");
	
	}

	public function actionConfirmDataBet()
	{
		
		if(Yii::app()->user->isGuest)
		{
			echo '<script>alert("Please Login!!!");</script>';
			return;
		}
		if(isset($_POST['bettingGraphRemark']))
		{
		
			echo "<script>alert('Please choice other bet kind, this bet kind is developed!!!');parent.CleanMixParlayInfo();</script>";
			return;
		
		}
		
		if(isset($_POST['BPstake']))
		{
		
			
			$betData = new betData();
			$betData->ipBet = Yii::app()->getRequest()->getUserHostAddress();
			$betData->BPstake = str_replace(",","",$_POST['BPstake']);
			$betData->BPBetKey = $_POST['BPBetKey'];
			$betData->btnBPSubmit = $_POST['btnBPSubmit'];
			$betData->HorseBPstake = $_POST['HorseBPstake'];
			$betData->HorseBPBetKey = $_POST['HorseBPBetKey'];
			$betData->stakeRequest = $_POST['stakeRequest'];
			$betData->oddsRequest = $_POST['oddsRequest'];
			$betData->oddChange1 = $_POST['oddChange1'];
			$betData->oddChange2 = $_POST['oddChange2'];
			$betData->MINBET = $_POST['MINBET'];
			$betData->MAXBET = str_replace(",","",$_POST['MAXBET']);
			$betData->bettype = $_POST['bettype'];
			$betData->lowerminmesg = $_POST['lowerminmesg'];
			$betData->highermaxmesg = $_POST['highermaxmesg'];
			$betData->areyousuremesg = $_POST['areyousuremesg'];
			$betData->areyousuremesg1 = $_POST['areyousuremesg1'];
			$betData->incorrectStakeMesg = $_POST['incorrectStakeMesg'];
			$betData->oddsWarning = $_POST['oddsWarning'];
			$betData->betconfirmmesg = $_POST['betconfirmmesg'];
			$betData->siteType = $_POST['siteType'];
			$betData->hidStake10 = $_POST['hidStake10'];
			$betData->hidStake20 = $_POST['hidStake20'];
			$betData->hidStake2 = $_POST['hidStake2'];
			$betData->sporttype = $_POST['sporttype'];
			
			$betData->oddsType = $_POST['oddsType'];
			$betData->cbAcceptBetterOdds = $_POST['cbAcceptBetterOdds'];
			$betData->timeBet = time();
			
			
			$dataBong88 = tblBong88::model()->findByPk(1);
			$key = $dataBong88->key;
			$key = explode("-",$key);
			
			$bp_Match = $betData->BPBetKey."_".$betData->oddsRequest."_".$betData->bettype;
			$url = "autoLoad=yes&bp_Match=".$bp_Match."&UN=TV31288803A&bp_ssport=1&chk_BettingChange=4&".$key[0]."=".$key[1];
			$url = $this->mainUrl."BetProcess_Data.aspx?".$url;
			
			$data = $this->bong88->curl->getBetData($url);
			if(strpos($data,"SetConfirmBetResult")!==false)
			{
				echo "<script>alert('Time Over, please choice other match or try again later!!!');</script>";
				return;
			}
			if($data=="")
			{
				echo "<script>alert('Time Over, please choice other match or try again later!!!');</script>";
				return;
			}
			//Region Validate Data//
			
				$dataOdds = $this->GetCaptcha("\'lblOddsValue\'\:\'","',",$data);
				//error_log($dataOdds);
				$dataMinBet = $this->GetCaptcha("\'hiddenMinBet\'\:\'","',",$data);
				$dataMaxBet = str_replace(",","",$this->GetCaptcha("\'hiddenMaxBet\'\:\'","',",$data));
				$dataMatchId = $this->GetCaptcha("\'matchid\'\:\'","',",$data);
				$datalblBetKind = $this->GetCaptcha("\'lblBetKind\'\:\'","',",$data);
				$lblHome = $this->GetCaptcha("\'lblHome\'\:\'","',",$data);
				$lblAway = $this->GetCaptcha("\'lblAway\'\:\'","',",$data);
				$lblLeaguename = $this->GetCaptcha("\'lblLeaguename\'\:\'","',",$data);
				$lbloddsStatus = $this->GetCaptcha("\'lbloddsStatus\'\:\'","',",$data);
				$lblScoreValue = $this->GetCaptcha("\'lblScoreValue\'\:\'","',",$data);
				$lblBetKindValue = $this->GetCaptcha("\'lblBetKindValue\'\:\'","',",$data);
				$lblSportKind = $this->GetCaptcha("\'lblSportKind\'\:\'","',",$data);
				$lblChoiceValue = $this->GetCaptcha("\'lblChoiceValue\'\:\'","',",$data);
				//$liveBgColor = $this->GetCaptcha("\'liveBgColor\'\:\'","',",$data);
				$live = $this->findArray($dataMatchId,$this->getDataOddsLive());
				//echo "<script>alert('".$betData->BPstake."');</script>";
				//return;
				if($lbloddsStatus!="running")
				{
					error_log($lbloddsStatus);
					?>
					<script>alert('Time Over, please choice other match or try again later!!!');</script>
					<?php
					return;
				
				}
				
				/*
				if($betData->oddsRequest!=$dataOdds)
				{
				
					?>
					<script>
						alert('Odds has changes from <?php echo $betData->oddsRequest ?> to <?php echo  $dataOdds?>');
						parent.document.getElementById('oddsRequest').value = <?php echo $dataOdds; ?>;
					</script>
					<?php
					return;
				
				}*/
			$userId = Yii::app()->user->getId();
			if($userId>0)
			{
				
				$user = User::model()->findByPk($userId);
				if($user!=null)
				{
					$betLimit = json_decode($user->settingOptions)->bettingLimit->BettingLimitItems[0];
					
					if($betData->BPstake>$betLimit->MaxBet || $betData->BPstake< $betLimit->MinBet)
					{
					
						?>
						<script>alert('Data invalid!!!');</script>
						<?php
						return;
					
					}
					
					if($user->betCredit<$betData->BPstake)
					{
					
						?>
					<script>alert('Your bet credit is not enought!!!');</script>
					<?php
					return;
					
					}
					if($user->status==3)
					{
						echo "<script>alert('Your account had been suppended! you can\'t bet!!');</script>";
						return;
					}
					if($user->status==2)
					{
						echo "<script>alert('Your account had been closed! you can\'t bet!!');</script>";
						Yii::app()->user->logout();
					}
					if($betLimit->MaxBet < $betData->BPstake)
					{
						echo "<script>alert('Tiền cược tối đa mỗi lần là ".$betLimit->MaxBet."');</script>";
						return;
						
					}
					if($betLimit->MinBet > $betData->BPstake)
					{
						echo "<script>alert('Tiền cược tối thiểu mỗi lần là ".$betLimit->MinBet."');</script>";
						return;
						
					}
					$criteria = new CDbCriteria;
					$criteria->condition = "username = :user AND matchid = :matchid";
					$criteria->select = array("sum(BPstake) as totalBet");
					$criteria->params = array(':user'=>$user->username,':matchid'=>$dataMatchId);
					$lastBet = betData::model()->findAll($criteria);
					
					if($lastBet!=null)
					{
						if($betLimit->MaxPerMatch < ($lastBet[0]->totalBet + $betData->BPstake))
						{
							echo "<script>alert('Cược tối đa cho mỗi trận là ".$betLimit->MaxPerMatch."');</script>";
							return;
						}
					}
					$criteria = new CDbCriteria;
					$criteria->condition = "username = :user";
					$criteria->order = "timeBet DESC";
					$criteria->params = array(':user'=>$user->username);
					$uBet = betData::model()->findAll($criteria);
					if($uBet!=null)
					{
						if(time() - $uBet[0]->timeBet < 10)
							exit("<script>alert('Thời gian đánh mỗi trận cách nhau 10s!');</script>");
					}
					
				
				}else exit("Tên đăng nhâp không tồn tại!");
			
			}else return;
			$betData->oddsRequest = $dataOdds;
			$betData->username = $user->username;
			$betData->matchid = $dataMatchId;
			$betData->lblBetKind = $datalblBetKind;
			$betData->lblHome = trim($lblHome);
			$betData->lblAway = trim($lblAway);
			$betData->lblLeaguename = trim($lblLeaguename);
			if($live=="okie")
			{
				$betData->lbloddsStatus = 'waiting';
			}
			else
				$betData->lbloddsStatus = 'running';
			$betData->lblScoreValue = $lblScoreValue;
			$betData->lblBetKindValue = $lblBetKindValue;
			$betData->lblSportKind = $lblSportKind;
			$betData->lblChoiceValue = $lblChoiceValue;
			//End Region Validate data//
			
			if($betData->oddsRequest<0)
			{
				$user->betCredit = $user->betCredit - $betData->BPstake*abs($betData->oddsRequest);
				$user->outStanding = $user->outStanding + $betData->BPstake*abs($betData->oddsRequest);
			}
			else
			{
				$user->betCredit = $user->betCredit - $betData->BPstake;
				$user->outStanding = $user->outStanding + $betData->BPstake;
			}
			
			if($user->save())
			{
				if($betData->save())
				{
					
					$keyhidden = explode("_",$betData->BPBetKey);
					$key = $keyhidden[0];
					$type = $keyhidden[1];
					if($betData->lbloddsStatus == 'waiting'){
					?>
					
									<script type="text/javascript" >
					var Mod='Success';
					var Type='';
					parent.fFrame.topFrame.g_SMF.removeTicket('<?php echo $key ?>','<?php echo $type ?>',<?php echo $dataMatchId ?>);
					parent.SetConfirmBetResult(Mod,Type);

					</script>

					<?php } else {
					?>
					<script type="text/javascript" >
					var Mod='BListMini';
					var Type='';
					parent.fFrame.topFrame.g_SMF.removeTicket('<?php echo $key ?>','<?php echo $type ?>',<?php echo $dataMatchId ?>);
					parent.SetConfirmBetResult(Mod,Type);

					</script>
					<?php }
				
				}
				else
				{
					
					error_log("Khong the luu");
					foreach($betData->getErrors() as $errors)
					{
					
						foreach($errors as $error)
						{
							error_log($error);
							?>
							<script>alert('<?php echo $error ?>');</script>
							<?php
						
						}
					
					}
				
				}
				
			}
			else
			{
			
				foreach($user->getErrors() as $errors)
				{
				
					foreach($errors as $error)
					{
					
						?>
						<script>alert('<?php echo $error ?>');</script>
						<?php
					
					}
				
				}
			
			}
		}
	
	}
	
	public function actionBetListMiniData()
	{
	
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user!=null)
		{
		
			
			$criteria = new CDbCriteria();
			
			$timeToday = strtotime("today");
			
			
			$criteria->condition = "(lbloddsStatus= :st OR (timeBet >= :from AND lbloddsStatus = :stt2)) AND username = :username ";
			$criteria->params = array(':st'=>'running',':username'=>$user->username,':stt2'=>'canceled',":from"=>$timeToday);
			$criteria->limit = 10;
			$criteria->order = "Id DESC";
			$totalBet = betData::model()->findAll($criteria);
			$this->render('template/betListMiniData',array(
			
				'totalBet'=>$totalBet,
			
			));
			
		
		}
	
	}
	public function actionHTFT()
	{
	
		$this->render('template/HTFT');
	
	}
	public function actionHTFTData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."HTFT_data.aspx?".$url);
		echo $data;
	
	}
	public function actionHTFTTpl()
	{
	
		$this->render('template/HTFTTpl');
	
	}
	//
	public function actionHTFTOE()
	{
	
		$this->render('template/HTFTOE');
	
	}
	public function actionHTFTOEData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."HTFTOE_data.aspx?".$url);
		echo $data;
	
	}
	public function actionHTFTOETpl()
	{
	
		$this->render('template/HTFTOETpl');
	
	}
	//
	
	//
	public function actionFGLG()
	{
	
		$this->render('template/FGLG');
	
	}
	public function actionFGLGData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."FGLG_data.aspx?".$url);
		echo $data;
	
	}
	public function actionFGLGTpl()
	{
	
		$this->render('template/FGLGTpl');
	
	}
	//
	
	//
	public function actionOutRight()
	{
	
		$sport = $_GET['Sport'];
		$this->render('template/OutRight',array(
		
			'sport'=>$sport,
		
		));
	
	}
	public function actionOutRightData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."OutRight_data.aspx?".$url);
		echo $data;
	
	}
	public function actionOutRightTpl()
	{
	
		$this->render('template/OutRightTpl');
	
	}
	//
	
	
	public function actionOe()
	{
	
		$this->render('template/Oe');
	
	}
	public function actionOeData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."Oe_data.aspx?".$url);
		echo $data;
	
	}
	
	public function actionOeTpl()
	{
	
		$this->render('template/OeTpl');
	
	}
	public function actionTg()
	{
	
		$this->render('template/Tg');
	
	}
	public function actionTgData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."Tg_data.aspx?".$url);
		echo $data;
	
	}
	public function actionTgTpl()
	{
	
		$this->render('template/TgTpl');
	
	}
	public function actionLive()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$key = $dataBong88->key;
		$key = explode("-",$key);
		$this->render("template/Live",array(
		
			'key'=>$key,
		
		));
	
	}
	public function actionLiveData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		
		
		$data = $this->bong88->curl->getData($this->mainUrl."Live_data.aspx?".$url);
		echo $data;
	
	}
	public function actionLiveInfo()
	{
	
		if(isset($_GET['MatchId']))
		{
			$id = $_GET['MatchId'];
			$this->render("template/liveInfo",array(
			
				'id'=>$id,
			
			));
		}
	
	}
	public function actionTickScoreMapTmpl()
	{
	
		$this->render("template/TickScoreMap_tmpl");
		
	
	}
	public function actionTickScoreMapData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			
			$url .= $key.="=".$value."&";
		
		}
		$url = str_replace("r=site/TickScoreMapData&","",$url);
		//error_log($this->mainUrl."TickScoreMap_data.ashx?".$url);
		$data = $this->bong88->curl->getData($this->mainUrl."TickScoreMap_data.ashx?".$url);
		//$data  ="SFwA5MsB2mzm6BG$1BmXAq5TAouDJ4zB2jJHq4ziOd6YKZJRKduDq4zjCJABKEwz6Bea6PUDnBfR6PmDnBkvldw6qp0hCo6Y6Psz84vFO4zjKFk15oktKEwWKpmUlokgOpJF6DuDr3X9KI3DnDwmCMkx8ZseOpVUq4mUrjvFOIX96dHUJIXPCM6Dldw4J0ABKEwzqI0u6Bea6P9q6BGuldw6so6Y1FuDrJ1DnBfR6P006BGildwA5MfDnpXWK4uR6PW98t6DnpXWK4$vldw6J0ABKEwzqI0u6Bea6P9q6BGuldw6so6Y1FuDrJ1DnBfR6P006BGildwA5MfDnpXWK4uR6PW98t6DnpXWK4$vldww8H$eOp3DnpC9KcAzldwh5jvWKZrDnBfR6ZOBKEJyOd6Y1cH~";
		echo $data;
		
	
	}
	public function actionResultFrame()
	{
	
		$this->render("template/ResultFrame");
	
	}
	public function actionResult()
	{
	
		if(isset($_POST['selectDate']))
		{
		
			$dataPost = "";
			foreach($_POST as $key=>$value)
			{
			
				$dataPost .= $key."=".urlencode($value)."&";
				
			
			}
			
			$data = $this->bong88->curl->post($this->mainUrl.'/Result.aspx',$dataPost);
		
		}
		else
			$data =  $this->bong88->curl->getData($this->mainUrl.'/Result.aspx');
		$data = str_replace("template/sportsbook/public/css/",$this->mainUrl."template/sportsbook/public/css/",$data);
		$data = str_replace("jscalendar/calendar-blue.css",$this->mainUrl."jscalendar/calendar-blue.css",$data);
		
		$data = str_replace("jscalendar/calendar.js","js/calendar.js",$data);
		$data = str_replace("jscalendar/lang/calendar-en.js","js/calendar-en.js",$data);
		$data = str_replace("jscalendar/calendar-setup.js","js/calendar-setup.js",$data);
		$data = str_replace("commJS/","js/",$data);
		$data = str_replace("Result.aspx","/index.php?r=site/Result",$data);
		$data = str_replace("ResultMorePopSoccer.aspx","/index.php?r=site/getResultMore",$data);
		echo $data;
	
	}
	public function actionHistory()
	{
	
		if(isset($_GET['fdate']))
		{
			$fdate = $_GET['fdate'];
			$time = strtotime($fdate);
			//$timeFrom = $time - 60*60*24;
			
			//$from = strtotime(date("m/d/Y",$timeFrom)." 11:00:00");
			$to = strtotime(date("m/d/Y",$time)." 23:59:59");
			
			if(Yii::app()->user->isGuest)
				$this->redirect(array('login'));
			$user = User::model()->findByPk(Yii::app()->user->getId());
			$criteria = new CDbCriteria();
			$criteria->condition = "lbloddsStatus!= :st AND lbloddsStatus!= :waiting AND lbloddsStatus!= :canceled AND username = :username AND timeUpdate >= :from AND timeUpdate <= :to";
			$criteria->params = array(':st'=>'running',':username'=>$user->username,':waiting'=>'waiting',':canceled'=>'canceled',":from"=>$time,":to"=>$to);
			$criteria->limit = 200;
			$criteria->order = "Id DESC";
			$totalBet = betData::model()->findAll($criteria);
			$this->render('template/history',array(
			
				'totalBet'=>$totalBet,
			
			));
		}
	
	}
	public function actionMorePupopTpl()
	{
	
		$this->render('template/morePupopTpl');
	
	}
	public function actionMorePopData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		$data = $this->bong88->curl->getData($this->mainUrl."MorePop_data.aspx?".$url);
		echo $data;
	
	}
	public function actionLeftMenuAccountData()
	{
	
		$id = Yii::app()->user->getId();
		if($id>0)
			$user = User::model()->findByPk($id);
		else $user = new User;
		if(isset($_POST['accountUpdate']))
		{
		
			$type = $_POST['accountUpdate'];
			
		
		}
		else
			$type = "full";
		$this->render('template/leftAccountData',array(
			
				'user'=>$user,
				'type'=>$type
			
			));
	
	}
	
	public function actionBetList()
	{
		if(Yii::app()->user->isGuest)
			$this->redirect(array('login'));
		$user = User::model()->findByPk(Yii::app()->user->getId());
		
		$timeToday = strtotime("today");
		
		//$from = strtotime(date("m/d/Y",$time)." 11:00:00");
		//$to = strtotime(date("m/d/Y",$timeToday)." 11:00:00");
		
		$criteria = new CDbCriteria();
		$criteria->condition = "username = :username AND (timeUpdate >= :time OR lbloddsStatus = :stt)";
		$criteria->params = array(':username'=>$user->username,":time"=>$timeToday ,":stt"=>"running");
		$criteria->limit = 200;
		$criteria->order = "Id DESC";
		$totalBet = betData::model()->findAll($criteria);
		$this->render('template/betList',array(
		
			'totalBet'=>$totalBet,
		
		));
	
	}
	public function actionResultPopup()
	{
	
		if(isset($_POST['TransId']))
		{
		
			$TransId = $_POST['TransId'];
			$betData = betData::model()->findByPk($TransId);
			if($betData!=null)
			{
			
				$this->render('template/resultPopup',array(
				
					'betData'=>$betData,
				
				));
			
			}
		
		}
	
	}
	public function actionWaitingBetData()
	{
	
		if(!Yii::app()->user->isGuest)
		{
		
			$user = User::model()->findByPk(Yii::app()->user->getId());
			if($user!=null)
			{
			
				
				
				if(isset($_GET['IsFromWaitingBtn']) && $_GET['IsFromWaitingBtn']=="yes")
				{
				
					
					/*
					$betData = betData::model()->findAllByAttributes(
						array(
					
							'lbloddsStatus'=>'waiting',
							'username'=>$user->username,
					
						),
						array(
						
							'limit'=>10,
							'order'=>'Id ASC',
						
						)
					
					
					);
					if($betData!=null)
					{
					
						
						foreach($betData as $bet)
						{
						
							
							if(time() - $bet->timeBet > 180)
							{
							
								$bet->lbloddsStatus = "canceled";
								$user->betCredit = $user->betCredit + $bet->BPstake;
								$user->outStanding = $user->outStanding - $bet->BPstake;
								$user->save();
								$bet->save();
							
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
									if(time() - $bet->timeBet > 20)
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
						
								
						
						
						}
						
					
					}
					*/
					$criteria = new CDbCriteria;
					$criteria->condition = "username = :user AND (lbloddsStatus = :waiting OR (lbloddsStatus = :stt AND timeBet > :time))";
					$criteria->params = array(":user"=>$user->username,':waiting'=>'waiting',":stt"=>"canceled",":time"=>time()-20);
					$criteria->order = "Id DESC";
					$criteria->limit = 10;
					$betDataFind = betData::model()->findAll($criteria);
					$this->render('template/WaitingBet',array(
					
						'betData'=>$betDataFind,
					
					));
				}
				else
				{
				
					$betDataFind = betData::model()->findAllByAttributes(
						array(
					
						'username'=>$user->username,
						'lbloddsStatus'=>'canceled',
						),
						array(
						
							'limit'=>10,
							'order'=>'Id DESC',
						
						)
						
						
					
					);
					$this->render('template/CancelBet',array(
					
						'betData'=>$betDataFind,
					
					));
				
				}
				
				
					
				
				
			
			}
		
		}
	
	}
	
	public function actionStatsFrame()
	{
	
		if(isset($_GET['MatchId']))
		{
		
			$id = $_GET['MatchId'];
			$this->render('template/StatsFrame',array(
			
				'id'=>$id,
			
			));
		
		}
	
	}
	public function actionLeagueTmpl()
	{
	
		$this->render("template/LeagueTmpl");
	
	}
	public function actionLiveChart()
	{
	
	
		if(isset($_GET['MatchId']))
		{
		
			$id = $_GET['MatchId'];
			$data = $this->bong88->curl->getData($this->mainUrl."LiveChart.aspx?MatchId=".$id);
			echo $data;
			
		
		}
		
	
	}
	public function actionMenuData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			if($key=="key" || $key=="CT")
				$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."menu/Menu_Data.aspx?".$url);
		echo $data;
	
	}
	
	public function GetCaptcha($start,$end,$str)
	{
		
		
		$matches = array();
		$regex = "~$start(.*)$end~";
		preg_match_all($regex, $str, $matches);
		return $matches[1][0];
		
		
	}
	public function actionRegister()
	{
	
		$message = "";
		if(isset($_POST['regForm']))
		{
		
		
			$regForm = new regForm;
			$regForm->attributes = $_POST['regForm'];
			if($regForm->validate())
			{
			
				$user = new User;
				$user->username = $regForm->username;
				$user->password = $regForm->password;
				$user->email = $regForm->email;
				$user->fullName = $regForm->fullName;
				$user->Payname = $regForm->ToBankName;
				$user->PayAccount = $regForm->ToAccount;
				//$user->phone = $regForm->phone;
				$user->timeCreate = time();
				if(!$user->save())
				{
					foreach($user->getErrors() as $errors)
					{
					
						foreach($errors as $error)
						{
						
							$message .= $error."</br>";
						
						}
					
					}
				}
				else
				{
					$user->password = $user->hashPassword($user->password);
					$user->save();
					$message .="success!!! please Login to use your account!!!";
					$this->redirect(array('login'));
				
				}
			
			}
			else
			{
			
				foreach($regForm->getErrors() as $errors)
				{
				
					foreach($errors as $error)
					{
					
						$message .= $error."</br>";
					
					}
				
				}
			
			}
		
		}
		$this->render('register',array(
		
			'message'=>$message,
		
		));
	
	}
	public function actionforgetPass()
	{
	
		$message = "";
		if(isset($_POST['username']))
		{
		
			$username = $_POST['username'];
			$email = $_POST['email'];
			$user = User::model()->findByAttributes(array(
			
				'username'=>$username,
				
			
			));
			if($user!=null)
			{
			
				if($email==$user->email)
				{
				
					$pass = $this->generateRandomString();
					$user->password = $user->hashPassword($pass);
					$user->save();
					$this->sendPass($pass,$email);
					$message = "Thông tin mật khẩu mới đã gửi đến email của bạn!!!";
				
				}
				else $message = "Không tìm thấy thông tin";
			
			}
			else $message = "Không tìm thấy thông tin";
		
		}
		$this->render("forgetPass",array(
		
			'message'=>$message,
		
		));
		
	
	}
	public function sendPass($pass,$mail)
	{
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= 'To:  <'.$mail.'>' . "\r\n";
		$headers .= 'From: bwin247.com <no-reply@bwin247.com>' . "\r\n";
		$headers .= 'Cc: Mật khẩu mới từ bwin247' . "\r\n";
		$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

		// Mail it
		mail($mail, "Mật khẩu mới từ bwin247", "Xin chào , mật khẩu mới của bạn là ".$pass, $headers);
	
	}
	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
    }
	public function actionBingoTmpl()
	{
	
		$this->render('tmpl/Bingo_tmpl');
	
	}
	public function actionBaseballTmpl()
	{
	
		$this->render('tmpl/Baseball_tmpl');
	
	}
	public function actionTennisTmpl()
	{
	
		$this->render('tmpl/Tennis_tmpl');
	
	}
	public function actionCricketTmpl()
	{
	
		$this->render('tmpl/Cricket_tmpl');
	
	}
	public function actionNBATmpl()
	{
	
		$this->render('tmpl/NBA_tmpl');
	
	}
	public function actionSuccessBetData()
	{
	
		if(!Yii::app()->user->isGuest)
		{
		
			$user = User::model()->findByPk(Yii::app()->user->getId());
			if($user!=null)
			{
			
				$betData = betData::model()->findByAttributes(array(
				
					'username'=>$user->username,
					'lbloddsStatus'=>'waiting',
					),
					array(
					
						'order'=>'Id DESC',
						'limit'=>1,
					
					)
					
				
				);
				if($betData!=null)
				{
				
					$this->render('template/SuccessBetData',array(
					
						'betData'=>$betData,
					
					));
				
				}
			
			}
		
		}
	
	}
	
	public function actionSportsMixParlay()
	{
	
		$sport = $_GET['Sport'];
		$this->render("template/SportsMixParlay",array(
		
			'sport'=>$sport,
		
		));
	
	}
	public function actionSportsMixParlayData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			//if($key=="key" || $key=="CT")
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."SportsMixParlay_data.aspx?".$url);
		echo $data;
	
	}
	public function actionTennis()
	{
	
		$sport = $_GET['Sport'];
		
		$this->render('template/Tennis',array(
		
			'sport'=>$sport,
		
		));
	
	}
	public function actionTennisData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			//if($key=="key" || $key=="CT")
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."Tennis_data.aspx?".$url);
		echo $data;
	
	}
	public function actionNBA()
	{
	
		$sport = $_GET['Sport'];
		
		$this->render('template/NBA',array(
		
			'sport'=>$sport,
		
		));
	
	}
	public function actionNBAData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			//if($key=="key" || $key=="CT")
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."NBA_data.aspx?".$url);
		echo $data;
	
	}
	public function actionCricket()
	{
	
		$sport = $_GET['Sport'];
		
		$this->render('template/Cricket',array(
		
			'sport'=>$sport,
		
		));
	
	}
	public function actionCricketData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			
			//if($key=="key" || $key=="CT")
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->getData($this->mainUrl."Cricket_data.aspx?".$url);
		echo $data;
	
	}
	
	public function actionMixComBetProcessData()
	{
	
		$url = "";
		foreach($_POST as $key=>$value)
		{
		
			
			//if($key=="key" || $key=="CT")
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		
		$data = $this->bong88->curl->postData($this->mainUrl."mixcom/BetProcess_data.aspx",$url);
		echo $data;
	
	}
	public function actionTestOdds()
	{
	
		$event = new EventB();
		echo '<pre>';
		//print_r($this->getMatchById(12224258));
		print_r($event->AnalyTicOddsLive(12385051));
		echo '</pre>';
	
	}
	public function actionFavorite()
	{
		
		$this->render('template/Favorite');
	
	}
	public function actionFavoriteData()
	{
	
		$url = "";
		foreach($_GET as $key=>$value)
		{
		
			$value = urlencode($value);
			$url .= $key.="=".$value."&";
		
		}
		$data = $this->bong88->curl->getData($this->mainUrl."Favorite_data.aspx?".$url);
		echo $data;
	}
	public function actionAddFavorite()
	{
	
		if(isset($_GET['MatchId']))
		{
		
			$url = "";
			if($_GET['Action']=="Add")
			{
				if(isset(Yii::app()->request->cookies["favorites"]))
				{
				
					$newData = Yii::app()->request->cookies["favorites"]->value.$_GET['MatchId'].",";
					Yii::app()->request->cookies['favorites'] = new CHttpCookie('favorites', $newData);
				
				}
				else
				{
				
					Yii::app()->request->cookies['favorites'] = new CHttpCookie('favorites', $_GET['MatchId'].",");
				
				}
			}
			else
			{
			
				if(isset(Yii::app()->request->cookies["favorites"]))
				{
				
					$data = Yii::app()->request->cookies["favorites"]->value;
					$data = str_replace($_GET['MatchId'],"",$data);
					Yii::app()->request->cookies['favorites'] = new CHttpCookie('favorites', $data);
				
				}
				
			
			}
			foreach($_GET as $key=>$value)
			{
			
				$value = urlencode($value);
				$url .= $key.="=".$value."&";
			
			}
			$data = $this->bong88->curl->getData($this->mainUrl."addFavorites.aspx?".$url);
		
		}
	
	}
	
	public function actionMessageDisplayData()
	{
	
		if(isset($_POST['msg_type']))
		{
		
			$msg_type = $_POST['msg_type'];
			$msg_u_title = $_POST['msg_u_title'];
			$msg_u_msg = $_POST['msg_u_msg'];
			$title = "";
			$content = "";
			if($msg_type=="close")
			{
			
				$title = "Event Closed";
				$content = "This event is closed, please try other games.";
			
			}
			$this->render("template/MessageDisplayData",array(
			
				'title'=>$title,
				'content'=>$content,
			
			));
		
		}
	
	}
	
	public function getDataOddsLive()
	{
	
		$api_cache_id = 'cache_data_live_match_all';

		// Attempt to load the data from the cache, based on the key
		$apidata = Yii::app()->cache->get( $api_cache_id  );

		// If the results were false, then we have no valid data, 
		// so load it
		if($apidata===false)
		{
			// No valid cached data was found, so we will generate it.
			$apidata = $this->AnalyTicOddsLive();
			
			// Store the data into the cache and allow it to be
			// valid for 1 hour (3600 seconds)
			Yii::app()->cache->set( $api_cache_id , $apidata, 120 );
		}
		return $apidata;

	
	}
	public function AnalyTicOddsLive()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$key = $dataBong88->key;
		$key = explode("-",$key);
		$data = $this->bong88->curl->getData($this->mainUrl."UnderOver_data.aspx?Market=l&Sport=1&DT=&RT=W&CT=&Game=0&OrderBy=0&OddsType=4&MainLeague=0&DispRang=0&".$key[0]."=".$key[1]);
		
		preg_match_all("/Nl\[[0-9]+\]\=\[(.*)\];/",$data,$out,PREG_SET_ORDER);
		
		$dataOkie = array();
		$dataLiveId = array();
		foreach($out as $match)
		{
			
			$dataMatch = explode("'",$match[1]);
			
			
			if($dataMatch[3]!="" && $dataMatch[25]!="H.Time" && $dataMatch[25]!="")
			{
			
				$dataLiveId[] = $dataMatch[3];
			
			}
			
			
			
		
		}
		
		return $dataLiveId;
	}
	
	public function findArray($id,$array)
	{
	
		foreach($array as $data)
		{
		
			if($data==$id)
				return "okie";
		
		}
		return "";
	
	}
	public function actionMessageHistory()
	{
	
		$criteria = new CDbCriteria;
		$criteria->limit = 20;
		$criteria->order = "Id DESC";
		$criteria->condition = "type = 1";
		$lastHot = hotNew::model()->findAll($criteria);
		$this->render('template/messageHistory',array(
		
			'lastHot'=>$lastHot,
		
		));
	
	}
	public function actiongetResultMore()
	{
		if(isset($_POST['MatchID']))
		{
			$match = $_POST['MatchID'];
			$data = "MatchID=".$match;
			$result = $this->bong88->curl->post($this->mainUrl."ResultMorePopSoccer.aspx",$data);
			echo $result;
		}
	}
	
	
 
	
	
}