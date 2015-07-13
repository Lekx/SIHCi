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
	public function accessRules()
	 {
	 	return array(
	 		array('allow', // allow admin user to perform 'admin' and 'delete' actions
			    'actions'=>array('admin','totalRegisteredResearchers','projectsTotal','efficiencyTotal',
			    	             'booksTotal','chaptersTotal','articlesGuides_','patentSoftware','index',),
				'expression'=>'($user->Rol->alias==="SGEI" || $user->Rol->alias==="DG" || $user->Rol->alias==="JIOPD" || $user->Rol->alias==="ADMIN")',
				'users'=>array('@'),
			),
	 		array('deny',  // deny all users
	 			'users'=>array('*'),
	 		),
		);
	 }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	

	public function actionIndex()
	{
		$this->actionTotalRegisteredResearchers();
	}


	//GR01-Total Ingreso de Investigadores 
	public function actionTotalRegisteredResearchers()
	{

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM users ORDER BY creation_date DESC
		")->queryAll();

		$years = array();
		$years["total"] = "Total";
		foreach($year AS $index => $value)
	        	$years[$value["year"]] = $value["year"];
	        	

		if(isset($_POST["years"])){
			
				$condHu = "";

			if($_POST["sni"] != "total" && $_POST["sni"] == "no")
				$condSni = " AND c.sni = 0 OR c.sni IS NULL";
			else if($_POST["sni"] == "yes")
				$condSni = " AND c.sni > 0";
			else
				$condSni = "";


			if($_POST["type"] != "total" && $_POST["type"] == "bajas")
				$condType = " AND u.status ='inactivo'";
			else
				$condType = "";


			if($_POST["years"] != "total")
				$condYears = " AND YEAR(u.creation_date) ='".$_POST['years']."'";
			else
				$condYears = "";


			$query = '
				SELECT 
				COUNT(IF(j.hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
				COUNT(IF(j.hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
				COUNT(u.id) as totalUsers,
				MONTH(u.creation_date) as months
				from users as u 
				left join curriculum as c ON c.id_user = u.id 
				left join jobs as j on j.id_curriculum = c.id
				WHERE u.type="fisico"
				'.$condYears.$condType.$condSni.$condHu.'
				GROUP BY months ORDER BY MONTH(u.creation_date) ASC
			';
			$results = $conexion->createCommand($query)->queryAll();

			//print_r($results);

			$months = array();
			$jim = array();
			$faa = array();
			$other = array();
			$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			foreach($results AS $key => $value){
				array_push($months, $mos[$value["months"]]);
				array_push($jim, (int)$value["jim"]);
				array_push($faa, (int)$value["faa"]);
				array_push($other, ((int)$value["totalUsers"]-((int)$value["faa"]+(int)$value["jim"])));
			}

			echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
		}

		if(!isset($_POST["years"])){
			$this->render('index',array('action'=>'totalRegisteredResearchers',"years"=>$years));
		}

	}

	//GR02-Total-Proyectos
	public function actionProjectsTotal(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM projects ORDER BY creation_date DESC
		")->queryAll();

		$years = array();
		$years["total"] = "Total";
		foreach($year AS $index => $value)
	        	$years[$value["year"]] = $value["year"];
	        	

		if(isset($_POST["years"])){
			
				$condHu = "";

			if($_POST["proyecto"] != "total" && $_POST["proyecto"] == "abiertos")
				$condProyecto = " AND p.status != 'dictaminado' AND p.status != 'rechazado'";
			else if($_POST["proyecto"] == "concluidos")
				$condProyecto = " AND p.status = 'dictaminado'";
			else if($_POST["proyecto"] == "rechazados")
				$condProyecto = " AND p.status = 'rechazado'";
			else
				$condProyecto = "";

			if($_POST["patrocinador"] != "total" && $_POST["patrocinador"] == "patrocinado")
				$condPatro = " AND p.is_sponsored = 1";
			else if($_POST["patrocinador"] == "Nopatrocinado")
				$condPatro = " AND p.is_sponsored != 1";
			else
				$condPatro = "";


			if($_POST["years"] != "total")
				$condYears = " AND YEAR(p.creation_date) ='".$_POST['years']."'";
			else
				$condYears = "";


			$query = '
				SELECT 
				COUNT(IF(p.develop_uh="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
				COUNT(IF(p.develop_uh="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
				COUNT(u.id) as totalUsers,
				MONTH(p.creation_date) as months
				FROM projects AS p 
				LEFT JOIN curriculum AS c ON p.id_curriculum=c.id
				LEFT JOIN users AS u ON u.id=c.id_user
				WHERE u.type = "fisico" AND u.status = "activo"
				'.$condYears.$condPatro.$condProyecto.$condHu.'
				GROUP BY months ORDER BY MONTH(p.creation_date) ASC
			';
			$results = $conexion->createCommand($query)->queryAll();

			//print_r($results);

			$months = array();
			$jim = array();
			$faa = array();
			$other = array();
			$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			foreach($results AS $key => $value){
				array_push($months, $mos[$value["months"]]);
				array_push($jim, (int)$value["jim"]);
				array_push($faa, (int)$value["faa"]);
				array_push($other, ((int)$value["totalUsers"]-((int)$value["faa"]+(int)$value["jim"])));
			}

			echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
		}

		if(!isset($_POST["years"])){
			$this->render('index',array('action'=>'projectsTotal',"years"=>$years));
		}

	}

	//GR03-Total-Eficiencia
public function actionEfficiencyTotal(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM projects WHERE status = 'completado' ORDER BY creation_date DESC
		")->queryAll();

		$years = array();
		$years["total"] = "Total";
		foreach($year AS $index => $value)
	        	$years[$value["year"]] = $value["year"];
	        	

		if(isset($_POST["years"])){
			
				$condHu = "";


			if($_POST["years"] != "total")
				$condYears = " AND YEAR(p.creation_date) ='".$_POST['years']."'";
			else
				$condYears = "";


			$query = '
				SELECT 
				COUNT(IF(p.develop_uh="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
				COUNT(IF(p.develop_uh="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
				COUNT(u.id) as totalUsers,
				MONTH(p.creation_date) as months
				FROM projects AS p 
				LEFT JOIN curriculum AS c ON p.id_curriculum=c.id
				LEFT JOIN users AS u ON u.id=c.id_user
				WHERE u.type = "fisico" AND u.status = "activo"
				AND p.status = "completado"
				'.$condYears.$condHu.'
				GROUP BY months ORDER BY MONTH(p.creation_date) ASC
			';
			$results = $conexion->createCommand($query)->queryAll();

			//print_r($results);

			$months = array();
			$jim = array();
			$faa = array();
			$other = array();
			$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			foreach($results AS $key => $value){
				array_push($months, $mos[$value["months"]]);
				array_push($jim, (int)$value["jim"]);
				array_push($faa, (int)$value["faa"]);
				array_push($other, ((int)$value["totalUsers"]-((int)$value["faa"]+(int)$value["jim"])));
			}

			echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
		}

		if(!isset($_POST["years"])){
			$this->render('index',array('action'=>'efficiencyTotal',"years"=>$years));
		}

	}


	//GR04-Total-Libros
	public function actionBooksTotal(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM books ORDER BY creation_date DESC
		")->queryAll();

		$years = array();
		$years["total"] = "Total";
		foreach($year AS $index => $value)
	        	$years[$value["year"]] = $value["year"];
	        	

		if(isset($_POST["years"])){
			
				$condHu = "";

			


			if($_POST["years"] != "total")
				$condYears = " AND YEAR(b.creation_date) ='".$_POST['years']."'";
			else
				$condYears = "";


			$query = '
				SELECT 
					COUNT(IF(j.hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
					COUNT(IF(j.hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
					COUNT(b.id) AS totalBooks,
					MONTH(b.creation_date) as months
					FROM books AS b
					LEFT JOIN curriculum AS c ON b.id_curriculum=c.id
					LEFT JOIN users AS u ON u.id=c.id_user
					LEFT JOIN jobs AS j ON j.id_curriculum=c.id
					WHERE u.type = "fisico" AND u.status = "activo"
				'.$condYears./*$condType.$condSni.*/$condHu.'
				GROUP BY months ORDER BY MONTH(b.creation_date) ASC
			';
			$results = $conexion->createCommand($query)->queryAll();

			//print_r($results);

			$months = array();
			$jim = array();
			$faa = array();
			$other = array();
			$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			foreach($results AS $key => $value){
				array_push($months, $mos[$value["months"]]);
				array_push($jim, (int)$value["jim"]);
				array_push($faa, (int)$value["faa"]);
				array_push($other, ((int)$value["totalBooks"]-((int)$value["faa"]+(int)$value["jim"])));
			}

			echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
		}

		if(!isset($_POST["years"])){
			$this->render('index',array('action'=>'booksTotal',"years"=>$years));
		}

	}


	//GR05-Total-Capitulos
	public function actionChaptersTotal(){

		$conexion = Yii::app()->db;

		$year = $conexion->createCommand("
		SELECT DISTINCT YEAR(creation_date) AS year FROM books_chapters ORDER BY creation_date DESC
		")->queryAll();

		$years = array();
		$years["total"] = "Total";
		foreach($year AS $index => $value)
	        	$years[$value["year"]] = $value["year"];
	        	

		if(isset($_POST["years"])){
			
				$condHu = "";


			if($_POST["years"] != "total")
				$condYears = " AND YEAR(cap.creation_date) ='".$_POST['years']."'";
			else
				$condYears = "";


			$query = '
				SELECT 
					COUNT(IF(j.hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
					COUNT(IF(j.hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
					COUNT(cap.id) AS totalChapters,
					MONTH(cap.creation_date) as months
					FROM books_chapters AS cap
					LEFT JOIN curriculum AS c ON c.id=cap.id_curriculum
					LEFT JOIN users AS u ON u.id=c.id_user 
					LEFT JOIN jobs AS j ON j.id_curriculum=c.id
					WHERE u.type = "fisico" AND u.status = "activo"
				'.$condYears./*$condType.$condSni.*/$condHu.'
				GROUP BY months ORDER BY MONTH(cap.creation_date) ASC
			';
			$results = $conexion->createCommand($query)->queryAll();

			//print_r($results);

			$months = array();
			$jim = array();
			$faa = array();
			$other = array();
			$mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			foreach($results AS $key => $value){
				array_push($months, $mos[$value["months"]]);
				array_push($jim, (int)$value["jim"]);
				array_push($faa, (int)$value["faa"]);
				array_push($other, ((int)$value["totalChapters"]-((int)$value["faa"]+(int)$value["jim"])));
			}

			echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
		}

		if(!isset($_POST["years"])){
			$this->render('index',array('action'=>'chaptersTotal',"years"=>$years));
		}

	}

	//GR06-total Articulos-guias
 public function actionArticlesGuides_(){

 	$conexion = Yii::app()->db;

  $year = $conexion->createCommand("
  SELECT DISTINCT YEAR(creation_date) AS year FROM articles_guides ORDER BY creation_date DESC
  ")->queryAll();

  $years = array();
  $years["total"] = "Total";
  foreach($year AS $index => $value)
          $years[$value["year"]] = $value["year"];
          

  if(isset($_POST["years"])){
  

    $condHu = "";
  

   if($_POST["years"] != "total")
    $condYears = " AND YEAR(ar.creation_date) ='".$_POST['years']."'";
   else
    $condYears = "";

   $query = '
    SELECT 
    COUNT(IF(j.hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
    COUNT(IF(j.hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
    COUNT(ar.id) AS totalArticles,
    MONTH(ar.creation_date) as months
    FROM articles_guides AS ar
    LEFT JOIN curriculum AS c ON c.id=ar.id_resume
    LEFT JOIN users AS u ON u.id=c.id_user 
    LEFT JOIN jobs AS j ON j.id_curriculum=c.id
    WHERE u.type = "fisico" AND u.status = "activo"
    '.$condYears./*$condType.$condSni.*/$condHu.'
    GROUP BY months ORDER BY MONTH(ar.creation_date) ASC
   ';
   $results = $conexion->createCommand($query)->queryAll();

   //print_r($results);

   $months = array();
   $jim = array();
   $faa = array();
   $other = array();
   $mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
   foreach($results AS $key => $value){
    array_push($months, $mos[$value["months"]]);
    array_push($jim, (int)$value["jim"]);
    array_push($faa, (int)$value["faa"]);
    array_push($other, ((int)$value["totalArticles"]-((int)$value["faa"]+(int)$value["jim"])));
   }

   echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
  }

  if(!isset($_POST["years"])){
   $this->render('index',array('action'=>'articlesGuides_',"years"=>$years));
  }

 }

//GR07-Patentes-Software-Derechos de autor
public function actionPatentSoftware(){

	 $conexion = Yii::app()->db;
$query = "SELECT DISTINCT YEAR(creation_date) AS year FROM copyrights union SELECT DISTINCT YEAR(creation_date) AS year FROM software union SELECT DISTINCT YEAR(creation_date) AS year FROM patent ORDER BY year";
	if(isset($_POST["property"])){

		if($_POST["property"] == "software"){
			$query ="
  			SELECT DISTINCT YEAR(creation_date) AS year FROM software";
		}
		else if ($_POST["property"] == "patent"){
		$query ="
  			SELECT DISTINCT YEAR(creation_date) AS year FROM patent";	
		}
		else if ($_POST["property"] == "copyrights"){
		$query ="
  			SELECT DISTINCT YEAR(creation_date) AS year FROM copyrights";	
		}else{
				$query = "SELECT DISTINCT YEAR(creation_date) AS year FROM copyrights union SELECT DISTINCT YEAR(creation_date) AS year FROM software union SELECT DISTINCT YEAR(creation_date) AS year FROM patent ORDER BY year";
		}	
}


		$year = $conexion->createCommand($query)->queryAll();
		
		$years = array();
		  $years["total"] = "Total";
		  foreach($year AS $index => $value)
		          $years[$value["year"]] = $value["year"];
	     

  if(isset($_POST["years"])){
 
    $condHu = "";
  

   if($_POST["property"] != "todos" && $_POST["property"] == "software"){
    	$table = "software AS s";
		$alias = "s.id_curriculum";
		$table1 = "COUNT(s.id)";
		$orderMoth = "MONTH(s.creation_date)";
	}
	else if($_POST["property"] == "patent"){
		$table = "patent AS pa";
		$alias = "pa.id_curriculum";
		$table1 = "COUNT(pa.id)";
		$orderMoth = "MONTH(pa.creation_date)";

	}
	else if($_POST["property"] == "copyrights"){
		$table = "copyrights AS co";
		$alias = "co.id_curriculum";
		$table1 = "COUNT(co.id)";
		$orderMoth = "MONTH(co.creation_date)";

	}
   	else{

    	$table = "";
		$alias = "";
		$table1 = "";
		$orderMoth = "";
	}
   

   if($_POST["years"] != "total" && $_POST["property"] == "patent"){
    $condYears = " AND YEAR(pa.creation_date) ='".$_POST['years']."'";
	}
	else if($_POST["years"] != "total" && $_POST["property"] == "software"){
		$condYears = " AND YEAR(s.creation_date) ='".$_POST['years']."'";
	}
	else if($_POST["years"] != "total" && $_POST["property"] == "copyrights"){
		$condYears = " AND YEAR(co.creation_date) ='".$_POST['years']."'";
	}
   else
    $condYears = "";

if($_POST["property"] != "todos"){
   $query = '
    SELECT  
		COUNT(IF(j.hospital_unit="Hospital Civil Dr. Juan I. Menchaca",1,NULL)) AS jim, 
		COUNT(IF(j.hospital_unit="Hospital Civil Fray Antonio Alcalde",1,NULL)) AS faa,
		'.$table1.' AS totals,
		'.$orderMoth.' AS months
		FROM '.$table.' 
		LEFT JOIN curriculum AS c ON '.$alias.'=c.id
		LEFT JOIN jobs AS j ON j.id_curriculum=c.id
		LEFT JOIN users AS u ON u.id=c.id_user
		WHERE u.type = "fisico" AND u.status = "activo"
    	'.$condYears.'
    	GROUP BY months ORDER BY '.$orderMoth.' ASC';
}
else
{

	$query = "
		SELECT  
		COUNT(IF(j.hospital_unit='Hospital Civil Dr. Juan I. Menchaca',1,NULL)) AS jim, 
		COUNT(IF(j.hospital_unit='Hospital Civil Fray Antonio Alcalde',1,NULL)) AS faa,
		COUNT(co.id) AS totals,
		MONTH(co.creation_date) AS months
		FROM copyrights AS co 
		LEFT JOIN curriculum AS c ON co.id_curriculum=c.id
		LEFT JOIN jobs AS j ON j.id_curriculum=c.id
		LEFT JOIN users AS u ON u.id=c.id_user
		WHERE u.type = 'fisico' AND u.status = 'activo'  
		".($_POST['years'] != 'total' ? " AND YEAR(co.creation_date) ='".$_POST['years']."'":"")."
		GROUP BY months 
		UNION
		SELECT  
		COUNT(IF(j.hospital_unit='Hospital Civil Dr. Juan I. Menchaca',1,NULL)) AS jim, 
		COUNT(IF(j.hospital_unit='Hospital Civil Fray Antonio Alcalde',1,NULL)) AS faa,
		COUNT(pa.id) AS totals,
		MONTH(pa.creation_date) AS months
		FROM patent AS pa 
		LEFT JOIN curriculum AS c ON pa.id_curriculum=c.id
		LEFT JOIN jobs AS j ON j.id_curriculum=c.id
		LEFT JOIN users AS u ON u.id=c.id_user
		WHERE u.type = 'fisico' AND u.status = 'activo'
		".($_POST['years'] != 'total' ? " AND YEAR(pa.creation_date) ='".$_POST['years']."'":"")."
		GROUP BY months
		UNION
		SELECT  
		COUNT(IF(j.hospital_unit='Hospital Civil Dr. Juan I. Menchaca',1,NULL)) AS jim, 
		COUNT(IF(j.hospital_unit='Hospital Civil Fray Antonio Alcalde',1,NULL)) AS faa,
		COUNT(s.id) AS totals,
		MONTH(s.creation_date) AS months
		FROM software AS s 
		LEFT JOIN curriculum AS c ON s.id_curriculum=c.id
		LEFT JOIN jobs AS j ON j.id_curriculum=c.id
		LEFT JOIN users AS u ON u.id=c.id_user
		WHERE u.type = 'fisico' AND u.status = 'activo'	
		".($_POST['years'] != 'total' ? "AND YEAR(s.creation_date) ='".$_POST['years']."' ":"")."
		GROUP BY months
		ORDER BY months ASC";
}


   $results = $conexion->createCommand($query)->queryAll();

   //print_r($results);

   $months = array();
   $jim = array();
   $faa = array();
   $other = array();
   $mos = array("dummy","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  
   foreach($results AS $key => $value){
    array_push($months, $mos[$value["months"]]);
    array_push($jim, (int)$value["jim"]);
    array_push($faa, (int)$value["faa"]);
    array_push($other, ((int)$value["totals"]-((int)$value["faa"]+(int)$value["jim"])));
   }

   echo '{"months":'.json_encode($months).',"jim":'.json_encode($jim).',"faa":'.json_encode($faa).',"other":'.json_encode($other).'}';
  }


if(!isset($_POST["years"])){
   $this->render('index',array('action'=>'patentSoftware','years'=>$years));
}


}

}
?>