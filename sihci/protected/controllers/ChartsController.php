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
		SELECT DISTINCT YEAR(creation_date) AS year FROM users 
		")->queryAll();

		$years = array();

		foreach($year AS $index => $value)
            $years[$value["year"]] = $value["year"];

	
		/*$results = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM users
		WHERE type = 'fisico'
		GROUP BY MONTH(creation_date);
		")->queryAll();*/

		$results = $conexion->createCommand("
		SELECT  MONTH(creation_date) as month, COUNT(IF(hospital_unit='Hospital Civil Dr. Juan I. Menchaca',1,NULL)) AS JIM,
		MONTH(creation_date) as months,COUNT(IF(hospital_unit='Hospital Civil Fray Antonio Alcalde',1,NULL)) AS FAA
		FROM jobs
		GROUP BY month,months;
		")->queryAll();
		echo "<pre>";
		print_r($results);
		echo "</pre>";

		$resultsResearchersdown = $conexion->createCommand("
		SELECT  u.id, COUNT(c.status) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		LEFT JOIN users AS u ON c.id_user = u.id
		WHERE c.status = 0 
		GROUP BY u.creation_date;
		")->queryAll();

		$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        foreach($results as $key => $values){
            $data[$months[$values["month"]]] = intval($values["JIM"]);
        }

        foreach($resultsResearchersdown as $key => $values){
            $data2[$months[$values["month"]]] = intval($values["total"]);
        }

		$this->render('index',array(
			'results'=>$data,
			'resultsResearchersdown'=>$data2,
			'years'=>$years,
			'action'=>'totalRegisteredResearchesIo'
		));


	}

	//Pertenece actionNumberofResearchers
	public function actionCaca(){

		$selYear  = $_POST['selectedYear'];
		$conexion = Yii::app()->db;
		$resultsTotalReasearches = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM users
		WHERE type = 'fisico' AND YEAR(creation_date) = '".$selYear."'
		GROUP BY MONTH(creation_date)
		")->queryAll();

		$resultResearchesSNI = $conexion->createCommand("
		SELECT COUNT(c.sni) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		INNER JOIN users AS u ON c.id_user = u.id
		WHERE c.sni != 0 AND u.type = 'fisico' AND YEAR(u.creation_date) = '".$selYear."'
		GROUP BY u.creation_date;
		")->queryAll();

		$resultResearchesnoSNI = $conexion->createCommand("
		SELECT COUNT(c.sni) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		INNER JOIN users AS u ON c.id_user = u.id
		WHERE c.sni = 0 AND u.type = 'fisico' AND YEAR(u.creation_date) = '".$selYear."'
		GROUP BY u.creation_date;
		")->queryAll();

		$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");



//	$data = array();
//	$data2 = array();
//	$data3 = array();

	if(!empty($resultsTotalReasearches))
		foreach($resultsTotalReasearches as $key => $values){
			$data[$months[$values["month"]]] = intval($values["total"]);
		}
	if(!empty($resultResearchesSNI))
		foreach($resultResearchesSNI as $key => $values){
			$data2[$months[$values["month"]]] = intval($values["total"]);
			
		}
	if(!empty($resultResearchesnoSNI))
		foreach($resultResearchesnoSNI as $key => $values){
			$data3[$months[$values["month"]]] = intval($values["total"]);
		}
		/*
		 echo json_encode(array(
		 	'resultsTotalReasearches'=>$resultsTotalReasearches,
			'resultResearchesSNI'=>$resultResearchesSNI,
			'resultResearchesnoSNI'=>$resultResearchesnoSNI,
			));*/

		 		$this->renderPartial('_numberofResearchers',array(
			'resultsTotalReasearches'=>$data,
			'resultResearchesSNI'=>$data2,
			'resultResearchesnoSNI'=>$data3,
			//'id'=>$selYear
			//'years'=>$years,	
			//'action'=>'numberofResearchers'
		),false, true);
		 		//Yii::app()->end();
	}

	//GR02-Cantidad de Investigadores
	public function actionNumberofResearchers(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM users 
		")->queryAll();

		$years = array();

		foreach($year AS $index => $value)
            $years[$value["year"]] = $value["year"];

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
		GROUP BY u.creation_date
		")->queryAll();

		$resultResearchesnoSNI = $conexion->createCommand("
		SELECT COUNT(c.sni) as total, MONTH(u.creation_date) AS month 
		FROM curriculum AS c 
		INNER JOIN users AS u ON c.id_user = u.id
		WHERE c.sni = 0 AND u.type = 'fisico'
		GROUP BY u.creation_date
		")->queryAll();

		$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

		foreach($resultsTotalReasearches as $key => $values){
			$data[$months[$values["month"]]] = intval($values["total"]);
		}

		foreach($resultResearchesSNI as $key => $values){
			$data2[$months[$values["month"]]] = intval($values["total"]);
			//echo $values["month"]." - ".$values["total"]."<br>";
		}

		foreach($resultResearchesnoSNI as $key => $values){
			$data3[$months[$values["month"]]] = intval($values["total"]);
		}



		$this->render('index',array(
			'resultsTotalReasearches'=>$data,
			'resultResearchesSNI'=>$data2,
			'resultResearchesnoSNI'=>$data3,
			'years'=>$years,	
			'action'=>'numberofResearchers'
		));

/*$this->renderPartial('_numberofResearchers',array(
			'resultsTotalReasearches'=>$data,
			'resultResearchesSNI'=>$data2,
			'resultResearchesnoSNI'=>$data3,
			//'years'=>$years,	
			//'action'=>'numberofResearchers'
		),false, true);*/


	}

	//GR03-Total de Proyectos de Investigacion
	public function actionTotalResearchProjects(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM projects 
		")->queryAll();

		$years = array();

		foreach($year AS $index => $value)
            $years[$value["year"]] = $value["year"];

		$totalProjects = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM projects
		GROUP BY MONTH(creation_date)
		")->queryAll();

		$TotalOpenProjects = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM projects
		WHERE status != 'dictaminado'
		GROUP BY MONTH(creation_date);
		")->queryAll();

		$CompletedProjectsTotals = $conexion->createCommand("
		SELECT count(id) as total, MONTH(creation_date) as month 
		FROM projects
		WHERE status = 'dictaminado'
		GROUP BY MONTH(creation_date);
		")->queryAll();

		$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

		foreach($totalProjects as $key => $values){
			$data[$months[$values["month"]]] = intval($values["total"]);
		}

		foreach($TotalOpenProjects as $key => $values){
			$data2[$values["month"]] = intval($values["total"]);
		}

		foreach($CompletedProjectsTotals as $key => $values){
    		$data3[$values["month"]] = intval($values["total"]);
		}


		$this->render('index',array(
			
			'totalProjects'=>$data,
			'CompletedProjectsTotals'=>$data2,
			'TotalOpenProjects'=>$data3,
			'years'=>$years,	
			 'action'=>'totalResearchProjects'
		));

	}


	public function actionTotalRegisteredResearchers(){
		$this->render('totalRegisteredResearchers');
	}


	//Ejemplo
	public function actionTotalRegisteredResearches()
	{
		$conexion = Yii::app()->db;
		$results = $conexion->createCommand('
			SELECT MONTH(creation_date) as month,COUNT(IF(hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
			MONTH(creation_date) as months ,COUNT(IF(hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa
			FROM jobs
			GROUP BY month,months ORDER BY MONTH(creation_date) ASC
		')->queryAll();
$months = array();
$jim = array();
$faa = array();
		$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		foreach($results AS $key => $value){
			array_push($months, $mos[$value["month"]]);
			array_push($jim, (int)$value["jim"]);
			array_push($faa, (int)$value["faa"]);
		}

		//echo "<pre>";
		//print_r($results);
		 //echo '{"months":["ener","feb","mar"]}';

		echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).'}';
		//echo json_encode($jim);
		//echo json_encode($faa);
		//echo "</pre>";
		//echo "{'ejem':[521,49,81,0,101,0,0,0,21,3071,0,0,0,0,0,1479,6124,2409,2608,0,0,3457,2057,2580,5876,4638,0,0,3337,3479,430]}";
	}
}
?>