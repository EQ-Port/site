<?php

class AuthForm extends FormModel
{
    public $email;
    public $firstName;
    public $lastName;
    public $nickname;
    public $password;
    public $repeatPassword;
    public $rememberMe;

    private $_identity;

    protected $_registerAttributes = array(
        'email',
        'nickname',
        'password',
        'repeatPassword',
    );

    protected $_loginAttributes = array(
        'email',
        'password',
        'rememberMe',
    );

    public function attributeLabels()
    {
        return array(
            'email'          => 'E-mail',
            'firstName'      => 'Имя',
            'lastName'       => 'Фамилия',
            'nickname'       => 'Никнейм',
            'password'       => 'Пароль',
            'repeatPassword' => 'Повторите пароль',
            'rememberMe'     => 'Запомнить меня',
        );
    }

    public function rules()
    {
        return array(
            array('email, nickname, password', 'required', 'on' => 'register'),
            array('repeatPassword', 'compare', 'compareAttribute' => 'password', 'on' => 'register', 'message' => 'Пароли не совпадают'),
            array('email', 'email', 'on' => 'register'),
            array('email', 'unique', 'className' => 'User', 'attributeName' => 'email', 'on' => 'register'),
            array('password', 'length', 'min' => 3, 'on' => 'register'),
            array('email, password', 'safe', 'on' => 'login'),
            array('password', 'authenticate'),
        );
    }

    public function afterValidate()
    {
        if (!$this->hasErrors() && $this->scenario == 'register') {
            $this->password = TextHelper::generateHash($this->password);
        }
    }

    public function authenticate()
    {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            if (!$this->_identity->authenticate()) {
                $this->addError('password', 'Неверный E-mail или пароль');
            }
        }
    }

    public function login()
    {
        if (is_null($this->_identity)) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode == UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }

        return false;
    }
}