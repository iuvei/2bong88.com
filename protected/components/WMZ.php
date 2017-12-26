<?php 


	class WMZ{
	
	
		public $username;
		public $password;
		public $curl;
		public $userCaptcha;
		public $passwordCaptcha;
		public $clientCapt;
		public $idWMZ;
		
		public function WMZ($username,$password,$userCaptcha,$passwordCaptcha,$idWMZ)
		{
		
			$this->username = $username;
			$this->password = $password;
			$this->userCaptcha = $userCaptcha;
			$this->passwordCaptcha = $passwordCaptcha;
			$this->idWMZ = $idWMZ;
			
			require_once(Yii::app()->basePath . '/extensions/Ganon/ganon.php');
			require_once(Yii::app()->basePath . '/extensions/DBC/deathbycaptcha.php');
			$this->clientCapt = new DeathByCaptcha_SocketClient($userCaptcha, $passwordCaptcha);
			$this->clientCapt->is_verbose = true;
	
			$this->curl = new Curl;
			$this->curl->cookiefile = Yii::app()->basePath . '/extensions/Curl/cookieWMZ.txt';
			$this->curl->clearCookies();
		
		
		}
		public function Login()
		{
		
			$url = 'https://my.wmtransfer.com/login.aspx?ReturnUrl=%2fdashboard.aspx';
			$rs  = $this->curl->get($url);
			
			if(strpos($rs,"You are logged in as:")!==false)
			{
				echo "Still login";
				exit;
			}
			
			$html = str_get_dom($rs);
			$__VIEWSTATE = $html('input#__VIEWSTATE',0)->value;
			$__EVENTVALIDATION = $html('input#__EVENTVALIDATION',0)->value;
			$__LBD_VCT = $html('input#__LBD_VCT',0)->value;
			
			
			/* get the captcha */
			$url = 'https://my.wmtransfer.com/LanapCaptcha.aspx?get=image&c=login_ctl00_cph_captcha_captcha&t=' . $__LBD_VCT;
			$rs  = $this->curl->get($url);
			
			$im  = 'captcha/img_' . rand(111111111,999999999) . '.png';
			$f = fopen($im,"w");
			fwrite($f,$rs);
			fclose($f);
			if ($captcha = $this->clientCapt->upload($im)) 
			{
				

				sleep(10);

				// Poll for CAPTCHA text:
				if ($textCapt = $this->clientCapt->get_text($captcha['captcha'])) 
				{
					
					
					$url = 'https://my.wmtransfer.com/login.aspx?ReturnUrl=%2fdashboard.aspx';
					
					$data = "__LASTFOCUS=&__EVENTTARGET=&__EVENTARGUMENT=&__LBD_VCT=".$__LBD_VCT."&__LBD_SGC_login_ctl00_cph_captcha_captcha=0&__VIEWSTATE=".urlencode($__VIEWSTATE)."&__EVENTVALIDATION=".urlencode($__EVENTVALIDATION)."&search=Find+information&ctl00%24cph%24tbLogin=".urlencode($this->username)."&ctl00%24cph%24tbPassword=".urlencode($this->password)."&ctl00%24cph%24Captcha%24tbCaptcha=".$textCapt."&ctl00%24cph%24btnSubmit=Sign+In";
            
					
					
					$dataLogin = $this->curl->post($url,$data,$url);
					
					if(strpos($dataLogin,$this->idWMZ)!==false)
						return "okie";
					else return "false";
					
					
					

					
				}else return "false";
			}else return "false";
			
		
		
		}
	
		public function checkBalance($fullMemo,$totalPrice)
		{
		
			if($this->Login()=="okie")
			{
			
				$url = 'https://my.wmtransfer.com/operations.aspx?curr=wmz';
				$rs  = $this->curl->get($url);
				
				$html = str_get_dom($rs);
				$ListTrans = $html('.in-direct');
				
				if($ListTrans)
				{
				
					foreach($ListTrans as $list)
					{
						
						
							
						$span = $list('span',0);
						if($span)
						{
						
							$memo = $span->getplaintext();
							
							
							if($memo==$fullMemo)
							{
								$dataHaveMemo = "We Have Memo";
								$total = $list('dd.m_operation_In',0);
								if($total)
								{
									$totalText = $total->getplaintext();
									$totalText = str_replace("+","",$totalText);
									$totalText = str_replace("wmz","",$totalText);
									$totalText = str_replace(" ","",$totalText);
									error_log($totalText);
									
									
									if($totalText>=$totalPrice)
									{
										
										return "okie";
										
									}else return 'Chuyen Thieu';
								
								}else return 'Không tìm thấy tổng nhận';
							
							}
							
						
						}
							
							
							
						
						
					}
						
					
				}else return 'List trans error';
				
				
			}else return 'Login false';
					
					
				
			
		}
		
		
		
	}


 ?>