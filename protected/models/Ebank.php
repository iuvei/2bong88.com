<?php

/**
 * This is the model class for table "tbl_Ebank".
 *
 * The followings are the available columns in table 'tbl_Ebank':
 * @property integer $Id
 * @property string $BtcId
 * @property string $BtcPass
 * @property string $BtcSencondPass
 * @property string $WmzEmail
 * @property string $WmzPass
 * @property string $WmzId
 */
class Ebank extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_Ebank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BtcId, BtcPass, BtcSencondPass, WmzEmail, WmzPass, WmzId, BtcRate', 'required'),
			array('BtcId, BtcPass, BtcSencondPass, WmzEmail, WmzPass, WmzId', 'length', 'max'=>200),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, BtcId, BtcPass, BtcSencondPass, WmzEmail, WmzPass, WmzId', 'safe', 'on'=>'search'),
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
			'Id' => 'Id',
			'BtcId' => 'Tên đăng nhập BTC',
			'BtcPass' => 'Mật khẩu BTC',
			'BtcSencondPass' => 'Mật Khẩu Cấp 2 BTC',
			'WmzEmail' => 'Tên Đăng Nhập WMZ',
			'WmzPass' => 'Mật Khẩu WMZ',
			'WmzId' => 'ID WMZ',
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
		$criteria->compare('BtcId',$this->BtcId,true);
		$criteria->compare('BtcPass',$this->BtcPass,true);
		$criteria->compare('BtcSencondPass',$this->BtcSencondPass,true);
		$criteria->compare('WmzEmail',$this->WmzEmail,true);
		$criteria->compare('WmzPass',$this->WmzPass,true);
		$criteria->compare('WmzId',$this->WmzId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ebank the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
