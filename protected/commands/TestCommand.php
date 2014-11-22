<?php
class TestCommand extends CConsoleCommand
{
    public $defaultAction = 'index';

    public function actionIndex($password)
    {
        Yii::import('application.components.helpers.*');
        var_dump(TextHelper::generateHash($password));
    }
}