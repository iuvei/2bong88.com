<?php

/**
 * This is the model class for table "table_order".
 *
 * The followings are the available columns in table 'table_order':
 * @property integer $Id
 * @property string $type_order
 * @property integer $sended
 * @property integer $time_create
 * @property string $content
 * @property string $status
 * @property string $Ip
 * @property integer $IdUser
 * @property string $email
 * @property string $code
 * @property integer $try
 * @property integer $viewed
 * @property string $ToAccount
 * @property double $AmountVND
 * @property double $AmountUSD
 * @property string $ToAccountName
 * @property string $ToBankName
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_order, time_create, Ip, IdUser, code, ToAccount, AmountVND, AmountUSD, ToAccountName, ToBankName', 'required'),
			array('sended, time_create, IdUser, try, viewed', 'numerical', 'integerOnly'=>true),
			array('AmountUSD','numerical','min'=>0.1,'tooSmall'=>'Your amount to small'),
			array('ToAccount','checkWithDraw'),
			array('ToBankName','checkToBankName'),
			//array('time_create','checkTime','on'=>'checkCreateTime'),
			array('type_order, Ip, ToAccount', 'length', 'max'=>50),
			array('status', 'length', 'max'=>30),
			array('email, ToAccountName, ToBankName', 'length', 'max'=>100),
			array('code', 'length', 'max'=>300),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, type_order, sended, time_create, content, status, Ip, IdUser, email, code, try, viewed, ToAccount, AmountVND, AmountUSD, ToAccountName, ToBankName', 'safe', 'on'=>'search'),
		);
	}
	public function checkWithDraw()
	{
	
		if($this->type_order=="withdraw")
		{
		
			
			$orders = Order::model()->findByAttributes(array(
			
				'IdUser'=>$this->IdUser,
				'type_order'=>'deposit',
				'ToAccount'=>$this->ToAccount,
				'ToBankName'=>$this->ToBankName,
			
			
			));
			if($orders==null)
			{
			
				$this->addError("ToAccount","Tài khoản nhận không hợp lệ do chưa thực hiện nạp tiền lần nào bằng tài khoản này!!!");
			
			}
		
		
		}
	
	
	}
	public function checkTime()
	{
	
		$criteria = new CDbCriteria();
		$criteria->condition = "type_order = :type_order AND IdUser = :idUser";
		$criteria->params = array(":type_order"=>$this->type_order,":idUser"=>$this->IdUser);
		$criteria->order = "Id DESC";
		$criteria->limit = 1;
		$order = Order::model()->findAll($criteria);
		if($order!=null)
		{
		
			$lastTimeCreate = $order[0]->time_create;
			
			$preHours = strtotime("-8 hours");
			if($lastTimeCreate>$preHours)
			{
			
				$this->addError("time_create","You are limited create order in 8h!");
			
			}
			
		
		}
	
	}
	
	public function checkToBankName()
	{
	
	
		$bankName = array("BTC","PM","WMZ");
		if(!in_array($this->ToBankName,$bankName))
			$this->addError("ToBankName","Loại ngân hàng bạn nhập không cho phép");
		
	
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'Mã order',
			'type_order' => 'Loại Giao Dịch',
			'sended' => 'Đã gửi',
			'time_create' => 'Thời Gian',
			'content' => 'Nội Dung',
			'status' => 'Trạng Thái',
			'Ip' => 'Ip',
			'IdUser' => 'Id User',
			'email' => 'Email',
			'code' => 'Code',
			'try' => 'Try',
			'viewed' => 'Viewed',
			'ToAccount' => 'To Account',
			'AmountVND' => 'Amount Vnd',
			'AmountUSD' => 'Amount Usd',
			'ToAccountName' => 'To Account Name',
			'ToBankName' => 'To Bank Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('type_order',$this->type_order,true);
		$criteria->compare('sended',$this->sended);
		$criteria->compare('time_create',$this->time_create);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Ip',$this->Ip,true);
		$criteria->compare('IdUser',$this->IdUser);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('try',$this->try);
		$criteria->compare('viewed',$this->viewed);
		$criteria->compare('ToAccount',$this->ToAccount,true);
		$criteria->compare('AmountVND',$this->AmountVND);
		$criteria->compare('AmountUSD',$this->AmountUSD);
		$criteria->compare('ToAccountName',$this->ToAccountName,true);
		$criteria->compare('ToBankName',$this->ToBankName,true);

		return new CActiveDataProvider($this, array(
			'pagination'=>array(
                                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                        ),
			'criteria'=>$criteria,
		));
	}
	
	public function getAmountRef($bank, $amount)
	{
	
		if($bank!="BTC")
			return ($amount*0.5)/100;
		else
		{
		
			$rateBtcStanda = json_decode(file_get_contents("https://btc-e.com/api/3/ticker/btc_usd"));
			$received = $amount*$rateBtcStanda->btc_usd->sell;
			return ($received*0.5)/100;
		
		}
	
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
