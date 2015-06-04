<?php

class CveHcController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/system', meaning
	 * using two-column layout. See 'protected/views/layouts/system.php'.
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
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/
	public function actionIndex(){
		$this->actionCveHcPublics();
	}

	public function researchAreas($data, $row) {
		$conexion = Yii::app()->db;
		//print_r($data);
		$id_curriculum = $data["id_curriculum"];

		$query ='SELECT GROUP_CONCAT(name) AS names from research_areas where id_curriculum ='.$id_curriculum;

		$results = $conexion->createCommand($query)->queryAll();

		//if(!empty($results))
		$rArea = "";
		foreach($results AS $key => $value){
			$rArea = $value["names"].", ";
		}

		return $rArea;

	}


	public function actionCveHcPublics()
		{

		$query='SELECT u.id, CONCAT(p.last_name1," ",p.last_name2,", ",p.names) AS fullname ,j.hospital_unit,r.name, c.id AS id_curriculum
				FROM users AS u 
				INNER JOIN persons AS p ON u.id=p.id_user
				INNER JOIN curriculum AS c ON u.id = c.id_user
				INNER JOIN jobs AS j ON j.id_curriculum=c.id
				INNER JOIN research_areas AS r ON r.id_curriculum=c.id WHERE u.type = "fisico"';
		
		 $cveHcPublics=new CSqlDataProvider($query,array(
		 					
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));
		$this->render('cveHcPublics',array(			
				'cveHcPublics'=>$cveHcPublics
		));

		}



}
