<?php

/**
 * This is the model class for table "table_order".
 *
 * The followings are the available columns in table 'table_order':
 * @property integer $Id
 * @property integer $type_order
 * @property integer $price
 * @property integer $total
 * @property string $time
 * @property string $content
 * @property string $status
 * @property string $Ip
 * @property integer $IdUser
 * @property string $email
 * @property string $bank
 */
class TableOrder extends CActiveRecord
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
			array('type_order, price, time, Ip, IdUser, email, bank', 'required'),
			array('type_order, price, total, IdUser', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>30),
			array('Ip', 'length', 'max'=>50),
			array('email, bank', 'length', 'max'=>100),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, type_order, price, total, time, content, status, Ip, IdUser, email, bank', 'safe', 'on'=>'search'),
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
			'Id' => 'Mã order',
			'type_order' => 'Loại Giao Dịch',
			'price' => 'Tổng Giá Trị Đơn Hàng',
			'total' => 'Số Lượng',
			'time' => 'Thời Gian',
			'content' => 'Nội Dung',
			'status' => 'Trạng Thái',
			'Ip' => 'Ip',
			'IdUser' => 'Id User',
			'email' => 'Email',
			'bank' => 'Bank',
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
		$criteria->compare('type_order',$this->type_order);
		$criteria->compare('price',$this->price);
		$criteria->compare('total',$this->total);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('Ip',$this->Ip,true);
		$criteria->compare('IdUser',$this->IdUser);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('bank',$this->bank,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TableOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
