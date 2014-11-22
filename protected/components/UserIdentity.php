<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_user;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $this->_user = User::model()->find('email = :email', array(':email' => $this->username));

        if (!($this->_user instanceof User)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$this->_user->checkPassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        $result = !$this->errorCode;

        if ($result) {
            $this->setState('roles', $this->_user->roles);
        }

        return $result;
	}

    public function getId()
    {
        return $this->_user->id;
    }

    public function getName()
    {
        return $this->_user->nickname;
    }
}