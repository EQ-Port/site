<?php

class EventController extends CController
{
	public function actionIndex()
	{
		if ( $events = Events::model()->findAll() ) {
			$this->render('index', array('events' => $events));
		} else {
			$this->render('index');
		}
	}
	public function actionEvent()
	{
		if ( $event = Events::model()->findByAttributes(array('code' => Yii::app()->request->getParam('code'))) ) {
			$this->render('event', array('events' => $event));
		} else {
			$this->render('index');
		}
	}
}
