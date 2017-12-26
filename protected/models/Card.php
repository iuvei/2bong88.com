<?php

/**
 * This is the model class for table "table_card".
 *
 * The followings are the available columns in table 'table_card':
 * @property integer $Id
 * @property integer $Id_product_vtc
 * @property integer $Id_Cat
 * @property integer $Price_vtc
 * @property integer $Amount_vtc
 * @property integer $GrandAmount_vtc
 * @property integer $Price
 * @property string $Display_price
 * @property string $Description
 */
class Card extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id_product_vtc, Id_Cat, Price_vtc, Amount_vtc, GrandAmount_vtc, Price, Display_price, Description, Status', 'required'),
			array('Id_product_vtc, Id_Cat, Price_vtc, Amount_vtc, GrandAmount_vtc, Price, Status, inHome', 'numerical', 'integerOnly'=>true),
			array('Display_price, Description', 'length', 'max'=>100),
			array('Img', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Id_product_vtc, Id_Cat, Price_vtc, Amount_vtc, GrandAmount_vtc, Price, Display_price, Description, Status, inHome', 'safe', 'on'=>'search'),
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
			'Id_product_vtc' => 'Id sản phẩm trong VTC',
			'Id_Cat' => 'Id chuyên mục',
			'Price_vtc' => 'Giá bán trong VTC',
			'Amount_vtc' => 'Amount trong VTC',
			'GrandAmount_vtc' => 'GrandAmount trong VTC',
			'Price' => 'Giá bán trên web',
			'Display_price' => 'Giá hiển thị',
			'Description' => 'Tên loại thẻ',
			'Img' => 'Ảnh đại diện',
			'Status' => 'Trạng thái',
			'inHome' => 'Xuất hiện ở  trang chủ',
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
		$criteria->compare('Id_product_vtc',$this->Id_product_vtc);
		$criteria->compare('Id_Cat',$this->Id_Cat);
		$criteria->compare('Price_vtc',$this->Price_vtc);
		$criteria->compare('Amount_vtc',$this->Amount_vtc);
		$criteria->compare('GrandAmount_vtc',$this->GrandAmount_vtc);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('Display_price',$this->Display_price,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Status',$this->Status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Card the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
