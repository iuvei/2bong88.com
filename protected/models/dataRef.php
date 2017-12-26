<?php

/**
 * This is the model class for table "tabl_dataRef".
 *
 * The followings are the available columns in table 'tabl_dataRef':
 * @property integer $idUser
 * @property double $totaldeposit
 * @property integer $time
 * @property double $Total
 * @property integer $Id
 * @property integer $IdRef
 * @property integer $IdOrder
 * @property string $Ip
 */
class dataRef extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tabl_dataRef';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, totaldeposit, time, Total, IdRef, IdOrder, Ip', 'required'),
			array('idUser, time, IdRef, IdOrder', 'numerical', 'integerOnly'=>true),
			array('totaldeposit, Total', 'numerical'),
			array('Ip', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUser, totaldeposit, time, Total, Id, IdRef, IdOrder, Ip', 'safe', 'on'=>'search'),
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
			'idUser' => 'Id User',
			'totaldeposit' => 'Totaldeposit',
			'time' => 'Time',
			'Total' => 'Total',
			'Id' => 'ID',
			'IdRef' => 'Id Ref',
			'IdOrder' => 'Id Order',
			'Ip' => 'Ip',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('totaldeposit',$this->totaldeposit);
		$criteria->compare('time',$this->time);
		$criteria->compare('Total',$this->Total);
		$criteria->compare('Id',$this->Id);
		$criteria->compare('IdRef',$this->IdRef);
		$criteria->compare('IdOrder',$this->IdOrder);
		$criteria->compare('Ip',$this->Ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return dataRef the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
