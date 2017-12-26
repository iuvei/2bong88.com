<?php

class UserController extends AdminController
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
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','AjaxUpdate'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('AgentUpdateUser'),
				'roles'=>array('admin',"agent"),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionAjaxUpdate()
	{	
		$act = $_GET['act'];
		if($act=="doDelete")
		{
			if(isset($_POST['autoId']))
			{
			
				$autoIdAll = $_POST['autoId'];
				
				foreach ($autoIdAll as $Id)
				{
				
					$model = $this->loadModel($Id);
					if($act=="doDelete")
					{
					
					
						$model->delete();
					
					}
				
				}
			
			}
		}
		elseif($act=="doDeleteAll")
		{
		
			User::model()->deleteAll();
		
		}
		elseif($act=="resetAll")
		{
			User::model()->updateAll(array(
			
				'credit'=>1000,
				'betCredit'=>1000,
				'balance'=>0,
				'outStanding'=>0,
			
			));
		}
	
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->password = md5($model->password);
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
		$oldPass = $model->password;
		$dataOkie  = "";
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$dataOkie  = "";
			$model->attributes=$_POST['User'];
			if($_POST['User']['password']!="")
				$model->password = $model->hashPassword($_POST['User']['password']);
			else $model->password = $oldPass;
			if($model->save())
				$dataOkie = "Cập nhật thành công";
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->dbCriteria->order = "betCredit DESC";
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
		if (isset($_GET['pageSize']))
		{
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
        }
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAgentUpdateUser()
	{
		if(isset($_POST['txtCustomerObject']))
		{
			$txtCustomerObject = $_POST['txtCustomerObject'];
			$txtCustomerObject = json_decode($txtCustomerObject);
			$idUser = $txtCustomerObject->custId;
			$user = User::model()->findByPk($idUser);
			$admin = Admin::model()->findByPk(Yii::app()->user->getId());
			if($user!=null)
			{
				if($user->parentUser!=Yii::app()->user->getId() && Yii::app()->user->getState("typeUser")=="agent")
					return;
				$credit = $txtCustomerObject->credit;
				if($credit>$admin->Credit && $admin->role=="agent")
					return;
				else
				{
					if($admin->role=="agent")
					{
						$admin->Credit = $admin->Credit + ($user->credit - $credit);
						
						if(!$admin->save())
							$message = "Lỗi Admin";
					
					}
					if($user->credit >= $credit)
					{
						$user->betCredit = $credit - ($user->credit - $user->betCredit);
					}
					else
					{
						$user->betCredit = $credit + ($user->credit - $user->betCredit);
					}
					$user->credit = $credit;
				}
				$user->settingOptions = $_POST['txtCustomerObject'];
				if($user->save())
				{
					$data = array(
			
						'errCode'=>0,
						'errMsg'=>"",
					
					);
					header("Content-Type:text/plain");
					echo str_replace("\"","'",json_encode($data));
				}
				else
				{
					$data = array(
			
						'errCode'=>1,
						'errMsg'=>$message,
					
					);
					header("Content-Type:text/plain");
					echo str_replace("\"","'",json_encode($data));
				}
			}
		}
	}
}
