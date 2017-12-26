<?php

class BetDataController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','totalBetRunning','DailyWinLost','WinLossByBettype','CancelBetList'),
				'roles'=>array('admin','agent','master','superMaster','ProSuperMaster'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','AjaxUpdate'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionAjaxUpdate()
	{
	
		if(isset($_GET['act']))
		{
			$act = $_GET['act'];
			if($act=="doDeleteAll")
			{
			
				betData::model()->deleteAll();
			
			}
			if($act=="doDelete")
			{
			
				if(isset($_POST['autoId']))
				{
				
					$autoIdAll = $_POST['autoId'];
					//error_log()
					foreach ($autoIdAll as $Id)
					{
						
						$model = $this->loadModel($Id);
						$model->delete();
					
					}
				
				}
			
			}
		
		}
	
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new betData;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['betData']))
		{
			$model->attributes=$_POST['betData'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['betData']))
		{
			$model->attributes=$_POST['betData'];
			if($model->save())
			{
				error_log("update #".$model->Id);
				$this->redirect(array('view','id'=>$model->Id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('betData');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new betData('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['betData']))
			$model->attributes=$_GET['betData'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return betData the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=betData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param betData $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bet-data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actiontotalBetRunning()
	{
		$this->layout = "white";
		
		if(isset($_GET["betType"]))
		{
			$betType = $_GET["betType"];
			$custId = $_GET['custId'];
			$criteria = new CDbCriteria;
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser = :userId";
			if($betType==0)
			{
				
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2 OR lblBetKind = :type3 OR lblBetKind = :type4)";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap",":type3"=>"Over/Under",":type4"=>"1H Over/Under");
					
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2 OR lblBetKind = :type3 OR lblBetKind = :type4) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap",":type3"=>"Over/Under",":type4"=>"1H Over/Under",":userId"=>$custId);
					
				}
			}
			elseif($betType==1)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2)";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap",":userId"=>$custId);
				}
			
			}
			elseif($betType==3)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2)";
					$criteria->params = array(":stt"=>"running",":type1"=>"Over/Under",":type2"=>"1H Over/Under");
					
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"Over/Under",":type2"=>"1H Over/Under",":userId"=>$custId);
				}
			
			}
			elseif($betType==45)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2 OR lblBetKind = :type3 OR lblBetKind = :type4)";
					$criteria->params = array(":stt"=>"running",":type1"=>"Odd/Even",":type2"=>"1H Odd/Even",":type3"=>"FT.1X2",":type4"=>"1H 1X2");
					
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2 OR lblBetKind = :type3 OR lblBetKind = :type4) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"Odd/Even",":type2"=>"1H Odd/Even",":type3"=>"FT.1X2",":type4"=>"1H 1X2",":userId"=>$custId);
				}
				
			
			}
			elseif($betType==4)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2)";
					$criteria->params = array(":stt"=>"running",":type1"=>"FT.1X2",":type2"=>"1H 1X2");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"FT.1X2",":type2"=>"1H 1X2",":userId"=>$custId);
				}
				
			
			}
			elseif($betType==5)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2)";
					$criteria->params = array(":stt"=>"running",":type1"=>"Odd/Even",":type2"=>"1H Odd/Even");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"Odd/Even",":type2"=>"1H Odd/Even",":userId"=>$custId);
				}
				
			
			}
			elseif($betType==6)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND lblBetKind = :type";
					$criteria->params = array(":stt"=>"running",":type"=>"Correct Score");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND lblBetKind = :type AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type"=>"Correct Score",":userId"=>$custId);
				}
				
			
			}
			elseif($betType==7)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2)";
					$criteria->params = array(":stt"=>"running",":type1"=>"Total Goal",":type2"=>"1H Total Goal");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind = :type1 OR lblBetKind = :type2) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"Total Goal",":type2"=>"1H Total Goal",":userId"=>$custId);
				}
				
			
			}
			elseif($betType==1999)
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind != :type1 AND lblBetKind != :type2 AND lblBetKind != :type3 AND lblBetKind != :type4)";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap",":type3"=>"Over/Under",":type4"=>"1H Over/Under");
			
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND (lblBetKind != :type1 AND lblBetKind != :type2 AND lblBetKind != :type3 AND lblBetKind != :type4) AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":type1"=>"1H Handicap",":type2"=>"Handicap",":type3"=>"Over/Under",":type4"=>"1H Over/Under",":userId"=>$custId);
				}
				
			}
			else
			{
				if(Yii::app()->user->getState("typeUser")=="admin")
				{
					$criteria->condition = "lbloddsStatus = :stt";
					$criteria->params = array(":stt"=>"running");
				}
				else
				{
					$criteria->condition = "lbloddsStatus = :stt AND username IN(".$userQuery.")";
					$criteria->params = array(":stt"=>"running",":userId"=>$custId);
				}
				
			}
			
			
			
			
			$criteria->limit = 100;
			$criteria->order = "timeBet DESC";
			$betData = betData::model()->findAll($criteria);
			$this->render("totalBetRunning",array(
			
				'betData'=>$betData,
			
			));
		}
		else
		{
			if(isset($_GET['type']))
			{
				if(isset($_GET['custid']))
				{
					$custid = $_GET['custid'];
				}
				else
				{
					$custid = Yii::app()->user->getId();
				}
				$type = isset($_GET['type'])?$_GET['type']:"";
				$username = isset($_GET['username'])?$_GET['username']:"";
				if($type!="agent" && $type!="admin")
				{
					$criteria = new CDbCriteria;
					if($type=="ProSuperMaster")
					{
						$criteria->condition = "parentUser = :user AND role = :role";
						$criteria->params = array(":user"=>$custid,":role"=>"superMaster");
					
					}
					elseif($type=="superMaster")
					{
						$criteria->condition = "parentUser = :user AND role = :role";
						$criteria->params = array(":user"=>$custid,":role"=>"master");
					}
					elseif($type=="master")
					{
						$criteria->condition = "parentUser = :user AND role = :role";
						$criteria->params = array(":user"=>$custid,":role"=>"agent");
					}
					$data = Admin::model()->findAll($criteria);
					$this->render('RunningBetSuper',array(
					
						'data'=>$data,
						'type'=>$type,
						'username'=>$username,
						'pageType'=> isset($_GET['pageType'])?$_GET['pageType']:"",
					
					));
				}
				else
				{
					if(isset($_GET["pageType"]))
					{
						$pageType = $_GET["pageType"];
						if($pageType!="" && in_array($pageType,array("HandicapPage","1x2Page","TotalGoal","CorrectScore","lastBet")))
						{
							$this->render($pageType,array(
							
								'custId'=>$custid,
							
							));
						}
					}
				}
			}
		}
		
		
	}

	public function actionDailyWinLost()
	{
		$this->layout = "white";
		$criteria = new CDbCriteria;
		if(isset($_POST['fdate']) && isset($_POST['tdate']))
		{
		
			$postFDay = $_POST['fdate'];
			$postTDay = $_POST['tdate'];
			$fdate = strtotime($_POST['fdate']." 00:00:00");
			$tdate = strtotime($_POST['tdate']." 23:59:59");
			$criteria = new CDbCriteria();
			if(Yii::app()->user->getState("typeUser")=="ProSuperMaster")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId)))";
			}
			elseif(Yii::app()->user->getState("typeUser")=="superMaster")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId))";
			}
			elseif(Yii::app()->user->getState("typeUser")=="master")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId)";
			}
			elseif(Yii::app()->user->getState("typeUser")=="agent")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser = :userId";
			}
			else
				$userQuery = "";
			if(Yii::app()->user->getState("typeUser")=="admin")
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND (lbloddsStatus = :stt OR lbloddsStatus = :stt2 OR lbloddsStatus = :stt3)";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,":stt"=>"win",":stt2"=>"lost",":stt3"=>"Draw");
			}
			else
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND (lbloddsStatus = :stt OR lbloddsStatus = :stt2 OR lbloddsStatus = :stt3) AND username IN(".$userQuery.")";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,":stt"=>"win",":stt2"=>"lost",":stt3"=>"Draw",":userId"=>Yii::app()->user->getId());
			}
			$criteria->limit = 100;
			$criteria->order = "Id DESC";
			$criteria->select = array("BPstake","winLost");
			$countBet = betData::model()->count($criteria);
			$betData = betData::model()->findAll($criteria);
		
		}
		else
		{
		
			$postFDay = date("m/d/Y");
			$postTDay = date("m/d/Y");
			
			$fdate = strtotime(date("m/d/Y")." 00:00:00");
			$tdate = strtotime(date("m/d/Y")." 23:59:59");
			$criteria = new CDbCriteria();
			if(Yii::app()->user->getState("typeUser")=="ProSuperMaster")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId)))";
			}
			elseif(Yii::app()->user->getState("typeUser")=="superMaster")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId))";
			}
			elseif(Yii::app()->user->getState("typeUser")=="master")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId)";
			}
			elseif(Yii::app()->user->getState("typeUser")=="agent")
			{
				$userQuery = "SELECT username FROM tbl_user WHERE parentUser = :userId";
			}
			else
				$userQuery = "";
			if(Yii::app()->user->getState("typeUser")=="admin")
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND (lbloddsStatus = :stt OR lbloddsStatus = :stt2 OR lbloddsStatus = :stt3)";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,":stt"=>"win",":stt2"=>"lost",":stt3"=>"Draw");
			}
			else
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND (lbloddsStatus = :stt OR lbloddsStatus = :stt2 OR lbloddsStatus = :stt3) AND username IN(".$userQuery.")";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,":stt"=>"win",":stt2"=>"lost",":stt3"=>"Draw",":userId"=>Yii::app()->user->getId());
			}
			
			$criteria->limit = 100;
			$criteria->select = array("BPstake","winLost");
			$criteria->order = "Id DESC";
			$countBet = betData::model()->count($criteria);
			$betData = betData::model()->findAll($criteria);
		
		}
		
		$totalBet = 0;
		$totalWinLost = 0;
		$comMember = 0;
		foreach($betData as $bet)
		{
			$totalBet += $bet->BPstake;
			
			$totalWinLost += $bet->winLost;
			if($bet->winLost!=0)
			{
				$comMember +=  round($bet->com);
			}
			
		}
		//$comMember = round(abs($totalBet)*0.25/100,2);
		$finalWinlost = $totalWinLost + $comMember;
		$company = -($finalWinlost);
		$this->render("DailyWinLost",array(
		
			'totalBet'=>$totalBet,
			'totalWinLost'=>$totalWinLost,
			'comMember'=>$comMember,
			'finalWinlost'=>$finalWinlost,
			'company'=>$company,
			'countBet'=>$countBet,
			'fdate'=>$postFDay,
			'tdate'=>$postTDay,
		
		));
	}
	public function actionWinLossByBettype()
	{
		$this->layout = "white";
		$criteria = new CDbCriteria;
		if(Yii::app()->user->getState("typeUser")=="ProSuperMaster")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId)))";
		}
		elseif(Yii::app()->user->getState("typeUser")=="superMaster")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId))";
		}
		elseif(Yii::app()->user->getState("typeUser")=="master")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId)";
		}
		elseif(Yii::app()->user->getState("typeUser")=="agent")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser = :userId";
		}
		else
			$userQuery = "";
		if(Yii::app()->user->getState("typeUser")!="admin")
		{
			$criteria->condition = "username IN(".$userQuery.") AND winLost != 0";
			$criteria->params = array(":userId"=>Yii::app()->user->getId());
		}
		else
			$criteria->condition = "winLost != 0";
		$criteria->select = array("lblBetKind");
		$criteria->distinct = true;
		$criteria->order = "lblBetKind DESC";
		$betData = betData::model()->findAll($criteria);
		$this->render("WinLostByBettype",array(
		
			'betData'=>$betData,
		
		));
		
	}
	public function actionCancelBetList()
	{
		$this->layout = "white";
		$criteria = new CDbCriteria;
		if(Yii::app()->user->getState("typeUser")=="ProSuperMaster")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId)))";
		}
		elseif(Yii::app()->user->getState("typeUser")=="superMaster")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId))";
		}
		elseif(Yii::app()->user->getState("typeUser")=="master")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId)";
		}
		elseif(Yii::app()->user->getState("typeUser")=="agent")
		{
			$userQuery = "SELECT username FROM tbl_user WHERE parentUser = :userId";
		}
		else
			$userQuery = "";
		if(Yii::app()->user->getState("typeUser")=="admin")
		{
			$criteria->condition = "lbloddsStatus = :stt";
			$criteria->params = array(":stt"=>"canceled");
		}
		else
		{
			$criteria->condition = "lbloddsStatus = :stt AND username IN (".$userQuery.")";
			$criteria->params = array(":stt"=>"canceled",":userId"=>Yii::app()->user->getId());
		}
		
		$criteria->order = "Id DESC";
		$betData = betData::model()->findAll($criteria);
		$this->render("CancelBetList",array(
		
			'data'=>$betData,
		
		));
	}
	
}
