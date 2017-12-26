<?php 

	class myCurl{
	
		var $cookie = "cookieBTCE.txt";
		function get($url)
		{
		
			$headers[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
			
			$headers[] = "Accept-Language:vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2";
			
			$headers[] = "Connection: keep-alive";
			
			
			
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '30');
			curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$html = curl_exec ($ch);

			curl_close($ch);
			return $html;
		
		}
		public function post($url,$data)
		{
		
			$ch = curl_init();

			curl_setopt ($ch, CURLOPT_URL, $url); // replace ** with tt
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '60');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$store = curl_exec ($ch);

			curl_close($ch);
			
			return $store;
		
		}
		public function postData($url,$data)
		{
		
			$ch = curl_init();

			curl_setopt ($ch, CURLOPT_URL, $url); // replace ** with tt
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '60');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$store = curl_exec ($ch);

			curl_close($ch);
			
			return $store;
		
		}
		public function getData($url)
		{
		
			$headers[] = "text/plain, */*; q=0.01";
			
			$headers[] = "Accept-Language:vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2";
			
			$headers[] = "Content-Type:application/x-www-form-urlencoded";
			
			
			
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '30');
			
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$html = curl_exec ($ch);

			curl_close($ch);
			return $html;
		
		}
		public function getBetData($url)
		{
		
			$headers[] = "text/plain, */*; q=0.01";
			
			$headers[] = "Accept-Language:vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2";
			
			$headers[] = "Content-Type:application/x-www-form-urlencoded";
			
			
			
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/42.0 CoRom/36.0.1985.149 Chrome/36.0.1985.149 Safari/537.36");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '30');
			
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$html = curl_exec ($ch);

			curl_close($ch);
			return $html;
		
		}
		public function getNoWriteCokie($url)
		{
		
			$headers[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
			
			$headers[] = "Accept-Language:vi-VN,vi;q=0.8,fr-FR;q=0.6,fr;q=0.4,en-US;q=0.2,en;q=0.2";
			
			$headers[] = "Connection: keep-alive";
			
			
			
			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1");
			curl_setopt ($ch, CURLOPT_TIMEOUT, '30');
			
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$html = curl_exec ($ch);

			curl_close($ch);
			return $html;
		
		}
		function clearCookies() {
			try {
				$fp = @fopen($this->cookie, 'w');
				fwrite($fp, null);
				fclose($fp);
			}
			catch (Exception $e) {
				@unlink($this->cookie);
			}
		}
	
	}

 ?>