<?php
class ProSuperMasterController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='white';

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
				'actions'=>array('CreateUser','listUser','ResetPassword','resetPass','userBalance','CustomerList','HeaderCreateUser','AddNewUser'),
				'roles'=>array('admin'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionHeaderCreateUser()
	{
	
		$this->layout = "white";
		$this->render("HeaderCreateUser");
	
	}
	
	public function actionCreateUser()
	{
	
		$this->layout = "white";
		$this->render("createUser");
	
	}
	public function actionAddNewUser()
	{
	
		$this->layout = "white";
		$message = "";
		$okie = 1;
		if(isset($_POST['txtCustomerObject']))
		{
		
			$txtCustomerObject = $_POST['txtCustomerObject'];
			$admin = Admin::model()->findByPk(Yii::app()->user->getId());
			if($admin!=null)
			{
			
				$role = $admin->role;
				if($role=="agent" || $role=="admin")
				{
				
					$user = new User;
					$dataUser = json_decode($txtCustomerObject);
					if($dataUser->password=="")
					{
					
						$message .="mật khẩu rỗng!!!<br>";
						$okie = 0;
					
					}
					$user->username = $dataUser->userName;
					$user->password = $dataUser->password;
					$user->betCredit = $dataUser->credit;
					$user->credit = $dataUser->credit;
					$user->parentUser = Yii::app()->user->getId();
					$user->settingOptions = $txtCustomerObject;
					$userCheck = User::model()->findByAttributes(array(
					
						'username'=>$user->username,
					
					));
					if($userCheck!=null)
					{
					
						$message .="Tên đăng nhập đã tồn tại!!!<br>";
						$okie = 0;
					}
					if($admin->Credit<$user->betCredit && $role=="agent")
					{
					
						$message .="Hạn mức tín dụng vượt quá mức cho phép!!!<br>";
						$okie = 0;
					
					}
					if($okie==1)
					{
					
						if($user->save())
						{
							$user->password = $user->hashPassword($user->password);
							$user->save();
							if($admin->role=="agent")
							{
								$admin->Credit = $admin->Credit - $user->betCredit;
							}
							$admin->save();
							$message = "Tạo user thành công!!!";
						}
						else
							$message = "Không thể tạo user";
						$data = array(
						
							'errCode'=>($message=="Tạo user thành công!!!")?0:101,
							'errMsg'=>$message,
						
						);
						header("Content-Type:text/plain");
						echo str_replace("\"","'",json_encode($data));
						return;
						
					
					}
					else
					{
						$data = array(
						
							'errCode'=>($message=="")?0:101,
							'errMsg'=>$message,
						
						);
						header("Content-Type:text/plain");
						echo str_replace("\"","'",json_encode($data));
						return;
					}
					
					
				
				}
				
			}
		
		}
		else
		{
			$this->render("createUserNew",array(
				
				'user'=>Admin::model()->findByPk(Yii::app()->user->getId()),
				'message'=>$message,
				'okie'=>$okie,
			
			));
		}
	
	}
	/*
	public function actionCreateUser()
	{
		$message = "";
		$okie = 1;
		if(isset($_POST['User']))
		{
		
			$admin = Admin::model()->findByPk(Yii::app()->user->getId());
			if($admin!=null)
			{
			
				$role = $admin->role;
				
				if($role=="admin")
				{
				
					$user = new Admin;
					if($_POST['User']['password']=="")
					{
					
						$message .="mật khẩu rỗng!!!<br>";
						$okie = 0;
					
					}
					$user->Username = $_POST['User']['username'];
					$user->key = "thaihoc";
					$user->password = $_POST['User']['password'];
					$user->Credit = $_POST['User']['credit'];
					$user->givenCredit = $_POST['User']['credit'];
					$user->parentUser = Yii::app()->user->getId();
					$user->role = "ProSuperMaster";
					
					$userCheck = Admin::model()->findByAttributes(array(
					
						'Username'=>$user->Username,
					
					));
					if($userCheck!=null)
					{
					
						$message .="Tên đăng nhập đã tồn tại!!!<br>";
						$okie = 0;
					}
					
					if($okie==1)
					{
					
						if($user->save())
						{
							
							$user->password = $user->hashPassword($user->password);
							$user->save();
							$admin->Credit = $admin->Credit - $user->Credit;
							$admin->save();
							$auth = Yii::app()->authManager;
							$auth->assign($user->role,$user->Id);
							$message = "Tạo Pro SuperMaster thành công!!!";
						}
						else
						{
							$message = "Tạo Pro SuperMaster Không thành công!!!";
						}
						
					
					}
					
				
				}
			
			}
		
		}
		
		$this->render("CreateUser",array(
		
			'user'=>Admin::model()->findByPk(Yii::app()->user->getId()),
			'message'=>$message,
			'okie'=>$okie,
		
		));
	}*/

	public function actionlistUser()
	{
	
		$this->layout = "white";
		$criteria = new CDbCriteria();
		$criteria->limit = 100;
		$criteria->order = "Id DESC";
		$criteria->condition = "role = :role";
		$criteria->params = array(":role"=>"ProSuperMaster");
		$user = Admin::model()->findAll($criteria);
		$this->render('listUser',array(

			'users'=>$user
		
		));
		
	
	}
	public function actionResetPassword()
	{
		$this->layout = "white";
		if(isset($_GET['custid']))
		{
		
			$id = $_GET['custid'];
			$type = $_GET['type'];
			$user =  Admin::model()->findByPk($id);
			if($user!=null)
			{
			
				$this->render('resetPass',array(
				
					'user'=>$user,
				
				));
			
			}
		
		}
	
	}
	
	public function actionresetPass()
	{
	
		if(isset($_POST['password']))
		{
		
			$id = $_POST['custId'];
			$user = Admin::model()->findByPk($id);
			if($user!=null)
			{
			
				$user->password = $user->hashPassword($_POST['password']);
				$user->save();
			
			}
			$data = array(
				
					'errCode'=>0,
					'errMsg'=>'',
					
				
				);
				$data =  json_encode($data);
				header("Content-Type: text/plain; charset=utf-8");
				echo str_replace('"',"'",$data);
			
		
		}
	
	}
	public function actionuserBalance()
	{
	
		$this->layout = "white";
		$criteria = new CDbCriteria;
		$criteria->order = "Id DESC";
		$criteria->condition = "role = :id";
		$criteria->params = array(":id"=>"ProSuperMaster");
		$criteria->order = "Id Desc";
		$user = Admin::model()->findAll($criteria);
		$this->render('userBalance',array(
		
			'user'=>$user
		
		));
	
	}
	public function actionCustomerList()
	{
	
		if(isset($_POST['custId']))
		{
		
			$message = "";
			$code = 0;
			$id = $_POST['custId'];
			$user = Admin::model()->findByPk($id);
			
			if($user!=null)
			{
				
				if($_POST['isClosed']=="true")
				{
				
					$user->status = 2;
					$user->save();
					$user->lockUserPro($user->status,$user->Id);
				
				}
				if($_POST['isSuspended']=="true")
				{
				
					$user->status = 3;
					$user->save();
					$user->lockUserPro($user->status,$user->Id);
				
				}
				elseif($_POST['isActive']=="true")
				{
				
					$user->status = 1;
					$user->save();
				
				}
				$data = array(
				
					'errCode'=>$code,
					'errMsg'=>$message,
					
				
				);
				$data =  json_encode($data);
				header("Content-Type: text/plain; charset=utf-8");
				echo str_replace('"',"'",$data);
				
			
			}
		
		}
	
	}
	
	
	
}
