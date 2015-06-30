<?php
class EvaluateCVController extends Controller
{


	public $layout='//layouts/system';

	public function actionIndex()
	{
		
		$conexion = Yii::app()->db;

		$query='
			SELECT u.email, p.genre, p.marital_status, p.birth_date
			FROM users AS u
			INNER JOIN persons AS p ON p.id_user = u.id
			INNER JOIN curriculum AS c ON c.id_user = u.id
			INNER JOIN addresses AS a ON c.id_actual_address = a.id
			INNER JOIN grades AS g ON g.id_curriculum = c.id
			INNER JOIN research_areas AS ra ON ra.id_curriculum = c.id
			INNER JOIN jobs AS j ON j.id_curriculum = c.id
			INNER JOIN docs_identity AS d ON d.id_curriculum = c.id
			WHERE u.id = '.Yii::app()->user->id.'
			GROUP BY u.email
		';
		
		$checkAuth = $conexion->createCommand($query)->queryAll();
		
		//print_r($checkAuth);
		$result = false;
		if(!empty($checkAuth)){
			if($checkAuth[0]['genre'] !='-1' && $checkAuth[0]['marital_status'] !='-1' && $checkAuth[0]['birth_date'] !='0000-00-00')
				$result = true;
		}

		

		$this->render('index',array('checkAuth'=>$result));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}