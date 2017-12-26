<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIndentity extends CUserIdentity
{
	private $_id;
	const ERROR_USERNAME_CLOSED = 3;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=Admin::model()->findByAttributes(array('Username'=>$this->username));
		if($user===null)
		{
			$user = Admin::model()->findByAttributes(array('nickname'=>$this->username));
			if($user===null)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else 
			{
				if(!$user->validatePassword($this->password))
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				else 
				{
					if($user->status == 2)
						$this->errorCode= 3;
					else
					{
						$this->_id=$user->Id;
						$this->username=$user->Username;
						$user->Ip = Yii::app()->getRequest()->getUserHostAddress();
						$user->timelog = time();
						$user->cookie = $this->generateRandomString();
						$this->setState('typeUser', $user->role);
						$user->save();
						
						$this->errorCode=self::ERROR_NONE;
						
					}
				}
			}
		}
		else
		{
			if(!$user->validatePassword($this->password))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else 
			{
				if($user->status == 2)
					$this->errorCode= 3;
				else
				{
					$this->_id=$user->Id;
					$this->username=$user->Username;
					$user->Ip = Yii::app()->getRequest()->getUserHostAddress();
					$user->timelog = time();
					$user->cookie = $this->generateRandomString();
					$this->setState('typeUser', $user->role);
					$user->save();
					
					$this->errorCode=self::ERROR_NONE;
					
				}
			}
		}
		
		return $this->errorCode;
	}
	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
    }

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}