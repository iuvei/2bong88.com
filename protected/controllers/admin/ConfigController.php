<?php

class ConfigController extends AdminController
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
				'actions'=>array('index','view'),
				'users'=>array('wadmin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('wadmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('wadmin'),
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
		$model=new Config;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Config']))
		{
			$model->attributes=$_POST['Config'];
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
		$dataOkie  = "";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Config']))
		{
			$dataOkie  = "";
			$model->siteTitle=$_POST['Config']['siteTitle'];
			$model->siteKeyword=$_POST['Config']['siteKeyword'];
			$model->siteDes=$_POST['Config']['siteDes'];
			$model->key=$_POST['Config']['key'];
			
			
			$model->phone = $_POST['Config']['phone'];
			$model->email = $_POST['Config']['email'];
			$model->Skype = $_POST['Config']['Skype'];
			$model->yahoo = $_POST['Config']['yahoo'];
			$model->Viber = $_POST['Config']['Viber'];
			$model->Facebook = $_POST['Config']['Facebook'];
						
			$model->supportContent = $_POST['Config']['supportContent'];
			$model->guideContent = $_POST['Config']['guideContent'];
			$model->allowReg = $_POST['Config']['allowReg'];
			$model->GetBalance = $_POST['Config']['GetBalance'];
			$model->balancePm = $_POST['Config']['balancePm'];
			$model->balanceVCB = $_POST['Config']['balanceVCB'];
			$model->balanceUpay = $_POST['Config']['balanceUpay'];
			$model->copyright = $_POST['Config']['copyright'];
			$model->siteOffline = $_POST['Config']['siteOffline'];
			$model->textOffline = $_POST['Config']['textOffline'];
			
			$model->pageCapt = $_POST['Config']['pageCapt'];
			$model->userB88ag = $_POST['Config']['userB88ag'];
			$model->keyB88ag = $_POST['Config']['keyB88ag'];
			$crypt = new Crypt();
			
			
			
			
			if($_POST['Config']['IMEI']!=="")
			{
			
				$imei_encode = $crypt->encrypt($_POST['Config']['IMEI']);
				$model->IMEI = $imei_encode;
			}
			if($_POST['Config']['passB88ag']!="")
			{
			
				$model->passB88ag = $crypt->encrypt($model->passB88ag);
				
			}
			
			
			
			if($model->save())
				$dataOkie = "Cập nhật thành công";
				//$this->redirect(array('update','id'=>$model->Id));
		}

		$this->render('update',array(
			'model'=>$model,
			'dataOkie'=>$dataOkie,
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
		$dataProvider=new CActiveDataProvider('Config');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Config('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Config']))
			$model->attributes=$_GET['Config'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Config the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Config::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Config $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
