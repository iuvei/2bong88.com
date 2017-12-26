<?php

/**
 * This is the model class for table "table_admin".
 *
 * The followings are the available columns in table 'table_admin':
 * @property integer $Id
 * @property string $Username
 * @property string $password
 * @property string $key
 * @property string $Ip
 * @property string $timelog
 */
class Admin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'table_admin';
	}
	public $totalCredit;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username, password', 'required'),
			array('Username, key, Ip, secKey', 'length', 'max'=>100),
			array('password,email', 'length', 'max'=>200),
			array('nickname','unique','message'=>'Nickname đã tồn tại!!!'),
			array('Credit','numerical','min'=>0,"tooSmall"=>"Credit phải lớn hơn hoặc bằng 0"),
			array('timelog,cookie, role','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Username, password, key, Ip, timelog, email, level', 'safe', 'on'=>'search'),
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
			'Username' => 'Username',
			'password' => 'Password',
			'key' => 'Key',
			'Ip' => 'Ip',
			'timelog' => 'Timelog',
			'email' => 'Email',
			'level' => 'Level',
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
		$criteria->compare('Username',$this->Username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('Ip',$this->Ip,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('timelog',$this->timelog,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password) {
        return $this->hashPassword($password) == $this->password;
    }
	
	public function hashPassword($password)
	{
	
		return md5(md5($password).$this->key);
	
	}
	/*
	public function beforeSave()
	{
	
		$this->password = md5(md5($this->password).$this->key);
		return true;
	
	}
	*/
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getTotalOutStanding()
	{
		
		$criteria = new CDbCriteria();
		if($this->role=="ProSuperMaster")
		{
			$userQuery = "SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser in (SELECT Id From table_admin WHERE `role` = 'superMaster' AND parentUser = :userId))";
			$criteria->condition = "parentUser in (".$userQuery.")";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="superMaster")
		{
			$userQuery = "SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser IN (SELECT Id From table_admin WHERE `role` = 'master' AND parentUser = :userId)";
			$criteria->condition = "parentUser in (".$userQuery.")";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="master")
		{
			$userQuery = "SELECT Id From table_admin WHERE `role` = 'agent' AND parentUser = :userId";
			$criteria->condition = "parentUser in (".$userQuery.")";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="agent")
		{
			$criteria->condition = "parentUser = :userId";
			$criteria->params = array(":userId"=>$this->Id);
		}
		$criteria->select = array("sum(outStanding) as totalOutStanding");
		$user = User::model()->findAll($criteria);
		return ($user[0]->totalOutStanding>0)?number_format($user[0]->totalOutStanding,2):0;
	}
	public function totalCreditUser()
	{
		$criteria = new CDbCriteria;
		if($this->role=="admin")
			$criteria->condition = "role = 'ProSuperMaster'";
		elseif($this->role=="ProSuperMaster")
		{
			$criteria->condition = "parentUser = :userId AND role =  'superMaster'";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="superMaster")
		{
			$criteria->condition = "parentUser = :userId AND role =  'master'";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="master")
		{
			$criteria->condition = "parentUser = :userId AND role =  'agent'";
			$criteria->params = array(":userId"=>$this->Id);
		}
		elseif($this->role=="agent")
		{
			$criteria->condition = "parentUser = :userId";
			$criteria->params = array(":userId"=>$this->Id);
		}
		if($this->role!="agent")
		{
			$criteria->select = array("sum(givenCredit) as totalCredit");
			$user = Admin::model()->findAll($criteria);
			return ($user[0]->totalCredit>0)?$user[0]->totalCredit:0;
			
		}
		else
		{
			$criteria->select = array("sum(credit) as totalOutStanding");
			$user = User::model()->findAll($criteria);
			return ($user[0]->totalOutStanding>0)?$user[0]->totalOutStanding:0;
		}
		
	}
	public function lockUserPro($status,$id,$role="ProSuperMaster")
	{
		if($role!="agent")
		{
			//$childRole = ($role=="ProSuperMaster")?"superMaster":(($role=="superMaster")?"master":"agent");
			if($role=="ProSuperMaster")
				$childRole = "superMaster";
			elseif($role=="superMaster")
				$childRole = "master";
			elseif($role=="master")
				$childRole = "agent";
			Admin::model()->updateAll(
				array(
					'status'=>$status,
				),
				'parentUser = :user AND role = :role',
				array(
				
					':user'=>$id,
					':role'=>$childRole,
					
				)
			);
			$admin = Admin::model()->findAllByAttributes(array(
			
				'parentUser'=>$id,
				'role'=>$childRole,
			
			));
			foreach($admin as $s)
			{
				$this->lockUserPro($status,$s->Id,$childRole);
			}
		}
		else
		{
			User::model()->updateAll(
				array(
				
					'status'=>$status,
				),
				'parentUser = :id',
				array(
				
					':id'=>$id,
				
				)
			);
		}
	}
	
	
}
