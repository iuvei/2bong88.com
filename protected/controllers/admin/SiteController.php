<?php

class SiteController extends AdminController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
		);
		
	}
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login','captcha'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','MessageHistory','view','NewLayout','Header','Menu','HeaderCreateUser','createUser','AddNewUser','CheckExit','listUser','userBalance','Footer',"AccountInfo"),
				'roles'=>array('admin','agent','master','superMaster','ProSuperMaster'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('userBalance','SearchOrder','CreditTransfer','UpdateCredit','CustomerList','DetailWinLost','BetList','listUser','ResetPassword','resetPass','Outstanding','OutstandingDetail','RecheckIn','GetMessages'),
				'roles'=>array('admin','agent','master','superMaster','ProSuperMaster'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$this->layout = "white";
		$this->render('newTemp');
		
	}
	
	public function actionNewLayout()
	{
	
		$this->layout = "white";
		$this->render('newTemp');
	
	}
	public function actionHeader()
	{
	
		$this->layout = "white";
		$user = Admin::model()->findByPk(Yii::app()->user->getId());
		
		$this->render('header',array(
		
			'user'=>$user,
		
		));
	
	}
	public function actionMenu()
	{
	
		$this->layout = "white";
		$this->render('menu');
	
	}
	public function actionAccountInfo()
	{
	
		$this->layout = "white";
		$this->render('AccountInfo');
	
	}
	public function actionuserBalance()
	{
	
		$this->layout = "white";
		$criteria = new CDbCriteria;
		$criteria->order = "Id DESC";
		if(Yii::app()->user->getState("typeUser")!="admin")
		{
		
			$criteria->condition = "parentUser = :id";
			$criteria->params = array(":id"=>Yii::app()->user->getId());
		
		}
		$user = User::model()->findAll($criteria);
		$this->render('userBalance',array(
		
			'user'=>$user
		
		));
	
	}
	public function actionDataRef()
	{
	
		$this->layout = "white";
		$dataRef = dataRef::model()->findAll();
		$this->render('dataRef',array(
		
			'dataRef'=>$dataRef,
		
		));
	
	}
	public function actionSearchOrder()
	{
	
	
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(isset($_POST['time_search']))
		{
			$lost = 0;
			$win = 0;
			$totallost = 0;
			$totalwin = 0;
			$hoa = 0;
			$totalRunning = 0;
			
			$time_search = ($_POST['time_search']);
			
			$time_search = strtotime($time_search);
			if(isset($_POST['time_end']))
			{
				
				
				$time_end = ($_POST['time_end']);
				$time_end = $time_end.(" 23:59:59");
				$time_end = strtotime($time_end);
				$criteria=new CDbCriteria();
				$criteria->condition = 'timeBet >= :start AND timeBet <= :end';
				$criteria->params=array(':start'=> $time_search,':end'=>$time_end);
				
			
			}
			else
			{
				$time = date("d-m-Y");
				$am = $time.(" 00:00:00");
				$am = strtotime($am);
				$pm = $time.(" 23:59:59");
				$pm = strtotime($pm);
				$criteria=new CDbCriteria();
				$criteria->condition = 'timeBet >= :am AND timeBet <= :pm';
				$criteria->params=array(':am'=> $am,':pm'=>$pm);
			}
			$dataBets = betData::model()->findAll($criteria);
			$totalBet = count($dataBets);
			foreach($dataBets as $bet)
			{
			
				if($bet->lbloddsStatus!="running")
				{
					if($bet->winLost > 0)
					{
						
						$win = $win + $bet->winLost;
						$totalwin +=1;
					
					}
					elseif($bet->winLost < 0)
					{
					
						$lost = $lost + $bet->winLost;
						$totallost +=1;
					
					}
					else
					{
					
						$hoa +=1;
					
					}
				}
				else
				{
				
					$totalRunning +=1;
				
				}
			
			}
			$data = array(
			
				'win'=>$win,
				'totalwin'=>$totalwin,
				'lost'=>$lost,
				'totallost'=>$totallost,
				'hoa'=>$hoa,
				'totalRunning'=>$totalRunning,
			
			);
			echo json_encode($data);
		
		}
	
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(!Yii::app()->user->isGuest)
		{
		
			if(Yii::app()->user->getId()==1)
				$this->redirect("/azkv.php");
			else
				$this->redirect("/azkv.php?r=site/newLayout");
		
		}
		$this->layout = "login";
		$model=new LoginFormAdmin;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginFormAdmin']))
		{
			$model->attributes=$_POST['LoginFormAdmin'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{	
				if(Yii::app()->user->getId()==1)
					$this->redirect("/azkv.php");
				else
					$this->redirect("/azkv.php?r=site/newLayout");
			}
		}
		// display the login form
		$this->render('loginNew',array('model'=>$model));
	}
	
	public function actionSendMailCus()
	{	
		$this->layout = "main";
		$data_ok = 0;
		$error = "";
		$mail = array();
		if(isset($_POST['Email']))
		{
		
			$subject = $_POST['Email']['subject'];
			$body = $_POST['Email']['body'];
			if($subject!==null && $body!==null)
			{
			
				$orders = User::model()->findAll();
				
				if($orders!==null)
				{
				
					foreach($orders as $order)
					{
					
						if($order->email!="")
						{	
							if(!in_array($order->email,$mail))
							{	
								if(filter_var($order->email, FILTER_VALIDATE_EMAIL))
								{
									$headers="From: wcointrade.com <{Yii::app()->params['adminEmail']}>\r\n".
									"Reply-To: {Yii::app()->params['adminEmail']}\r\n".
									"MIME-Version: 1.0\r\n".
									"Content-Type: text/html; charset=UTF-8";
									mail($order->email,$subject,$body ,$headers);
									$mail[] = $order->email;
									$data_ok = $data_ok+1;
								}
							}
						
						}
					
					}
				
				}
			
			}else $error = "Nhập thiếu dữ liệu";
		
		}
		$this->render('sendMailCus',array('data_ok'=>$data_ok,'error'=>$error,'mail'=>$mail));
	
	}
	public function actionCreditTransfer()
	{
		$this->layout = "white";
		if(isset($_GET['custid']))
		{
		
			$custId = $_GET['custid'];
			$amount = $_GET['amt'];
			$username = $_GET['username'];
			if(isset($_GET['typePage']))
			{
				$typePage = $_GET['typePage'];
			}
			else
				$typePage = "agent";
			$this->render('creditTransfer',array(
			
				'custId'=>$custId,
				'amount'=>$amount,
				'username'=>$username,
				'typePage'=>$typePage,
			
			));
		
		}
	
	}
	public function actionUpdateCredit()
	{
	
		$message = "";
		if(isset($_POST['custid']))
		{
		
			$custId = $_POST['custid'];
			$amount = (int)str_replace(",","",$_POST['amount']);
			$admin = Admin::model()->findByPk(Yii::app()->user->getId());
			if($admin==null)
				return;
			/*if($admin->role!="admin")
			{
				if($admin->Credit < $amount)
					return;
			}*/
			
			$role = $admin->role;
			if($role=="agent")
			{
				$user = User::model()->findByPk($custId);
				
				if($user!=null)
				{
				
					
					$admin->Credit = $admin->Credit + ($user->credit - $amount);
					
					if(!$admin->save())
						exit("Lỗi admin");
					
					
					$user->betCredit = $amount - $user->credit + $user->betCredit;
					$user->credit = $amount;
					if($user->parentUser!=$admin->Id)
						return;
					if(!$user->save())
						exit("Lỗi user");
					$data = array(
					
						'errCode'=>0,
						'errMsg'=>'',
						'amount'=>number_format($amount,2),
					
					);
					$data =  json_encode($data);
					header("Content-Type: text/plain; charset=utf-8");
					echo str_replace('"',"'",$data);
				
				}
			}
			elseif($role=="master")
			{
				$cus = Admin::model()->findByPk($custId);
				if($cus==null || $cus->role!="agent")
					return;
				if($cus->parentUser!=$admin->Id)
						return;
				$admin->Credit = $admin->Credit + $cus->Credit - $amount;
				if(!$admin->save())
				{
					return;
				}
				$cus->Credit = $amount - $cus->givenCredit + $cus->Credit;
				$cus->givenCredit = $amount;
				if(!$cus->save())
					exit("Lỗi user");
				$data = array(
					
						'errCode'=>0,
						'errMsg'=>'',
						'amount'=>number_format($amount,2),
					
					);
				$data =  json_encode($data);
				header("Content-Type: text/plain; charset=utf-8");
				echo str_replace('"',"'",$data);
				
			}
			elseif($role=="superMaster")
			{
				$cus = Admin::model()->findByPk($custId);
				if($cus==null || $cus->role!="master")
					return;
				if($cus->parentUser!=$admin->Id)
						exit("lỗi truy cập");
				$admin->Credit = $admin->Credit + $cus->Credit - $amount;
				if(!$admin->save())
					exit("Lỗi lưu admin");
				$cus->Credit = $amount - $cus->givenCredit + $cus->Credit;
				$cus->givenCredit = $amount;
				if(!$cus->save())
					exit("Lỗi user");
				
				$data = array(
					
						'errCode'=>0,
						'errMsg'=>'',
						'amount'=>number_format($amount,2),
					
					);
				$data =  json_encode($data);
				header("Content-Type: text/plain; charset=utf-8");
				echo str_replace('"',"'",$data);
				
			}
			elseif($role=="ProSuperMaster")
			{
				
				$cus = Admin::model()->findByPk($custId);
				if($cus==null || $cus->role!="superMaster")
					exit("Lỗi truy cập");
				if($cus->parentUser!=$admin->Id)
						exit("Lỗi truy cập");
				
				$admin->Credit = $admin->Credit + $cus->Credit - $amount;
				if(!$admin->save())
					exit("Lỗi admin");
				
				/*
				$admin->Credit = $admin->Credit + $cus->Credit - $amount;
				if(!$admin->save())
					return;
				*/
				$cus->Credit = $amount - $cus->givenCredit + $cus->Credit;
				$cus->givenCredit = $amount;
				if(!$cus->save())
					exit("Lỗi user");
				
				$data = array(
					
						'errCode'=>0,
						'errMsg'=>'',
						'amount'=>number_format($amount,2),
					
					);
				$data =  json_encode($data);
				header("Content-Type: text/plain; charset=utf-8");
				echo str_replace('"',"'",$data);
				
			}
			
			elseif($role=="admin")
			{
				
				$typePage = $_POST['typePage'];
				if($typePage=="member")
				{
					$user = User::model()->findByPk($custId);
					if($user!=null)
					{
					
						$user->credit = $amount;
						$user->betCredit = $amount;
						$user->save();
						$data = array(
						
							'errCode'=>0,
							'errMsg'=>'',
							'amount'=>number_format($amount,2),
						
						);
						$data =  json_encode($data);
						header("Content-Type: text/plain; charset=utf-8");
						echo str_replace('"',"'",$data);
					
					}
				}
				else
				{
					$cus = Admin::model()->findByPk($custId);
					if($cus->givenCredit >= $amount)
					{
						$cus->Credit = $amount - $cus->givenCredit + $cus->Credit;
					}
					else
					{
						$cus->Credit = $amount - $cus->givenCredit + $cus->Credit;
					}
					$cus->givenCredit = $amount;
					if(!$cus->save())
						exit("Lỗi user");
					$data = array(
						
							'errCode'=>0,
							'errMsg'=>'',
							'amount'=>number_format($amount,2),
						
						);
					$data =  json_encode($data);
					header("Content-Type: text/plain; charset=utf-8");
					echo str_replace('"',"'",$data);
					
				}
				
				
			}
				
		
		}
	
	}
	public function actionCustomerList()
	{
	
		if(isset($_POST['custId']))
		{
		
			$message = "";
			$code = 0;
			$id = $_POST['custId'];
			$user = User::model()->findByPk($id);
			
			if($user!=null)
			{
				
				if($user->parentUser!=Yii::app()->user->getId() && Yii::app()->user->getState("typeUser")=="agent")
				{
					$message = "Bạn truy cập trái phép";
					$code = 403;
				}
				else
				{
					if($_POST['isClosed']=="true")
					{
					
						$user->status = 2;
						$user->save();
					
					}
					if($_POST['isSuspended']=="true")
					{
					
						$user->status = 3;
						$user->save();
					
					}
					elseif($_POST['isActive']=="true")
					{
					
						$user->status = 1;
						$user->save();
					
					}
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
	public function actionDetailWinLost()
	{
	
		$this->layout = "white";
		$type = $_GET['type'];
		/*if($type!=Yii::app()->user->getState("typeUser"))
			return;*/
		if(isset($_GET['username']))
		{
			$username = $_GET['username'];
		}
		else
		{
			$username = Yii::app()->user->getId();
		}
		if(isset($_POST['fdate']) && isset($_POST['tdate']))
		{
		
			$postFDay = $_POST['fdate'];
			$postTDay = $_POST['tdate'];
			$fdate = strtotime($_POST['fdate']." 00:00:00");
			$tdate = strtotime($_POST['tdate']." 23:59:59");
			$criteria = new CDbCriteria();
			if($type=="ProSuperMaster")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"superMaster");
			
			}
			elseif($type=="superMaster")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"master");
			}
			elseif($type=="master")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"agent");
			}
			elseif($type=="agent")
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND lbloddsStatus != :status AND lbloddsStatus != :status2 AND username IN (SELECT username FROM tbl_user WHERE parentUser = :userId)";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,':status'=>'running',":userId"=>$username,":status2"=>"waiting");
			}
			else
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND lbloddsStatus != :status AND lbloddsStatus != :status2";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,':status'=>'running',":status2"=>"waiting");
			}
			if($type!="agent" && $type!="admin")
			{
				$data = Admin::model()->findAll($criteria);
			}
			else
			{
				$criteria->limit = 100;
				$criteria->distinct = true;
				$criteria->select = array("username");
				$criteria->order = "Id DESC";
			
				$data = betData::model()->findAll($criteria);
			}
		
		}
		else
		{
		
			$postFDay = date("m/d/Y");
			$postTDay = date("m/d/Y");
			
			$fdate = strtotime(date("m/d/Y")." 00:00:00");
			$tdate = strtotime(date("m/d/Y")." 23:59:59");
			$criteria = new CDbCriteria();
			if($type=="ProSuperMaster")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"superMaster");
			
			}
			elseif($type=="superMaster")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"master");
			}
			elseif($type=="master")
			{
				$criteria->condition = "parentUser = :user AND role = :role";
				$criteria->params = array(":user"=>$username,":role"=>"agent");
			}
			elseif($type=="agent")
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND lbloddsStatus != :status AND lbloddsStatus != :status2 AND username IN (SELECT username FROM tbl_user WHERE parentUser = :userId)";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,':status'=>'running',":userId"=>$username,":status2"=>"waiting");
			}
			else
			{
				$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND lbloddsStatus != :status AND lbloddsStatus != :status2";
				$criteria->params = array(":start"=>$fdate,':end'=>$tdate,':status'=>'running',":status2"=>"waiting");
			}
			if($type!="agent" && $type!="admin")
			{
				$data = Admin::model()->findAll($criteria);
			}
			else
			{
				$criteria->limit = 100;
				$criteria->distinct = true;
				$criteria->select = array("username");
				$criteria->order = "Id DESC";
				$data = betData::model()->findAll($criteria);
			}
		
		}
		
		if($type!="agent" && $type!="admin")
		{
			
			$this->render('detailWinLostSuper',array(
		
				'data'=>$data,
				'fday'=>$postFDay,
				'tday'=>$postTDay,
				'type'=>$type,
			
			));
		}
		else
		{
			
			$this->render('detailWinLost',array(
			
				'data'=>$data,
				'fday'=>$postFDay,
				'tday'=>$postTDay,
				'type'=>$type,
			
			));
		}
	
	}
	
	public function actionBetList()
	{
		$this->layout = "white";
		if(isset($_POST['UserName']))
		{
		
			$fdate = strtotime($_POST['fdate']." 00:00:00");
			$tdate = strtotime($_POST['tdate']." 23:59:59");
			$criteria = new CDbCriteria();
			$criteria->condition = "timeUpdate >= :start AND timeUpdate <= :end AND username = :username AND lbloddsStatus != :status";
			$criteria->limit = 100;
			$criteria->order = "Id DESC";
			$criteria->params = array(":start"=>$fdate,':end'=>$tdate,':username'=>$_POST['UserName'],':status'=>'running');
			$data = betData::model()->findAll($criteria);
			$this->render('betList',array(
			
				'data'=>$data,
				'fdate'=>$_POST['fdate'],
				'tdate'=>$_POST['tdate'],
				'username'=>$_POST['UserName'],
			
			));
		
		}
	
	}
	public function actionlistUser()
	{
	
		$this->layout = "white";
		$criteria = new CDbCriteria();
		$criteria->limit = 100;
		$criteria->order = "Id DESC";
		if(Yii::app()->user->getState("typeUser")!="admin")
		{
		
			
			if(Yii::app()->user->getState("typeUser")=="agent")
			{
			
				$criteria->condition = "parentUser = :id";
				$criteria->params = array(":id"=>Yii::app()->user->getId());
				$user = User::model()->findAll($criteria);
				$this->render('listUser',array(
		
						'users'=>$user
					
					));
			
			}
			else
			{
			
				$criteria->condition = "parentUser = :id AND role = :role";
				$criteria->params = array(":id"=>Yii::app()->user->getId(),":role"=>(Yii::app()->user->getState("typeUser")=="master")?"agent":"master");
				$user = Admin::model()->findAll($criteria);
				$this->render('listMaster',array(
		
					'users'=>$user
				
				));
			}
		}
		else
		{
		
			$user = User::model()->findAll($criteria);
			$this->render('listUser',array(
		
					'users'=>$user
				
				));
		
		}
		
		
	
	}
	
	public function actionResetPassword()
	{
		$this->layout = "white";
		if(isset($_GET['custid']))
		{
			$role = Yii::app()->user->getState("typeUser");
			if($role=="admin" || $role=="agent")
			{
				$id = $_GET['custid'];
				$type = $_GET['type'];
				$user =  User::model()->findByPk($id);
				if($user!=null)
				{
				
					$this->render('resetPass',array(
					
						'user'=>$user,
					
					));
				
				}
			}
		
		}
	
	}
	
	public function actionresetPass()
	{
	
		if(isset($_POST['password']))
		{
		
			$id = $_POST['custId'];
			$user = User::model()->findByPk($id);
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
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect("/azkv.php");
	}
	public function actionOutstanding()
	{
		$this->layout = "white";
		$criteria = new CDbCriteria();
		/*
		$criteria = new CDbCriteria();
		if(Yii::app()->user->getState("typeUser")=="ProSuperMaster")
		{
			$criteria->condition = "lbloddsStatus = :status AND username IN (SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId))))";
			$criteria->params = array(':status'=>'running',":userId"=>Yii::app()->user->getId());
		}
		elseif(Yii::app()->user->getState("typeUser")=="superMaster")
		{
			$criteria->condition = "lbloddsStatus = :status AND username IN (SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId)))";
			$criteria->params = array(':status'=>'running',":userId"=>Yii::app()->user->getId());
		}
		elseif(Yii::app()->user->getState("typeUser")=="master")
		{
			$criteria->condition = "lbloddsStatus = :status AND username IN (SELECT username FROM tbl_user WHERE parentUser in(SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId))";
			$criteria->params = array(':status'=>'running',":userId"=>Yii::app()->user->getId());
		}
		elseif(Yii::app()->user->getState("typeUser")=="agent")
		{
			$criteria->condition = "lbloddsStatus = :status AND username IN (SELECT username FROM tbl_user WHERE parentUser = :userId)";
			$criteria->params = array(':status'=>'running',":userId"=>Yii::app()->user->getId());
		}
		else
		{
			$criteria->condition = "lbloddsStatus = :status";
			$criteria->params = array(':status'=>'running');
		}
		$criteria->limit = 100;
		$criteria->distinct = true;
		$criteria->select = array("username");
		$criteria->order = "Id DESC";
		
		$data = betData::model()->findAll($criteria);
		$this->render('outstanding',array(
		
			'data'=>$data,
		
		));
		*/
		$type = isset($_GET['type'])?$_GET['type']:"";
		if($type=="")
			return;
		$username = isset($_GET['custid'])?$_GET['custid']:Yii::app()->user->getId();
		if($type=="ProSuperMaster")
		{
			$criteria->condition = "parentUser = :user AND role = :role";
			$criteria->params = array(":user"=>$username,":role"=>"superMaster");
		
		}
		elseif($type=="superMaster")
		{
			$criteria->condition = "parentUser = :user AND role = :role";
			$criteria->params = array(":user"=>$username,":role"=>"master");
		}
		elseif($type=="master")
		{
			$criteria->condition = "parentUser = :user AND role = :role";
			$criteria->params = array(":user"=>$username,":role"=>"agent");
		}
		elseif($type=="agent")
		{
			$criteria->condition = "lbloddsStatus = :status AND username IN (SELECT username FROM tbl_user WHERE parentUser = :userId)";
			$criteria->params = array(':status'=>'running',":userId"=>$username);
		}
		else
		{
			$criteria->condition = "lbloddsStatus = :status";
			$criteria->params = array(':status'=>'running');
		}
		if($type!="agent" && $type!="admin")
		{
			$data = Admin::model()->findAll($criteria);
			$this->render("OutStandingAdmin",array(
			
				'data'=>$data,
			
			));
		}
		else
		{
			$criteria->limit = 100;
			$criteria->distinct = true;
			$criteria->select = array("username");
			$criteria->order = "Id DESC";
			$data = betData::model()->findAll($criteria);
			$this->render('outstanding',array(
		
				'data'=>$data,
		
			));
		}
		
	
	}

	public function actionOutstandingDetail()
	{
	
		
		$this->layout = "white";
		if(isset($_GET['username']))
		{
		
			$username = $_GET['username'];
			$criteria = new CDbCriteria();
			$criteria->condition = "lbloddsStatus = :status AND username = :username";
			$criteria->limit = 100;
			$criteria->order = "Id DESC";
			$criteria->params = array(':status'=>'running',':username'=>$username);
			$data = betData::model()->findAll($criteria);
		
		}
		$this->render("OutstandingDetail",array(
		
			'data'=>$data,
			'user'=>$username
		
		));
	
	
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
	public function actionCheckExit()
	{
	
		if(isset($_GET['username']) || isset($_POST['user']))
		{
		
			$username = isset($_GET['username'])?$_GET['username']:(isset($_POST['user'])?$_POST['user']:"");
			if(Yii::app()->user->getState("typeUser")=="agent")
			{
			
				$user = User::model()->findByAttributes(array(
				
					'username'=>$username
				
				));
				if($user!=null)
				{
					if(isset($_POST['user']))
					{
						echo "username not available";
					}
					else
					{
						header("Content-Type:text/plain");
						echo "{'errCode':999,'errMsg':'13705995'}";
					}
				}
				else
				{
					
					if(isset($_POST['user']))
					{
						echo "username availabel";
					}
					else
					{
						header("Content-Type:text/plain");
						echo "{'errCode':101,'errMsg':'Người chơi này không có thực '}";
					}
					
				}
			
			}
			elseif(Yii::app()->user->getState("typeUser")=="master" || Yii::app()->user->getState("typeUser")=="superMaster" || Yii::app()->user->getState("typeUser")=="ProSuperMaster")
			{
			
				$user = Admin::model()->findByAttributes(array(
				
					'Username'=>$username
				
				));
				if($user!=null)
				{
					if(isset($_POST['user']))
					{
						echo "username not available";
					}
					else
					{
						header("Content-Type:text/plain");
						echo "{'errCode':999,'errMsg':'13705995'}";
					}
				}
				else
				{
					
					if(isset($_POST['user']))
					{
						echo "username availabel";
					}
					else
					{
						header("Content-Type:text/plain");
						echo "{'errCode':101,'errMsg':'Người chơi này không có thực '}";
					}
					
				}
			
			}
			elseif(Yii::app()->user->getState("typeUser")=="admin")
			{
			
				$referrer = Yii::app()->request->urlReferrer;
				if(strpos($referrer,"AddNewUser")!==false)
				{
					$user = User::model()->findByAttributes(array(
					
						'username'=>$username
					
					));
					if($user!=null)
					{
						if(isset($_POST['user']))
						{
							echo "username not available";
						}
						else
						{
							header("Content-Type:text/plain");
							echo "{'errCode':999,'errMsg':'13705995'}";
						}
					}
					else
					{
						
						if(isset($_POST['user']))
						{
							echo "username availabel";
						}
						else
						{
							header("Content-Type:text/plain");
							echo "{'errCode':101,'errMsg':'Người chơi này không có thực '}";
						}
						
					}
				}
				else
				{
					$user = Admin::model()->findByAttributes(array(
				
						'Username'=>$username
					
					));
					if($user!=null)
					{
						if(isset($_POST['user']))
						{
							echo "username not available";
						}
						else
						{
							header("Content-Type:text/plain");
							echo "{'errCode':999,'errMsg':'13705995'}";
						}
					}
					else
					{
						
						if(isset($_POST['user']))
						{
							echo "username availabel";
						}
						else
						{
							header("Content-Type:text/plain");
							echo "{'errCode':101,'errMsg':'Người chơi này không có thực '}";
						}
						
					}
			
				}
			
			}
		
		}
	
	}
	public function actionRecheckIn()
	{
		header("Content-Type:text/plain");
		echo "{'errCode':0}";
		
	}
	public function actionGetMessages()
	{
		
		header("Content-Type:text/plain");
		$criteria = new CDbCriteria;
		$criteria->limit = 1;
		$criteria->order = "Id DESC";
		$criteria->condition = "type = 1";
		$message = hotNew::model()->findAll($criteria);
		
		echo "{'public_message':[".$message[0]->Id.",'".str_replace(array('"',"'"),array('\"',"\'"),$message[0]->content)."','normal'],'private_message':[null,null],'unread_private_messages':0}";
		
	}
	public function actionFooter()
	{
		$this->layout = "white";
		$this->render("footer");
	}
	public function actionMessageHistory()
	{
		$this->layout = "white";
		$criteria = new CDbCriteria;
		$criteria->limit = 20;
		$criteria->order = "Id DESC";
		$criteria->condition = "type = 1";
		$message = hotNew::model()->findAll($criteria);
		$this->render("messageHistory",array(
		
			'message'=>$message,
		
		));
	}
	
	
}