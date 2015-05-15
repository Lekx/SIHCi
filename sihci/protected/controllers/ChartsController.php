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

	//GR01-
	public function actionTotalRegisteredResearchesIo()
	{

		$conexion = Yii::app()->db;

		/*$results = $conexion->createCommand("
		SELECT count(per.id) as total, MONTH(per.fechaRegistro) as mes 
		FROM personas AS per 
		RIGHT JOIN personal AS pel ON pel.id = per.id 
		GROUP BY MONTH(per.fechaRegistro)
		")->queryAll();*/
		
		$results = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM users
		
		GROUP BY MONTH(creation_date)
		")->queryAll();


		$this->render('index',array(
			'results'=>$results, 'action'=>'totalRegisteredResearchesIo'
		));
	}
}