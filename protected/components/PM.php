<?php 

	class PM{
	
		public $AccountId;
		public $hash;
		public $accountNumber;
		public function PM($AccountId,$hash,$accountNumber)
		{
		
			$this->AccountId = $AccountId;
			$this->hash = $hash;
			$this->accountNumber = $accountNumber;
		
		}
		public function getBalance()
		{
		
						
			//error_log($this->AccountId);
			$f=fopen('https://perfectmoney.is/acct/balance.asp?AccountID='.$this->AccountId.'&PassPhrase='.$this->hash, 'rb');

			if($f===false){
			   echo 'error openning url';
			}

			// getting data
			$out=array(); $out="";
			while(!feof($f)) $out.=fgets($f);

			fclose($f);
			error_log($out);
			// searching for hidden fields
			if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER))
			{
			   echo 'Ivalid output';
			   exit;
			}

			// putting data to array
			$ar="";
			foreach($result as $item){
			   $key=$item[1];
			   $ar[$key]=$item[2];
			}
			$keyAcc = $this->accountNumber;
			return $ar[$keyAcc];
		
		}
	
	}


 ?>