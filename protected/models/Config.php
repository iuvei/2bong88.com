<?php

/**
 * This is the model class for table "table_config".
 *
 * The followings are the available columns in table 'table_config':
 * @property integer $Id
 * @property string $siteTitle
 * @property string $siteKeyword
 * @property string $siteDes
 * @property string $IMEI
 * @property string $user_vtc
 * @property string $pass_vtc
 * @property string $key
 */
class Config extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('siteTitle, siteKeyword, siteDes, IMEI,key, siteOffline, allowReg, GetBalance, pageCapt, userB88ag, passB88ag, keyB88ag', 'required'),
			array('siteTitle, siteKeyword, siteDes, IMEI', 'length', 'max'=>200),
			array('Facebook, Viber, balancePm, balanceUpay,balanceVCB','safe'),
			array('key', 'length', 'max'=>7),
			array('supportContent, guideContent','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, siteTitle, siteKeyword, siteDes, IMEI, key', 'safe', 'on'=>'search'),
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
			'siteTitle' => 'Site Title',
			'siteKeyword' => 'Site Keyword',
			'siteDes' => 'Site Des',
			'IMEI' => 'Imei',
			'supportContent'=>'Nội dung trợ giúp',
			'guideContent'=>'Nội dung hướng dẫn',
			'key' => 'Key',
			'option_auto'=>'Chế độ lấy thẻ',
			'phone'=>'Điện thoại',
			'yahoo'=> 'Yahoo',
			'Skype'=>'Skype',
			'email'=>'Email',
			'Facebook'=>'Facebook',
			'Viber'=>'Twiter',
			'Fanpage'=>'Fanpage Facebook',
			'address'=>'Địa chỉ',
			'copyright'=>'Copyright',
			'siteOffline'=>'Site Offline',
			'textOffline'=>'Text Offline',
			'allowReg'=>'Cho phép đăng ký',
			'GetBalance'=>'Hiện thị số tiền PM',
			'balancePm'=>'Số tiền trong Pm',
			'balanceUpay'=>'Số tiền trong Upay',
			'balanceVCB'=>'Số tiền trong VCB',
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
		$criteria->compare('siteTitle',$this->siteTitle,true);
		$criteria->compare('siteKeyword',$this->siteKeyword,true);
		$criteria->compare('siteDes',$this->siteDes,true);
		$criteria->compare('IMEI',$this->IMEI,true);
		
		$criteria->compare('key',$this->key,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
