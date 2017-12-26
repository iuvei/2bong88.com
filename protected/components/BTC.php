<?php 

	class BTC{

		public $password;
		public $rePassword;
		public $fromAddress;
		public $toAddress;
		
		public function BTC($guid,$password,$rePassword,$fromAddress="",$toAddress="")
		{
		
			$this->password = $password;
			$this->rePassword = $rePassword;
			$this->fromAddress = $fromAddress;
			$this->toAddress = $toAddress;
			$this->guid = $guid;
		
		}
		public function sendMoney($amount)
		{
		
			$password = $this->password;
			$rePassword = $this->rePassword;
			$toAddress = $this->toAddress;
			$guid = $this->guid;
			$url = 'https://blockchain.info/vi/merchant/'.$guid.'/payment?password='.$password.'&second_password='.$rePassword.'&to='.$toAddress.'&amount='.$amount;
			$json_data = file_get_contents($url);
			return $json_data;
			$json_feed = json_decode($json_data);
			
		
		}
		public function GetBalance($address)
		{
		
			$password = $this->password;
			$guid = $this->guid;
			$url = 'https://blockchain.info/vi/merchant/'.$guid.'/address_balance?password='.$password.'&address='.$address.'&confirmations=0';
			$json_data = file_get_contents($url);

			$json_feed = json_decode($json_data);
			$balance = $json_feed->balance;
			return $balance;
		
		
		}
		public function CreateAddress($label="")
		{
		
			$password = $this->password;
			$rePassword = $this->rePassword;
			$guid = $this->guid;
			$url = "https://blockchain.info/vi/merchant/".$guid."/new_address?password=".$password."&second_password=".$rePassword."&label=".$label;
			$json_data = file_get_contents($url);
			$json_feed = json_decode($json_data);
			return $json_feed->address;
		
		
		}

	}


 ?>