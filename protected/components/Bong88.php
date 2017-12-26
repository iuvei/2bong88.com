<?php 

	class Bong88{
	
		public $username;
		public $password;
		public $key;
		public $curl;
		public $code;
		public $mainUrl;
		public $mailCurl;
		public function Bong88()
		{
		
			require_once(Yii::app()->basePath . '/components/ganon.php');
			$this->curl = new myCurl;
			$this->curl->cookie = Yii::app()->basePath . '/extensions/Curl/cookieBong88.txt';
			$dataBong88 = tblBong88::model()->findByPk(1);
			$this->mailCurl = $dataBong88->mainUrl;
		
		
		}
		public function loginFirst($username,$password="26C773997B96787C5E83003760B486")
		{
		
			
			$this->curl->clearCookies();
			$username = strtoupper($username);
			$url = 'http://www.bong88.com/login888.aspx';
			$pageLogin = $this->curl->get($url);
			
			$html = str_get_dom($pageLogin);
			
			$code = $html("input#txtCode",0);
			if($code)
				$code = $code->value;
			
			
			$pass = md5($password.$code);
			$data = "selLang=en&txtID=".$username."&txtPW=".$pass."&txtCode=".$code."&hidubmit=&IEVerison=0&detecResTime=88&IsSSL=0&PF=Default";
			$url = "http://www.bong88.com/ProcessLogin.aspx";
			$pagePost = $this->curl->post($url,$data);
			
			if(strpos($pagePost,"ValidateTicket.aspx")!==false)
			{
			
				
				$urlValidate = str_replace(array("<script>window.location='","';</script>"),"",$pagePost);
				
				$this->curl->clearCookies();
				
				
				
				
				$url = $this->GetCaptcha("window.location=\'http://",":80/ValidateTicket.aspx",$pagePost);
				$this->mainUrl = $url[0];
				
				$this->curl->get($urlValidate);
				return $this->mainUrl;
				
				
				
				
				
				
				 
			
			}
			return $pagePost;
		}
		
		public function checkLogin()
		{
		
			if($this->getMain($this->mainUrl."main.aspx")=="")
				return 'false';
		
		}
		public function getMain($url)
		{
		
			return $this->curl->getNoWriteCokie($url);
		
		}
		
		public function LoginMain($user,$password="26C773997B96787C5E83003760B486")
		{
		
			$url = $this->loginFirst($user,$password);
			$this->curl->clearCookies();
			return $this->curl->get($url);
			//return $this->getMain();
		
		}
		
		
		
		
		public function GetCaptcha($start,$end,$str)
		{
			
			
			$matches = array();
			$regex = "~$start(.*)$end~";
			preg_match_all($regex, $str, $matches);
			return $matches[1];
			
			
		}
		function __destruct()
		{
			return;
		}
		
	
	}

 ?>