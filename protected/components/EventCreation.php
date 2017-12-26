<?php 
class EventCreation{

	public $mainUrl;
	public $bong88;
	public function EventCreation()
	{
	
		$dataBong88 = tblBong88::model()->findByPk(1);
		$this->mainUrl = $dataBong88->mainUrl;
		$this->bong88 = new Bong88();
	
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
			
			if($dataMatch[13]!="" && $dataMatch[15]!="")
			{
				$homeName = str_replace(array("(",")"," No.of Corners"," - Over","- Under"),array("[","]","","",""),$dataMatch[13]);
				$awayName = str_replace(array("(",")"," No.of Corners"," - Over","- Under"),array("[","]","","",""),$dataMatch[15]);
				$partent = "/\s(\d{2}):(\d{2})-(\d{2}):(\d{2})/";
				$replace = "";
				$homeName =  preg_replace($partent, $replace, $homeName);
				$awayName =  preg_replace($partent, $replace, $awayName);
				
				$partent = "/\s(\d{1})(st|th|nd) Corner/";
				$replace = "";
				$homeName =  preg_replace($partent, $replace, $homeName);
				$awayName =  preg_replace($partent, $replace, $awayName);
				$dataOkie[] = array(
				
					'idMatch'=>$dataMatch[3],
					'homeName'=>$homeName,
					'awayName'=>$awayName,
				
				);
			
			}
				
			
			
			
		
		}
		//error_log(json_encode($dataOkie));
		return ($dataOkie);
	}
	
	public function findArray($id,$array)
	{
	
		foreach($array as $data)
		{
		
			if($data['idMatch']==$id)
				return $data;
		
		}
		error_log('not found in array '.$id."---".json_encode($array));
		return "";
	
	}
	
	public function eventCreateTionRun($id,$username,$refNo)
	{
		
		$dataS888 = $this->getMatchById($id,$username,$refNo);
		
		if($dataS888!="")
		{
		
			if(strpos($dataS888,"r=")!==false)
			{
			
				$dataCheck = $this->CreateObjectS888bet($username)->getPanelBet();
				error_log("Data check planel: ".$dataCheck);
				if(strpos($dataCheck,"chờ")!==false)
				{
				
					return "sleep";
				
				}
				elseif(strpos($dataCheck,"chấp nhận"))
					return "okie";
				
			
			}
			
			elseif(strpos($dataS888,"đổi")!==false)
			{
			
				return "sleep";
			
			}
			else
			{
			
				error_log("Data bet".$dataS888);
				return "error";
			
			}
		
		}
		else
		{
		
			return "error";
		
		}
		
	
	}
	
	public function getMatchById($id,$username,$refNo)
	{
	
		$dataMatchLive = $this->getDataOddsLive();
		
		//print_r($dataMatchLive);
		$dataMatch = $this->findArray($id,$dataMatchLive);
		if($dataMatch!="")
		{
			
			$s888bet = $this->CreateObjectS888bet($username);
			$dataMatchSearch = $this->getDataMatchBet($username,$id,$dataMatch,$refNo);
			error_log("Data Match Search: ".json_encode($dataMatchSearch));
			return $dataMatchSearch;
		}
		else
			return "";
	
	}
	public function dataMatchSearch($dataMatch,$username)
	{
		//error_log($dataMatch['homeName'].".-----.".$dataMatch['awayName']);
		$s888bet = $this->CreateObjectS888bet($username);
		$dataMatchSearch = $s888bet->bet($dataMatch['homeName'],$dataMatch['awayName']);
		//error_log(json_encode($dataMatchSearch));
		if(strpos($dataMatchSearch,"thay đổi")!==false)
		{
		
			return "đổi";
		
		}
		return $dataMatchSearch;
	
	}
	public function getDataMatchBet($username,$id,$dataMatch,$refNo)
	{
	
		$api_cache_id = 'cache_matchBetted_s888bet_'.$username."_".$id."_refNoId_".$refNo;

		// Attempt to load the data from the cache, based on the key
		$apidata = Yii::app()->cache->get( $api_cache_id  );

		// If the results were false, then we have no valid data, 
		// so load it
		if($apidata===false)
		{
			// No valid cached data was found, so we will generate it.
			$apidata = $this->dataMatchSearch($dataMatch,$username);
			
			// Store the data into the cache and allow it to be
			// valid for 1 hour (3600 seconds)
			Yii::app()->cache->set( $api_cache_id , $apidata, 60*10 );
		}
		return $apidata;
	
	}
	
	public function CreateObjectS888bet($username)
	{
	
		$api_cache_id = 'cache_object_s888bet_'.$username;

		// Attempt to load the data from the cache, based on the key
		$apidata = Yii::app()->cache->get( $api_cache_id  );

		// If the results were false, then we have no valid data, 
		// so load it
		if($apidata===false)
		{
			// No valid cached data was found, so we will generate it.
			$apidata = new s888bet($username."_".time());
			//$apidata->getValidate();
			// Store the data into the cache and allow it to be
			// valid for 1 hour (3600 seconds)
			Yii::app()->cache->set( $api_cache_id , $apidata, 60*10 );
		}
		return $apidata;
	
	}
	
	public function getDataOddsLive()
	{
	
		$api_cache_id = 'cache_data_live_match';

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
			Yii::app()->cache->set( $api_cache_id , $apidata, 30 );
		}
		return $apidata;

	
	}
 
 

}