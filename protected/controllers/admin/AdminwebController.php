<?php

class AdminwebController extends AdminController
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
				'actions'=>array('index','view','create','update','admin','delete','customProfile'),
				'roles'=>array('admin'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('customProfile','portalPage','BalanceInfo','Statistic','Announcement','ChangePassword','ChangeSecKey','ViewLog','transfer'),
				'roles'=>array('agent','admin','master','superMaster','ProSuperMaster'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('LoginOption','UpdateLoginOption'),
				'roles'=>array('admin','agent'),
			),
			array(
			
				'allow',
				'actions'=>array('editMember','getCusSetting'),
				'roles'=>array('agent','admin'),
			
			),
			/*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('wadmin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('wadmin'),
			),*/
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
		$model=new Admin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
			$model->password = $model->hashPassword($model->password);
			$model->parentUser = Yii::app()->user->getId();
			if($model->save())
			{
				$auth = Yii::app()->authManager;
				$auth->assign($model->role,$model->Id);
				$this->redirect(array('admin'));
			}
				
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

		if(isset($_POST['Admin']))
		{
			$dataOkie  = "";
			$model->attributes=$_POST['Admin'];
			
			if($model->password !="")
			{
				$model->password = $model->hashPassword($model->password);
			}
			else
				$model->password = $oldPass;
			
			if($model->save())
					$dataOkie = "Cập nhật thành công";
					else var_dump($model->getErrors());
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
		$dataProvider=new CActiveDataProvider('Admin');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Admin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Admin']))
			$model->attributes=$_GET['Admin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Admin the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Admin::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Admin $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCustomProfile()
	{
		
		$this->layout = "white";
		$model=Admin::model()->findByPk(Yii::app()->user->getId());
		if($model!=null)
		{
			
			$this->render('customProfile',array(
			
				'model'=>$model,
			
			));
			
		}
		
	}
	public function actionPortalPage()
	{
		
		$this->layout = "white";
		$model=Admin::model()->findByPk(Yii::app()->user->getId());
		if($model!=null)
		{
			
			$this->render('portalPage',array(
			
				'model'=>$model,
			
			));
			
		}
		
	}
	public function actionBalanceInfo()
	{
		$this->layout = "white";
		$model=Admin::model()->findByPk(Yii::app()->user->getId());
		if($model!=null)
		{
			
			$this->render('BalanceInfo',array(
			
				'model'=>$model,
			
			));
			
		}
		
	}
	public function actionStatistic()
	{
		
		$this->layout = "white";
		$model=Admin::model()->findByPk(Yii::app()->user->getId());
		if($model!=null)
		{
			
			$this->render('Statistic',array(
			
				'model'=>$model,
			
			));
			
		}
		
	}
	public function actionAnnouncement()
	{
		
		$this->layout = "white";
		$this->render("Announcement");
	}
	public function actionLoginOption()
	{
		$this->layout = "white";
		if(isset($_GET['custId']))
		{
			$id = $_GET['custId'];
			if($id!=Yii::app()->user->getId())
				return;
			$user = Admin::model()->findByPk($id);
			if($user==null)
				return;
			$this->render("loginOption",array(
			
				'user'=>$user,
			
			));
		}
		
	}
	public function actionUpdateLoginOption()
	{
		$data =  file_get_contents('php://input');
		$data = str_replace("'",'"',$data);
		$data = json_decode($data);
		$id = Yii::app()->user->getId();
		$user = Admin::model()->findByPk($id);
		$errorCode = 0;
		$message = "";
		if($user==null)
		{
			$errorCode = 1;
			$message = "User not exist!!!";
		}
		if($user->nickname!="")
		{
			$errorCode = 3;
			$message = "Bạn không thể thay đổi nickname nhiều lần!";
		}
		if($errorCode==0)
		{
			$user->nickname = $data->nickname;
			if($user->save())
			{
				$errorCode = 0;
				$message = "Thay đổi thành công!";
			}
			else
			{
				$errorCode = 2;
				$message = "Thay đổi không thành công!!!";
			}
		}
		$data = array(
		
			'ErrorCode'=>$errorCode,
			'ErrorMessage'=>$message,
		
		);
		echo  json_encode($data);
	}
	public function actionChangePassword()
	{
		if(isset($_POST['txtNewPwd']))
		{
			$message = "";
			$code = 0;
			$txtNewPwd = $_POST['txtNewPwd'];
			$txtConfirmPwd = $_POST['txtConfirmPwd'];
			$txtOldPwd = $_POST['txtOldPwd'];
			if($txtOldPwd==$txtNewPwd)
			{
				$message = "mật khẩu phải khác với mật khẩu hiện tại";
			}
			if($txtNewPwd!=$txtConfirmPwd)
			{
				$message = "Mật khẩu xác nhận không trùng với mật khẩu mới!";
				$code = 1;
			}
			$user = Admin::model()->findByPk(Yii::app()->user->getId());
			if($user==null)
			{
				$message = "Người dùng không tồn tại!";
				$code = 2;
			}
			if(!$user->validatePassword($txtOldPwd))
			{
				$message =  "Mật khẩu hiện tại không đúng";
				$code = 3;
			}
			if($message=="")
			{
				$user->password = $user->hashPassword($txtNewPwd);
				$user->save();
				$message = "Thay đổi thành công!!!";
				$code = 0;
			}
			
			$data = array(
			
				'errCode'=>$code,
				'errMsg'=>$message,
			
			);
			header("Content-Type:text/plain");
			echo str_replace("\"","'",json_encode($data));
		}
		else
		{
			$this->layout = "white";
			$this->render("changePass");
		}
	}
	
	public function actionChangeSecKey()
	{
		
		if(isset($_POST['txtSecCode']))
		{
			$message = "";
			$code = 0;
			$txtSecCode = $_POST['txtSecCode'];
			$txtConfirmSecCode = $_POST['txtConfirmSecCode'];
			$inputSecCode = $_POST['inputSecCode'];
			if($inputSecCode==$txtSecCode)
			{
				$message = "Mã bảo mật phải khác với mật khẩu hiện tại";
			}
			if($txtSecCode!=$txtConfirmSecCode)
			{
				$message = "Mã bảo mật xác nhận không trùng với mật khẩu mới!";
				$code = 1;
			}
			$user = Admin::model()->findByPk(Yii::app()->user->getId());
			if($user==null)
			{
				$message = "Người dùng không tồn tại!";
				$code = 2;
			}
			if($user->hashPassword($inputSecCode)!=$user->secKey)
			{
				$message =  "Mã bảo mật hiện tại không đúng";
				$code = 3;
			}
			if($message=="")
			{
				$user->password = $user->hashPassword($txtSecCode);
				$user->save();
				$message = "Thay đổi thành công!!!";
				$code = 0;
			}
			
			$data = array(
			
				'errCode'=>$code,
				'errMsg'=>$message,
			
			);
			header("Content-Type:text/plain");
			echo str_replace("\"","'",json_encode($data));
		}
		else
		{
			$this->layout = "white";
			$this->render("changeSecKey");
		}
	}
	
	public function actionViewLog()
	{
		$this->layout = "white";
		$this->render("viewLog");
	}
	public function actionTransfer()
	{
		$this->layout = "white";
		$this->render("transfer");
	}
	public function actiongetCusSetting()
	{
		$this->layout = "white";
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			if($id==0)
			{
				$user = new User;
				$admin = Admin::model()->findByPk(Yii::app()->user->getId());
				$this->render("cusSettingNew",array(
					
					'user'=>$user,
					'admin'=>$admin,
					
				));
			}
			else
			{
				$user = User::model()->findByPk($id);
				
				if($user!=null)
				{
					if(Yii::app()->user->getState("typeUser")=="agent" && $user->parentUser!=Yii::app()->user->getId())
						return;
					$admin = Admin::model()->findByPk(Yii::app()->user->getId());
					$this->render("cusSetting",array(
						
						'user'=>$user,
						'admin'=>$admin,
						
					));
				}
			}
		}
	}
	public function actioneditMember()
	{
		if(isset($_GET['custid'])&& isset($_GET['USER']))
		{
			$this->layout = "white";
			$custId = $_GET['custid'];
			$custUser = $_GET['USER'];
			$this->render("editMember",array(
				
				'custId'=>$custId,
				'custUser'=>$custUser,
				
			));
		}
	}
	
}
