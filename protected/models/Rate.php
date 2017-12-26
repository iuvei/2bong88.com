<?php

/**
 * This is the model class for table "table_rate".
 *
 * The followings are the available columns in table 'table_rate':
 * @property integer $Id
 * @property integer $BuyInPm
 * @property integer $SellOutPm
 * @property integer $BuyInUpay
 * @property integer $SellOutUpay
 * @property integer $BuyInPmU
 * @property integer $SellOutPmU
 * @property integer $BuyInUpayU
 * @property integer $SellOutUpayU
 */
class Rate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BuyInPm, SellOutPm, BuyInUpay, SellOutUpay, BuyInPmU, SellOutPmU, BuyInUpayU, SellOutUpayU', 'required'),
			array('BuyInPm, SellOutPm, BuyInUpay, SellOutUpay, BuyInPmU, SellOutPmU, BuyInUpayU, SellOutUpayU', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, BuyInPm, SellOutPm, BuyInUpay, SellOutUpay, BuyInPmU, SellOutPmU, BuyInUpayU, SellOutUpayU', 'safe', 'on'=>'search'),
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
			'BuyInPm' => 'Tỷ giá mua vào PM',
			'SellOutPm' => 'Tỷ giá bán ra PM',
			'BuyInUpay' => 'Tỷ giá mua vào Upay',
			'SellOutUpay' => 'Tỷ giá bán ra Upay',
			'BuyInPmU' => 'Tỷ giá mua vào Pm với user Login',
			'SellOutPmU' => 'Tỷ giá bán ra Pm với User Login',
			'BuyInUpayU' => 'Tỷ giá mua vào Upay với User Login',
			'SellOutUpayU' => 'Tỷ giá bán ra Upay với User Login',
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
		$criteria->compare('BuyInPm',$this->BuyInPm);
		$criteria->compare('SellOutPm',$this->SellOutPm);
		$criteria->compare('BuyInUpay',$this->BuyInUpay);
		$criteria->compare('SellOutUpay',$this->SellOutUpay);
		$criteria->compare('BuyInPmU',$this->BuyInPmU);
		$criteria->compare('SellOutPmU',$this->SellOutPmU);
		$criteria->compare('BuyInUpayU',$this->BuyInUpayU);
		$criteria->compare('SellOutUpayU',$this->SellOutUpayU);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
