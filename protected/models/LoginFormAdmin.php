<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginFormAdmin extends CFormModel {

    public $username;
    public $password;
    public $rememberMe;
    private $_identity;
	public $verifyCode;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('username, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate', 'skipOnError' => true),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => 'Remember me next time',
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
			'verifyCode'=>'Mã xác nhận',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        /*
		$this->_identity = new AdminIndentity($this->username, $this->password);
        if (!$this->_identity->authenticate())
            $this->addError('password', 'Incorrect username or password.');*/
		if(!$this->hasErrors())
		{
			$this->_identity=new AdminIndentity($this->username,$this->password);
			if($this->_identity->authenticate() == 1)
				$this->addError('username','Tên người dùng không hợp lệ');
			elseif($this->_identity->authenticate() == 2)
				$this->addError('password','Sai mật khẩu');
			
			elseif($this->_identity->authenticate() == 3)
				$this->addError('username', 'Tài khoản của bạn đã bị khóa! vui lòng liên hệ admin');
			
		}
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new AdminIndentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === AdminIndentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        else
            return false;
    }

}
