<?php

/**
 * This is the model class for table "table_sms".
 *
 * The followings are the available columns in table 'table_sms':
 * @property integer $Id
 * @property string $sender
 * @property string $text
 * @property string $time_create
 * @property string $IMEI
 */
class Sms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender, text, time_create, IMEI', 'required'),
			array('sender, IMEI', 'length', 'max'=>100),
			array('sender','checkSender'),
			array('IMEI','checkIMEI'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, sender, text, time_create, IMEI', 'safe', 'on'=>'search'),
		);
	}
	public function checkIMEI()
	{
	
		$Config = Config::model()->findByPk(1);
		$crypt = new Crypt();
		$IMEI = $crypt->decrypt($Config->IMEI);
		if($IMEI!=$this->IMEI)
			$this->addError("IMEI","IMEI invalid");
	
	}
	public function checkSender()
	{
	
		$array_bank = array("Vietcombank","Techcombank","Viettinbank","ACB","DongA Bank","+841689937932","1900545464","01689937932","01664260189","+841664260189");
		if(!in_array($this->sender,$array_bank))
			$this->addError("sender","sender invalid");
	
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
			'sender' => 'Sender',
			'text' => 'Text',
			'time_create' => 'Time Create',
			'IMEI' => 'Imei',
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
		$criteria->compare('sender',$this->sender,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('time_create',$this->time_create,true);
		$criteria->compare('IMEI',$this->IMEI,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
