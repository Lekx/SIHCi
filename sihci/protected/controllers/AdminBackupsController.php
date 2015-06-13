<?php
class AdminBackupsController extends Controller
{
		public function actionIndex()
	{
		$this->layout = 'system';
		$this->render('index');
	}
}