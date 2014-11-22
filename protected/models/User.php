<?php

/**
 * Class User
 * @property-read int $id
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $nickname
 * @property-read string $email
 * @property-read string $password
 * @property-read int $roles
 */
class User extends ActiveRecord
{
    protected $_columns = array(
        'id'        => 'id',
        'firstName' => 'first_name',
        'lastName'  => 'last_name',
        'nickname'  => 'nickname',
        'email'     => 'email',
        'password'  => 'password',
        'roles'     => 'roles'
    );

    const ROLE_USER      = 1;
    const ROLE_ADMIN     = 2;
    const ROLE_WRITER    = 4;
    const ROLE_PARTNER   = 8;
    const ROLE_ORGANIZER = 16;

    public function tableName()
    {
        return 'user';
    }

    public function hasRole($role)
    {
        return ($role & $this->roles) == $role;
    }

    public function checkPassword($password)
    {
        $salt = substr($this->password, 0, 8);

        return $salt . md5($password . $salt) == $this->password;
    }
}