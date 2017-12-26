<?php 

	class EventB{
	
		public $mainUrl;
		public $bong88;
		public function EventB()
		{
		
			$dataBong88 = tblBong88::model()->findByPk(1);
			$this->mainUrl = $dataBong88->mainUrl;
			$this->bong88 = new Bong88();
		
		}
		public function AnalyTicOddsLive($id)
		{
		
			$dataBong88 = tblBong88::model()->findByPk(1);
			$key = $dataBong88->key;
			$key = explode("-",$key);
			$data = $this->bong88->curl->getData($this->mainUrl."UnderOver_data.aspx?Market=l&Sport=1&DT=&RT=W&CT=&Game=0&OrderBy=0&OddsType=4&MainLeague=0&DispRang=0&".$key[0]."=".$key[1]);
			$dataMatch = "false";
			preg_match_all("/Nl\[[0-9]+\]\=\['[0-9]+','".$id."',(.*)\];/",$data,$out,PREG_SET_ORDER);
			if(isset($out[0][0]))
			{
			
				$data = $out[0][0];
				$partent = "/Nl\[[0-9]+\]\=\[/";
				$replace = "";
				$data =  preg_replace($partent, $replace, $data);
				$data = explode("','",$data);
				$dataMatch = array(
					
					'TimerSuspend'=>$data[15],
					'score'=>"[".$data[21]."-".$data[22]."]",
				
				);
				return $dataMatch;
			}
			else return "false";
			
		}
		
	
	}

 ?>