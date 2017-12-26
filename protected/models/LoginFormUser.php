<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginFormUser extends CFormModel {

    public $Username;
    public $password;
    public $rememberMe;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that Username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // Username and password are required
            array('Username, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate', 'skipOnError' => true),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'rememberMe' => 'Remember me next time',
            'Username' => 'Tên Đăng Nhập',
            'password' => 'Mật Khẩu'
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
	{
        if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->Username,$this->password);
			if($this->_identity->authenticate() == 1)
				$this->addError('Username','Invalid username.');
			else if($this->_identity->authenticate() == 2)
				$this->addError('password','Incorrect password.');
			// Your Custom Error :)
					else if($this->_identity->authenticate() == 3)
				$this->addError('Username', 'Tài khoản của bạn đã bị khóa bởi admin!');
		}
    }

    /**
     * Logs in the user using the given Username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->Username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
        else
            return false;
    }

}
