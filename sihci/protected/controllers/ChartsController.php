<?php

class ChartsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/system';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	// public function accessRules()
	// {
	// 	return array(
	// 		array('allow',  // allow all users to perform 'index' and 'view' actions
	// 			'actions'=>array('index','view'),
	// 			'users'=>array('*'),
	// 		),
	// 		array('allow', // allow authenticated user to perform 'create' and 'update' actions
	// 			'actions'=>array('create','update'),
	// 			'users'=>array('@'),
	// 		),
	// 		array('allow', // allow admin user to perform 'admin' and 'delete' actions
	// 			'actions'=>array('admin','delete'),
	// 			'users'=>array('admin'),
	// 		),
	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 		),
	// 	);
	// }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	//GR01-Total Ingreso de Investigadores 
	public function actionTotalRegisteredResearchesIo()
	{

		$conexion = Yii::app()->db;

		/*$results = $conexion->createCommand("
		SELECT count(per.id) as total, MONTH(per.fechaRegistro) as mes 
		FROM personas AS per 
		RIGHT JOIN personal AS pel ON pel.id = per.id 
		GROUP BY MONTH(per.fechaRegistro)
		")->queryAll();*/

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) FROM users
		")->queryAll();
	
		$results = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM users
		WHERE type = 'fisico'
		GROUP BY MONTH(creation_date)
		")->queryAll();

		$resultsResearchersdown = $conexion->createCommand("
		SELECT  u.id, COUNT(c.status) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		LEFT JOIN users AS u ON c.id_user = u.id
		WHERE c.status = 0 
		GROUP BY u.creation_date;
		")->queryAll();

		$this->render('index',array(
			'results'=>$results,'resultsResearchersdown'=>$resultsResearchersdown,
			'year'=>$year, 
			'action'=>'totalRegisteredResearchesIo'
		));
	}

	//GR02-Cantidad de Investigadores
	public function actionNumberofResearchers(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) FROM users 
		")->queryAll();

		$resultsTotalReasearches = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM users
		WHERE type = 'fisico'
		GROUP BY MONTH(creation_date)
		")->queryAll();

		$resultResearchesSNI = $conexion->createCommand("
		SELECT COUNT(c.sni) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		INNER JOIN users AS u ON c.id_user = u.id
		WHERE c.sni != 0 AND u.type = 'fisico'
		GROUP BY u.creation_date;
		")->queryAll();

		$resultResearchesnoSNI = $conexion->createCommand("
		SELECT COUNT(c.sni) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		INNER JOIN users AS u ON c.id_user = u.id
		WHERE c.sni = 0 AND u.type = 'fisico'
		GROUP BY u.creation_date;
		")->queryAll();

		$this->render('index',array(
			'resultsTotalReasearches'=>$resultsTotalReasearches,
			'resultResearchesSNI'=>$resultResearchesSNI,
			'resultResearchesnoSNI'=>$resultResearchesnoSNI,
			'year'=>$year,	
			 'action'=>'numberofResearchers'
		));
	}

	//GR03-Total de Proyectos de Investigacion
	public function actionTotalResearchProjects(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) FROM projects 
		")->queryAll();

		$this->render('index',array(
			
			'year'=>$year,	
			 'action'=>'totalResearchProjects'
		));

	}
}