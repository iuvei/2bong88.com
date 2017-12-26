<?php

class Bong88Controller extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionBoot()
	{
	
		
		$bong88 = new Bong88();
		$dataBong88 = tblBong88::model()->findByPk(1);
		$dataCheck = $bong88->getMain($dataBong88->mainUrl."main.aspx");
		
		if($dataCheck =="")
		{
		
			$mainUrl = $bong88->loginFirst("HCB228043");
			print_r($mainUrl);
			if($mainUrl!="false")
			{
				
				$dataBong88->mainUrl = "http://".$mainUrl.'/';
				
				$dataBong88->save();
				$dataOver = $bong88->getMain($dataBong88->mainUrl."UnderOver.aspx");
				require_once(Yii::app()->basePath . '/components/ganon.php');
				$html = str_get_dom($dataOver);
				$form = $html("form");
				if($form)
				{
				
					foreach($form as $f)
					{
					
						if($f->name=="DataForm_L")
						{
						
							$inputs = $f('input');
							foreach($inputs as $input)
							{
							
								if(strpos($input->name,"k")!==false && strpos($input->value,"v")!==false)
								{
								
									$name = $input->name;
									$value = $input->value;
									$dataBong88->key = $name."-".$value;
									$dataBong88->save();
									return 'Okie';
								
								}
							
							}
						
						}
					
					}
				
				}
				error_log("Đăng nhập lại!!!");
			
			}
			
			
		
		}else echo 'still login';
		
	
	}
	
	
	
}