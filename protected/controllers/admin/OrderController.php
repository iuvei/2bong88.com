<?php

class OrderController extends AdminController
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
				'actions'=>array('admin','delete','AjaxUpdate','ReCheck'),
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
	public function actionAjaxUpdate()
	{
	
		if(isset($_GET['act']))
		{
			$act = $_GET['act'];
			if($act=="doDeleteAll")
			{
			
				Order::model()->deleteAll();
			
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
		$text = "";
		
		$model = $this->loadModel($id);
		$model->viewed = 1;
		$model->save();
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'text'=>$text,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Order;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
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

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
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
		//if(!isset($_GET['ajax']))
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Order');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->dbCriteria->order='Id DESC';
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];
		if (isset($_GET['pageSize']))
		{
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);
        }
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionReCheck()
	{
	
	
		if(isset($_POST['id']))
		{
		
			$id = $_POST['id'];
			$order = Order::model()->findByPk($id);
			
			if($order!=null)
			{
			
				$idUser = $order->IdUser;
				$user = User::model()->findByPk($idUser);
				if($order->type_order=="deposit")
				{
				
					$userBetFirst = userBet::model()->findByAttributes(array(
				
					'idUser'=>$idUser,
				
					));
					if($userBetFirst==null)
					{
					
						$nullUserBet = userBet::model()->findByAttributes(array(
				
						'idUser'=>0,
				
						));
						if($nullUserBet!=null)
						{
						
							$nullUserBet->idUser = $idUser;
							$nullUserBet->save();
						
						}
						else
						{
						
							echo 'Không còn tài khoản bong888, quí vị vui lòng liên hệ admin để được hỗ trợ';
							return;
						
						}
					
					}
				
				}
				$userBet = userBet::model()->findByAttributes(array(
				
					'idUser'=>$idUser,
				
				));
				if($userBet!=null)
				{
				
					if($order->type_order=="withdraw")
					{
					
						if($order->ToBankName=="PM")
						{
						
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total=="false")
							{
							
								echo 'Không thể lấy thông tin tài khoản bên bong88, vui lòng liên hệ admin';
								return;
							
							}
							
							$current = $order->AmountUSD;
							$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"with");
							if($dataEdit=="okie")
							{
							
								$crypt = new Crypt();
								$Payment = Payment::model()->findByPk(1);
								
								$pmpass = $crypt->decrypt($Payment->passwordPm);
								$pmuser = $Payment->userPm;
								$pmacc = $Payment->IdPm;
								$sendMoney = $this->sendMoney($pmuser,$pmpass,$pmacc,$order->ToAccount,$order->AmountUSD);
								if($sendMoney)
								{
								
									$user->balance = $total - $current;
									$user->save();
									$order->status = "completed";
									$order->save();
									echo 'okie';
								
								}else echo 'Không thể gửi tiền! thử lại!!!';
							
							}else echo 'Không thể sửa thông tin bên bong88, vui lòng liên hệ admin';
							
							
							
					
						
						
						}
						elseif($order->ToBankName=="VietComBank")
						{
						
							
							$findcCode = $order->code;
							$criteria = new CDbCriteria();
							$criteria->condition = "text LIKE :code";
							$criteria->params = array (':code'=> "%$findcCode");
							$sms = Sms::model()->findAll($criteria);
							if($sms!=null)
							{
							
								echo 'Cheat';
								return false;
							
							}
							
							
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total)
							{
								$current = $order->AmountUSD;
								
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"with");
								if($dataEdit=="okie")
								{
									$user->balance = $total - $current;
									$user->save();
								}
								else
								{
								
									echo 'Không thể sửa thông tin tài khoản từ bong88, vui lòng liên hệ admin';
									return;
								
								}
								
								
							}
							else
							{
							
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								return;
							
							}
							$vcb = new VCB();
							$dataLogin = $vcb->GetTrans($order->ToAccount,$order->AmountVND,$order->code);
							if($dataLogin==true)
							{
								$order->status = "completed";
								$order->save();
								echo 'okie';
							}
							else
							{
							
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								$vcb->CleanCookie();
							
							}
						
						
						}//End Withdraw By VietComBank
						elseif($order->ToBankName=="AChauBank")
						{
						
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total!="false")
							{
								$current = $order->AmountUSD;
								
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"with");
								if($dataEdit=="okie")
								{
									$user->balance = $total - $current;
									$user->save();
								}
								else
								{
								
									echo 'Không thể sửa thông tin tài khoản từ bong88, vui lòng liên hệ admin';
									return;
								
								}
								
							}
							else
							{
							
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								return;
							
							}
							$ACB = new ACB();
							$dataLogin = $ACB->Trans($order->AmountVND,$order->ToAccount);
							if($dataLogin==true)
							{
								$order->status = "completed";
								$order->save();
								echo 'okie';
							}
						
						}
						elseif($order->ToBankName=="DongABank")
						{
						
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total!="false")
							{
								$current = $order->AmountUSD;
								
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"with");
								if($dataEdit=="okie")
								{
									$user->balance = $total - $current;
									$user->save();
								}
								else
								{
								
									echo 'Không thể sửa thông tin tài khoản từ bong88, vui lòng liên hệ admin';
									return;
								
								}
								
							}
							else
							{
							
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								return;
							
							}
							$bootBank = new BootBank();
							$dataLogin = $bootBank->Trans($order->AmountVND,$order->ToAccount,$order->Id);
							if($dataLogin==true)
							{
								echo 'okie';
								return true;
							}else{
							
								$order->status = "error";
								$order->save();
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								return false;
							
							}
						
						}
						elseif($order->ToBankName=="BTC")
						{
						
							
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total!="false")
							{
								$current = $order->AmountUSD;
								
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"with");
								if($dataEdit=="okie")
								{
									$user->balance = $total - $current;
									$user->save();
								}
								else
								{
								
									echo 'Không thể sửa thông tin tài khoản từ bong88, vui lòng liên hệ admin';
									return;
								
								}
								
							}
							else
							{
							
								echo 'Không thể gửi tiền! vui lòng liên hệ admin hoặc thử lại!';
								return;
							
							}
							$eBank = Ebank::model()->findByPk(1);
							$crypt = new Crypt();
							$passBtc = $crypt->decrypt($eBank->BtcPass);
							$passBtc2 = $crypt->decrypt($eBank->BtcSencondPass);
							$idBtc = $eBank->BtcId;
							$btc = new BTC($idBtc,$passBtc,$passBtc2,"",$order->ToAccount);
							$amount = round(($order->AmountUSD/$eBank->BtcRate)*100000000);
							
							$data = $btc->sendMoney($amount);
							if(strpos($data,'error')===false)
							{
							
								$order->status = "completed";
								$order->save();
								echo 'okie';
							
							}
							else
							{
							
								$order->status = "error";
								$order->content = $data;
								$order->save();
								echo 'Không thể gửi tiền đến tài khoản BTC của bạn';
								return;
							
							}
							
						
						
						}
						
					
					
					}
					elseif($order->type_order=="deposit")
					{
					
						if($order->ToBankName=="PM")
						{
						
							
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							
							if($total!="false")
							{
								
								$current = $order->AmountUSD;
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"dep");
								
								if($dataEdit=="okie")
								{
									$user->balance = $current+$total;
									$user->save();
									$order->status = "completed";
									$order->save();
									echo 'okie';
								}else echo 'Không thể nạp tiền do phát sinh lỗi từ bong88, vui lòng liên hệ admin! thử lại!!!';
							}else echo 'Không thể nạp tiền do phát sinh lỗi từ bong88, vui lòng liên hệ admin! thử lại!!!';
						
						}
						else
						{
						
							$b88ag = new B88AG();
							$b88ag->Login();
							$total = $b88ag->getAccBalanceNon($userBet->username);
							if($total!="false")
							{
								$current = $order->AmountUSD;
								$dataEdit = $b88ag->EditBalanceNon($current,$userBet->username,"dep");
								if($dataEdit=="okie")
								{
									$user->balance = $current+$total;
									$user->save();
									$order->status = "completed";
									$order->save();
									echo 'okie';
								}else echo 'Không thể gửi tiền do phát sinh lỗi từ bong88, vui lòng liên hệ admin! thử lại!!!';
							}else echo 'Không thể gửi tiền! thử lại!!!';
						
						
						}
					
					}
				
				
				}
			
			
			}else echo 'Không tìm thấy đơn hàng!!!';
		
		
		
		}
		
		else echo 'No have Id';
	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
