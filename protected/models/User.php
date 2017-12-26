<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $Id
 * @property string $username
 * @property string $password
 * @property string $fullName
 * @property double $credit
 * @property double $balance
 * @property double $yesterdayBalance
 * @property double $betCredit
 * @property double $outStanding
 * @property double $memberTurnover
 * @property integer $lastLogin
 * @property string $ipLogin
 * @property integer $status
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $totalOutStanding;
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('lastLogin, status', 'numerical', 'integerOnly'=>true),
			array('credit, balance, yesterdayBalance, memberTurnover', 'numerical'),
			array('username', 'length', 'max'=>200),
			array('nickname', 'length', 'max'=>15),
			array('username, email, PayAccount, nickname', 'unique'),
			array('Payname, bonusBalance, settingOptions','safe'),
			array('betCredit, outStanding, credit','numerical','min'=>0,'tooSmall'=>'Your data is to small'),
			
			array('email','email'),
			array('password, fullName', 'length', 'max'=>300),
			array('ipLogin', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, username, password, fullName, credit, balance, yesterdayBalance, betCredit, outStanding, memberTurnover, lastLogin, ipLogin, status', 'safe', 'on'=>'search'),
		);
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
			'Id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'fullName' => 'Full Name',
			'credit' => 'Credit',
			'balance' => 'Balance',
			'yesterdayBalance' => 'Yesterday Balance',
			'betCredit' => 'Bet Credit',
			'outStanding' => 'Out Standing',
			'memberTurnover' => 'Member Turnover',
			'lastLogin' => 'Last Login',
			'ipLogin' => 'Ip Login',
			'status' => 'Status',
			'email'=>'Email',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullName',$this->fullName,true);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('yesterdayBalance',$this->yesterdayBalance);
		$criteria->compare('betCredit',$this->betCredit);
		$criteria->compare('outStanding',$this->outStanding);
		$criteria->compare('memberTurnover',$this->memberTurnover);
		$criteria->compare('lastLogin',$this->lastLogin);
		$criteria->compare('ipLogin',$this->ipLogin,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('PayAccount',$this->PayAccount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function validatePassword($password)
	{
	
		
		return $this->hashPassword($password) == $this->password;
	
	}
	public function hashPassword($password)
	{
	
		return md5(md5((md5($password).$this->username)).$this->Id);
	
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
