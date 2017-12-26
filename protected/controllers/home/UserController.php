<?php

class UserController extends Controller
{
	
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
	// Uncomment the following methods and override them if needed
	public function filters() {
        return array(
            'accessControl',
        );
    }
	public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
    }
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionOpenOrder()
	{
	
		if(!Yii::app()->user->isGuest)
		{
		
			if(isset($_POST['typeOrder'])  && isset($_POST['total']))
			{
			
				$typeOrder = $_POST['typeOrder'];
				
				$idUser = Yii::app()->user->getId();
				if($idUser<=0 || $idUser=="")
				{
				
					echo 'Login Please!!!';
					return;
				
				}
				$user = User::model()->findByPk($idUser);
				$total = $_POST['total'];
				if($typeOrder=="withdraw" && $user->betCredit<$total)
				{	
					exit('Your balance is not enought for withdraw');
					return;
				}
				
				
				$order = new Order;
				$order->type_order = $typeOrder;
				$order->time_create = time();
				
				$order->Ip = Yii::app()->getRequest()->getUserHostAddress();
				$order->code = md5($this->generateRandomString());
				$order->IdUser = Yii::app()->user->getId();
				
				$order->ToAccount = $user->PayAccount;
				$order->ToBankName = $user->Payname;
				$order->AmountUSD = $total;
				$order->ToAccountName = $user->PayAccount;
				
				$order->AmountVND = $total*20000;
				$order->scenario = "checkCreateTime";
				
				if($order->save())
				{
				
					$this->redirect('/order-info/'.$order->code.'.html');
				
				}
				else
				{
				
					foreach($order->getErrors() as $errors)
					{
					
						foreach($errors as $error)
						{
						
							echo $error."<br>";
						
						}
					
					}
				
				}
			
			}else echo 'please fill full info!!!';
		
		}else echo 'please Login!!!';
	
	
	}
	
	public function actionOrderInfo($code)
	{
		
		$this->layout = "pay";
		$this->pageTitle = "Order Info";
		$message = "";
		if(Yii::app()->user->isGuest)
			$message = "Login please!!";
		$cookieOld = Yii::app()->request->cookies[$code];
		if($cookieOld!="")
		{
		
			unset(Yii::app()->request->cookies[$code]);
		
		}
		$cookie = md5($this->generateRandomString());
		Yii::app()->request->cookies[$code] = new CHttpCookie($code, $cookie);
		$order = Order::model()->findByAttributes(array(
		
			'code'=>$code,
		
		));
		if($order!=null)
		{
			$order->Cookie = $cookie;
			if(!$order->save())
			{
				foreach($order->getErrors() as $errors)
				{
				
					foreach($errors as $error)
					{
					
						echo $error.'<br>';
					
					}
				
				}
				
				return;
			}
			$this->render("OrderInfo",array(
			
				'order'=>$order,
				'message'=>$message,
			
			));
		}
		else echo 'can\' find Order';
	
	}
	
	
	public function actionDeposit()
	{
	
		$this->layout = "pay";
		$this->pageTitle = "Deposit";
		$id = Yii::app()->user->getId();
		if($id=="" || $id<=0)
			return;
		$user = User::model()->findByPk($id);
		if($user==null)
			return;
		$criteria = new CDbCriteria();
		$criteria->condition = "IdUser = :IdUser AND type_order = :type";
		$criteria->params = array(':IdUser'=>$user->Id,':type'=>"deposit");
		$criteria->limit = 200;
		$criteria->order = "Id DESC";
		$order = Order::model()->findAll($criteria);
			
		$this->render('deposit',array(
				
					'user'=>$user,
					'order'=>$order,
				
				));
	
	}
	public function actionWithdraw()
	{
	
		$this->layout = "pay";
		$this->pageTitle = "Withdraw";
		$id = Yii::app()->user->getId();
		if($id=="" || $id<=0)
			return;
		$user = User::model()->findByPk($id);
		if($user==null)
			return;
		$criteria = new CDbCriteria();
		$criteria->condition = "IdUser = :IdUser AND type_order = :type";
		$criteria->params = array(':IdUser'=>$user->Id,':type'=>"withdraw");
		$criteria->limit = 200;
		$criteria->order = "Id DESC";
		$order = Order::model()->findAll($criteria);
		
		$this->render('withdraw',array(
				
					'user'=>$user,
					'order'=>$order,
				
				));
	
	}
	public function actionSuccessPm()
	{
	
		
		
			$crypt = new Crypt();
			$Payment = Payment::model()->findByPk(1);
			//"BsOLS823xN4n0yuhKSdTrfGmc";
			$pmpass = $crypt->decrypt($Payment->passwordPm);
			$pmuser = $Payment->userPm;
			$pmacc = $Payment->IdPm;
			$time = (int)$_POST['TIMESTAMPGMT'];
			$hash = $crypt->decrypt($Payment->hashPm);
			$hash = strtoupper(md5($hash));
			$string=
                $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
                $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
                $_POST['PAYMENT_BATCH_NUM'].':'.
                $_POST['PAYER_ACCOUNT'].':'.$hash.':'.
                $_POST['TIMESTAMPGMT'];
                $hash=strtoupper(md5($string));
			if($hash==$_POST['V2_HASH'])
            {
				
				if($_POST['PAYEE_ACCOUNT']==$pmacc && $_POST['PAYMENT_UNITS']=='USD')
                {
				
					
					
					
					date_default_timezone_set('UTC');
					$url = 'https://perfectmoney.is/acct/historycsv.asp?AccountID='.$pmuser.'&PassPhrase='.$pmpass.'&startmonth='.date("m", $time).'&startday='.date("d", $time).'&startyear='.date("Y", $time).'&endmonth='.date("m", $time).'&endday='.date("d", $time).'&endyear='.date("Y", $time).'&paymentsreceived=1&batchfilter='.(int)$_POST['PAYMENT_BATCH_NUM'];
					
						$f=fopen($url,'rb');
						if($f===false) return 'error openning url';

						$lines=array();
						while(!feof($f)) array_push($lines, trim(fgets($f)));

						fclose($f);
					
					
					
					
					
					
					//echo $lines[0];
					if($lines[0]!='Time,Type,Batch,Currency,Amount,Fee,Payer Account,Payee Account,Payment ID,Memo')
					{
						 echo "Error, please contact admin!";
						 exit;
					}
					else
					{
					
						 $ar=array();
						 $n=count($lines);
						 if($n!=2) return 'payment not found';

						 $item=explode(",", $lines[1], 10);
						 if(count($item)!=10) return 'invalid API output';
						 $item_named['Time']=$item[0];
						 $item_named['Type']=$item[1];
						 $item_named['Batch']=$item[2];
						 $item_named['Currency']=$item[3];
						 $item_named['Amount']=$item[4];
						 $item_named['Fee']=$item[5];
						 $item_named['Payer Account']=$item[7];
						 $item_named['Payee Account']=$item[6];
						 $item_named['Payment ID']=$item[8];
						 $item_named['Memo']=$item[9];
						 if($item_named['Batch']==$_POST['PAYMENT_BATCH_NUM'] && $_POST['PAYMENT_ID']==$item_named['Payment ID'] && $item_named['Type']=='Income' && $_POST['PAYEE_ACCOUNT']==$item_named['Payee Account'] && $_POST['PAYMENT_AMOUNT']==$item_named['Amount'] && $_POST['PAYMENT_UNITS']==$item_named['Currency'] && $_POST['PAYER_ACCOUNT']==$item_named['Payer Account'])
						 {
								
							$memo = $_POST['SUGGESTED_MEMO'];
							$order = Order::model()->findByAttributes(array(
							
								'code'=>$memo,
								'status'=>'incomplete',
								
							
							));
							if($order!=null)
							{
							
								if($order->AmountUSD<=$_POST['PAYMENT_AMOUNT'])
								{
								
									$order->status = 'recieved';
									$order->save();
									$this->redirect(array("OrderInfo",'code'=>$order->code));
								
								}
							
							}else echo 'Can\'t found Order';
								
						 }
						 else
						 {
						 
						
							echo "Some payment data not match: 
							batch:  {$_POST['PAYMENT_BATCH_NUM']} vs. {$item_named['Batch']} = ".(($item_named['Batch']==$_POST['PAYMENT_BATCH_NUM']) ? 'OK' : '!!!NOT MATCH!!!')."
							payment_id:  {$_POST['PAYMENT_ID']} vs. {$item_named['Payment ID']} = ".(($item_named['Payment ID']==$_POST['PAYMENT_ID']) ? 'OK' : '!!!NOT MATCH!!!')."
							type:  Income vs. {$item_named['Type']} = ".(('Income'==$item_named['Type']) ? 'OK' : '!!!NOT MATCH!!!')."
							payee_account:  {$_POST['PAYEE_ACCOUNT']} vs. {$item_named['Payee Account']} = ".(($item_named['Payee Account']==$_POST['PAYEE_ACCOUNT']) ? 'OK' : '!!!NOT MATCH!!!')."
							amount:  {$_POST['PAYMENT_AMOUNT']} vs. {$item_named['Amount']} = ".(($item_named['Amount']==$_POST['PAYMENT_AMOUNT']) ? 'OK' : '!!!NOT MATCH!!!')."
							currency:  {$_POST['PAYMENT_UNITS']} vs. {$item_named['Currency']} = ".(($item_named['Currency']==$_POST['PAYMENT_UNITS']) ? 'OK' : '!!!NOT MATCH!!!')."
							payer account:  {$_POST['PAYER_ACCOUNT']} vs. {$item_named['Payer Account']} = ".(($item_named['Payer Account']==$_POST['PAYER_ACCOUNT']) ? 'OK' : '!!!NOT MATCH!!!');
							
							exit;					
							
						 
						 }
					
					}
				
				
				}
			
			
			}
		
		
	
	
	}
	
	
	public function actionGetStatus()
	{
	
		if(isset($_POST['code']))
		{
		
			$code = $_POST['code'];
			$cookie = Yii::app()->request->cookies[$code];
			$order = Order::model()->findByAttributes(array(
			
				'code'=>$code,
				'Cookie'=>$cookie,
			
			));
			if($order!=null)
				echo $order->status;
			else echo 'Cheat';
		
		}
	
	}
	public function product_price($priceFloat)
	{
		
		$symbol_thousand = ',';
		$decimal_place = 0;
		$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
		return $price;
	}
	
	public function actionValidateB()
	{
	
		if(!Yii::app()->user->isGuest && isset($_POST['code']))
		{
		
			$id = Yii::app()->user->getId();
			$code = $_POST['code'];
			$order = Order::model()->findByAttributes(array(
			
				'code'=>$code,
				'IdUser'=>$id,
				'status'=>'incomplete',
			
			));
			if($order!=null)
			{
			
				$user = User::model()->findByPk($id);
				$total = $order->AmountUSD;
				
				$balance = $user->balance;
				$betCredit = $user->betCredit;
				
				if($total>$betCredit)
				{
				
					echo 'You only able withdraw from bet credit, Tomorrow, we will calculator and win lost money will be added in your bet credit';
					return;
				
				}
				
				if($betCredit > $total)
				{
				
					$order->status = "recieved";
					$order->save();
					echo 'Your Balance is able withdraw';
				
				
				}else echo 'Your balance can\'t with draw';
			
			
			}else echo 'Order invalid';
		
		
		}else echo 'Data invalid';
	
	
	}
	
	public function actionProcessOrder()
	{
	
		if(isset($_POST['code']) && !Yii::app()->user->isGuest)
		{
		
			$myCode = $_POST['code'];
			$idUser = Yii::app()->user->getId();
			$user = User::model()->findByPk($idUser);
			$cookie = Yii::app()->request->cookies[$myCode];
			
			
			
			$order = Order::model()->findByAttributes(array(
			
				'code'=>$_POST['code'],
				'status'=>'recieved',
				'Cookie'=>$cookie,
				'IdUser'=>$idUser,
			
			));
			if($order!=null)
			{
			
				
				if($order->type_order=="withdraw")
				{
				
					if($order->ToBankName=="PM")
					{
					
						$crypt = new Crypt();
						$Payment = Payment::model()->findByPk(1);
						
						$pmpass = $crypt->decrypt($Payment->passwordPm);
						$pmuser = $Payment->userPm;
						$pmacc = $Payment->IdPm;
						$user->betCredit = $user->betCredit - $order->AmountUSD;
						if(!$user->save())
							return 'Can\'t save user data!!!';
						$sendMoney = $this->sendMoney($pmuser,$pmpass,$pmacc,$order->ToAccount,$order->AmountUSD);
						if($sendMoney)
						{
						
							
							$order->status = "completed";
							$order->save();
							echo 'okie';
						
						}else echo 'Can\'t send money!!!';
						
				
					
					
					}
					elseif($order->ToBankName=="BTC")
					{
					
						
						
						$user->betCredit = $user->betCredit - $order->AmountUSD;
						if(!$user->save())
							return 'Can\'t save user data!!!';
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
							echo 'Can\'t send money to your BitCoin address';
							return;
						
						}
						
					
					
					}
					
				
				
				}
				elseif($order->type_order=="deposit")
				{
				
					$user->credit = $order->AmountUSD+$user->credit;
					$user->betCredit = $order->AmountUSD+$user->betCredit;
					if(!$user->save())
						exit('error while save user data');
					$order->status = "completed";
					$order->save();
					echo 'okie';
				}
			
			
			
			}else echo 'Order is not found';
		}
	
	
	}
	
	public function actionDataRef()
	{
	
		$criteria = new CDbCriteria();
		$criteria->condition = "IdRef = :id";
		$criteria->order = "Id DESC";
		$criteria->limit = 200;
		$criteria->params = array(":id"=>Yii::app()->user->getId());
		
		$dataRef = dataRef::model()->findAll($criteria);
		$this->render('dataRef',array(
		
			'dataRef'=>$dataRef,
		
		));
	}
	
	function sendMoney($accId,$pass,$Payer,$accRecieve,$amount)
	{
		//echo time().'<br>';
		$f=fopen('https://perfectmoney.is/acct/confirm.asp?AccountID='.$accId.'&PassPhrase='.$pass.'&Payer_Account='.$Payer.'&Payee_Account='.$accRecieve.'&Amount='.$amount.'&PAY_IN=1&PAYMENT_ID=1223', 'rb');

		if($f===false)
		{
		  error_log("false open url");
		  return false;
		  
		}

		// getting data
		$out=array(); $out="";
		while(!feof($f)) $out.=fgets($f);

		fclose($f);

		// searching for hidden fields
		if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER))
		{
		   error_log('false pm');
		   return false;
		   
		}

		$ar="";
		foreach($result as $item)
		{
		   $key=$item[1];
		   $ar[$key]=$item[2];
		}
		error_log(json_encode($ar));

		return true;
		
	}
	
	public function actionCheckBTC()
	{
	
		if(isset($_POST['code']))
		{
		
			$code = $_POST['code'];
			$address = $_POST['address'];
			if(!Yii::app()->user->isGuest)
			{
			
				$order = Order::model()->findByAttributes(array(
				
					'code'=>$code,
					'status'=>'incomplete',
				
				));
				if($order!=null)
				{
				
					$eBank = Ebank::model()->findByPk(1);
					$crypt = new Crypt();
					$passBtc = $crypt->decrypt($eBank->BtcPass);
					$passBtc2 = $crypt->decrypt($eBank->BtcSencondPass);
					$idBtc = $eBank->BtcId;
					$btc = new BTC($idBtc,$passBtc,$passBtc2,"",$order->ToAccount);
					$amount = floor(round(($order->AmountUSD/$eBank->BtcRate)*100000000,8));
					
					$balance = $btc->GetBalance($address);
					if($amount<=$balance)
					{
					
						$order->status = "recieved";
						$order->save();
						echo 'okie';
						
					
					
					}else echo $balance."----".$amount;
				
				
				}
			
			
			}
		
		
		}
	
	}
	
	
	public function actionSendMail()
	{
	
		$this->mailsend('vietnamcreativework@gmail.com','wcointrade.com','Thông tin đơn hàng từ wcointrade.com','Mật khẩu là cái gì đó???');
		
	
	}
	
	public function actionCheckOrderWMZ()
	{
	
	
		if(isset($_POST['code']))
		{
		
			$code = $_POST['code'];
			$order = Order::model()->findByAttributes(array(
			
				'code'=>$code,
				'status'=>'incomplete',
				
			
			));
			if($order!=null)
			{
			
				$eBank = Ebank::model()->findByPk(1);
				$crypt = new Crypt();
				$WmzPass = $crypt->decrypt($eBank->WmzPass);
				$WmzEmail = $eBank->WmzEmail;
				$WmzId = $eBank->WmzId;
				$wmz = new WMZ($WmzEmail,$WmzPass,"gobetvn","Hanoi123",$WmzId);
				$memo = $order->code;
				$total = $order->AmountUSD;
				$dataCheck = $wmz->checkBalance($memo,$total);
				if($dataCheck=="okie")
				{
				
					$order->status = "recieved";
					$order->save();
					echo 'okie';
				
				
				}else echo 'Can\'t found your payment!!!';
			
			}
		
		
		}
	
	
	}
	public function actionPreferences()
	{
	
		$this->layout = "main";
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user!=null)
		{
		
			$this->render('preferences',array(
			
				'user'=>$user,
			
			));
		
		}
	
	}
	public function actionChangePass()
	{
	
		$this->layout = "main";
		$message = "";
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user!=null)
		{
		
			if(isset($_POST['txtOldPW']))
			{
			
				$oldPass = $_POST['txtOldPW'];
				$newPass = $_POST['txtPW'];
				$ConfirmNewPass = $_POST['txtConPW'];
				if($user->validatePassword($oldPass))
				{
				
					if($newPass==$ConfirmNewPass)
					{
					
						$user->password = $user->hashPassword($newPass);
						$user->save();
						$message =  'success';
					
					}else $message = 'password confirm must same password';
				
				}else $message = 'invalid current password!!!';
			
			}
			$this->render('changePass',array(
			
				'user'=>$user,
				'message'=>$message,
			
			));
		
		}
	
	}
	public function actionaffiliate()
	{
	
		$this->layout = "main";
		$this->render('affiliate');
	
	}
	public function mailsend($to,$from,$subject,$message){
        $mail=Yii::app()->Smtpmail;
        $mail->SetFrom($from, 'wcointrade.com');
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to, "");
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else {
            echo "Message sent!";
        }
    }
	public function actionAllStatement()
	{
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user==null)
			Yii::app()->user->logout();
		$criteria = new CDbCriteria;
		$criteria->condition = "username = :user AND time >= :time";
		$criteria->params = array(":user"=>$user->username,":time"=>strtotime(("today")-7*24*60*60));
		$criteria->limit = 100;
		$criteria->order = "Id DESC";
		$statement = Statement::model()->findAll($criteria);
			
		$this->render("allStatement",array(
		
			'statement'=>$statement,
		
		));
	}
	public function actionchangeNickname()
	{
		$message = "";
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user==null)
			Yii::app()->user->logout();
		$this->layout = "white";
		if(isset($_POST['txtNickname']))
		{
			if($user->nickname!="")
				$message = "you had your nick name!!!";
			else
			{
				$txtNickname = $_POST['txtNickname'];
				$messsage = (User::model()->findByAttributes(array("nickname"=>$txtNickname))==null)?"ok":"Nickname exist!!!";
			}
			if($messsage=="ok")
			{
				$user->nickname = $txtNickname;
				if($user->save())
					$message = "Update Success";
				else
					$message = "Update Failed!";
			}
		}
		$this->render("changeNick",array(
		
			'message'=>$message,
			'user'=>$user,
		
		));
	}
	
	
	
	
}