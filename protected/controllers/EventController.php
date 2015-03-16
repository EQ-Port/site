<?php

class EventController extends CController
{
	public function actionIndex()
	{
		if ( $events = Events::model()->findAll() ) {
			$this->render('index', array('events' => $events));
		} else {
			$this->render('../site/index');
		}
	}

	public function actionEvent()
	{
		$code = TransliteUrl::encodeLatin(Yii::app()->request->getParam('code'));
		if ( $event = Events::model()->findByAttributes(array('code' => $code)) ) {
			$this->render('event', array('event' => $event));
		} else {
			$this->render('../site/index');
		}
	}
}
