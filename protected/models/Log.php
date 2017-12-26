<?php

/**
 * This is the model class for table "table_log".
 *
 * The followings are the available columns in table 'table_log':
 * @property integer $Id
 * @property string $timeLog
 * @property string $Ip
 * @property string $userName
 * @property string $content
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timeLog, Ip, content', 'required'),
			array('Ip', 'length', 'max'=>20),
			array('userName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, timeLog, Ip, userName, content', 'safe', 'on'=>'search'),
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
			'timeLog' => 'Thời gian thực hiện',
			'Ip' => 'Địa chỉ Ip',
			'userName' => 'User Thực hiện',
			'content' => 'Nội dung',
		);
	}
	
	public function createLog($userName,$content)
	{
	
		$this->userName = $userName;
		$this->content = $content;
		$this->Ip = Yii::app()->getRequest()->getUserHostAddress();
		$this->timeLog = new CDbExpression('NOW()');
	
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
		$criteria->compare('timeLog',$this->timeLog,true);
		$criteria->compare('Ip',$this->Ip,true);
		$criteria->compare('userName',$this->userName,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'pagination'=>array(
                                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
                        ),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
