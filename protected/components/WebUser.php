<?php
class WebUser extends CWebUser
{
    public function afterLogin($fromCookie)
    {
        /**
         * @var User $user
         */
        $user = User::model()->findByPk($this->id);

        $this->setState('roles', $user->roles);
    }
}