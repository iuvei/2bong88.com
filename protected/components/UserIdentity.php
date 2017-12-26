<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USERNAME_CLOSED = 3;
	const ERROR_USERNAME_SUPPEND = 4;
	
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('username'=>$this->username));
		if($user===null)
		{
			//
			$user=User::model()->findByAttributes(array('nickname'=>$this->username));
			if($user===null)
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if(!$user->validatePassword($this->password))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else if($user->status == 2)
				$this->errorCode=self::ERROR_USERNAME_CLOSED;
			
			else
			{
				$this->_id=$user->Id;
				$this->username=$user->username;
				$this->errorCode=self::ERROR_NONE;
				$user->ipLogin = Yii::app()->getRequest()->getUserHostAddress();
				$user->lastLogin = time();
				$user->cookie = $this->generateRandomString();
				$this->setState('typeUser', "userNormal");
				Yii::app()->request->cookies['_cookieLogin'] = new CHttpCookie('_cookieLogin', $user->cookie);
				$user->save();
			}
		}
		else
		{
			if(!$user->validatePassword($this->password))
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else if($user->status == 2)
				$this->errorCode=self::ERROR_USERNAME_CLOSED;
			
			else
			{
				$this->_id=$user->Id;
				$this->username=$user->username;
				$this->errorCode=self::ERROR_NONE;
				$user->ipLogin = Yii::app()->getRequest()->getUserHostAddress();
				$user->lastLogin = time();
				$user->cookie = $this->generateRandomString();
				$this->setState('typeUser', "userNormal");
				Yii::app()->request->cookies['_cookieLogin'] = new CHttpCookie('_cookieLogin', $user->cookie);
				$user->save();
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
	
	public static function createAuthenticatedIdentity($username)
    {
        $identity=new self($username,'');
        $identity->errorCode=self::ERROR_NONE;
        return $identity;
    }

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}