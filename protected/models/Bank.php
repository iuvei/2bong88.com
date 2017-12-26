<?php

/**
 * This is the model class for table "table_bank".
 *
 * The followings are the available columns in table 'table_bank':
 * @property integer $Id
 * @property string $Name
 * @property string $Stk
 * @property string $ChuTk
 * @property string $ChiNhanh
 */
class Bank extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_bank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Stk, ChuTk, note, tut, Ord, userLogin, passwordLogin', 'required'),
			array('Name', 'length', 'max'=>100),
			array('Stk', 'length', 'max'=>50),
			array('userLogin, passwordLogin','length','max'=>300),
			array('ChuTk, ChiNhanh', 'length', 'max'=>200),
			array('Img, imgNoColor, status','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Name, Stk, ChuTk, ChiNhanh', 'safe', 'on'=>'search'),
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
			'Name' => 'Tên Ngân Hàng',
			'Stk' => 'Số Tài Khoản',
			'ChuTk' => 'Chủ Tài Khoản',
			'ChiNhanh' => 'Chi Nhánh',
			'note' => 'Ghi chú',
			'tut' => 'Hướng dẫn chuyển khoản',
			'Ord' => 'Thứ tự',
			'Img' => 'Ảnh đại diện',
			'imgNoColor'=>'Ảnh khi không active',
			'userLogin'=>'Tên đăng nhập Ibanking',
			'passwordLogin'=>'password đăng nhập Ibanking',
			'status'=>'Trạng thái',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Stk',$this->Stk,true);
		$criteria->compare('ChuTk',$this->ChuTk,true);
		$criteria->compare('ChiNhanh',$this->ChiNhanh,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bank the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
