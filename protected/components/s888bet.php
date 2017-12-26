<?php 

	class s888bet{
	
	
		private $curl;
		private $cookie;
		public function s888bet($cookieName)
		{
		
			
			require_once(Yii::app()->basePath . '/components/ganon.php');
			$this->curl = new Curl;
			$this->curl->cookiefile = Yii::app()->basePath . '/extensions/Curl/'.$cookieName.'_sbet.txt';
		
		}
		public function getOdds()
		{
		
			
			
			$html = $this->curl->get("http://sports.wrsport.com/_view/RMOdds1.aspx");
			if($html=="")
				return "";
			preg_match_all("/\&update\=false\&r\=[0-9]+/",$html,$out,PREG_SET_ORDER);
			if($out[0][0])
			{
			
				preg_match_all("/[0-9]+/",$out[0][0],$r,PREG_SET_ORDER);
				if($r[0][0])
				{
					$data = $this->curl->get("http://sports.wrsport.com/_view/RMOdds1GenRun.aspx?ot=t&ov=0&mt=0&tf=-1&TFStatus=0&update=false&r=".$r[0][0]."&t=".time()."&RId=0&_=".time());
					if($data=="")
						return $data;
					//error_log($data);
					return json_decode($data);
				}
			
			}
			
		}
		public function getMainMarket($homeName,$awayName)
		{
		
			$data = $this->getOdds();
			//error_log("Data Odds Full: ".json_encode($data));
			if($data=="")
				return "";
			$dataOdds = $data->JSOdds;
			
			foreach($dataOdds as $odds)
			{
			
				if(strpos($odds[8],"SPECIALS")===false)
				{
				
					if(($this->checkSameName(strtoupper($homeName),strtoupper($odds[31]))>=50 || $this->checkSameName(strtoupper($awayName),strtoupper($odds[32]))>=50) && $odds[33]==1)
					{
						
						return $odds;
					
					}
				
				}
			
			}
			error_log("data Odds: ".json_encode($dataOdds));
			error_log($awayName."---".$homeName);
			return "";
			
		
		}
		public function checkSameName($string1,$string2)
		{
		
			$data1 = explode(" ",$string1);
			$data2 = explode(" ",$string2);
			$same = 0;
			foreach($data1 as $dataCheck1)
			{
			
				foreach($data2 as $dataCheck2)
				{
				
					if($dataCheck2==$dataCheck1)
					{
					
						$same+=1;
					
					}
				
				}
			
			}
			$total = count($data1);
			return $same/$total*100;
		
		}
		public function setCookie()
		{
		
			$file = file_get_contents($this->curl->cookiefile);
	
			preg_match_all("/ASP.NET_SessionId\s+[a-z0-9]+/",$file,$out);
			preg_match_all("/__cfduid\s+[a-z0-9]+/",$file,$out2);
			if(isset($out[0][1]))
			{
			
				$asp_session = $out[0][1];
				$asp_session = str_replace("\t","=",$asp_session);
				$cfduid = $out2[0][0];
				$cfduid = str_replace("\t","=",$cfduid);
				$cookie = "panel2=0; panel=1; ".$cfduid."; ".$asp_session."; ILSessionInfo=";
				return $cookie;
			}
			else
				return "";
		
		}
		public function bet($homeName,$awayName)
		{
			
			if(file_exists($this->curl->cookiefile))
			{
				$file = file_get_contents($this->curl->cookiefile);
				if(strpos($file,"ILSessionInfo")===false)
					$this->getValidate();
			}
			else
			{
			
				$this->getValidate();
				error_log("file cookie not exits, get validate");
			}
			$match = $this->getMainMarket($homeName,$awayName);
			error_log("Data Match: ".json_encode($match));
			if($match=="")
				return "";
			if($match[19]==1)
				$isHomeGive = "True";
			else
				$isHomeGive = "False";
			
			$this->curl->setopt(CURLOPT_COOKIE,$this->setCookie());
			
			$urlPanel = "http://sports.wrsport.com/_bet/JRecPanel.aspx?gt=s&b=home&oId=".$match[5]."&isRun=true&odds=".$match[39];
			$dataPanel = $this->curl->post($urlPanel,"");
			if($dataPanel=="")
				return "";
			$dataPanel = json_decode($dataPanel);
			
			$urlBet = "http://sports.wrsport.com/_bet/".$dataPanel->BetUrl."&amt=1&isBetterOdds=true";
			//$url = "http://sports.wrsport.com/_bet/PanelBet.aspx?betGrp=1&betType=home&oId=".$match[5]."&isHomeGive=True&isBetHome=True&isFH=False&hdp=".$match[35]."&accType=HK&odds=".$match[39]."&reducePercent=1&amt=1&isBetterOdds=true";
			error_log("url t? l?: ".$urlBet);
			$data2 = $this->curl->post($urlBet,"","http://sports.wrsport.com/_bet/panel.aspx");
			
			error_log("Data bet: ".$data2);
			return $data2;
			
		
		}
		public function getValidate()
		{
		
			$data = $this->curl->get("http://1.s888bet.com/srt/integrate/playsportbook");
			$html = str_get_dom($data);
			$iframe = $html("iframe#LoadGame",0);
			if($iframe)
			{
			
				$dataIframe = $iframe->src;
				$main = $this->curl->get(str_replace("&amp;","&",$dataIframe));
			}
			
		
		}
		
		public function getPanelBet()
		{
		
			$data = $this->curl->post("http://sports.wrsport.com/_bet/PanelStake.aspx","");
			//error_log($data);
			return $data;
		
		}
	
	
	}

 ?>