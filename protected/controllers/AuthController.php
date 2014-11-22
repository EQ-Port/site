<?php
class AuthController extends Controller
{
    public function actionRegister()
    {
        $form = new AuthForm('register');

        if ($post = Yii::app()->request->getPost('AuthForm')) {
            $form->attributes = $post;

            if ($form->validate()) {
                $user = new User();
                $user->setAttributes($form->attributes, false);
                $user->save();
            }
        }

        $this->render('register', array('form' => $form));
    }

    public function actionLogin()
    {
        $form = new AuthForm('login');
    }
}