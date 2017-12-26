<?php

/**
 * This is the model class for table "tbl_statement".
 *
 * The followings are the available columns in table 'tbl_statement':
 * @property integer $Id
 * @property string $username
 * @property integer $time
 * @property double $turnover
 * @property double $credit
 * @property double $com
 * @property double $balance
 */
class Statement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_statement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, time, turnover, credit, com, balance', 'required'),
			array('time, type', 'numerical', 'integerOnly'=>true),
			array('turnover, credit, com, balance', 'numerical'),
			array('username', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, username, time, turnover, credit, com, balance', 'safe', 'on'=>'search'),
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
			'time' => 'Time',
			'turnover' => 'Turnover',
			'credit' => 'Credit',
			'com' => 'Com',
			'balance' => 'Balance',
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
		$criteria->compare('time',$this->time);
		$criteria->compare('turnover',$this->turnover);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('com',$this->com);
		$criteria->compare('balance',$this->balance);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Statement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
