<?php

class TablesController extends Controller
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
			array('allow',
			    'actions'=>array('index','researchAreas','researchers','projects','books','chapters',
			    	             'patents','software','copyrights','articlesGuides'),
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
		$this->redirect('researchers');
	}

	public function researchAreas($data, $row) {
		  $conexion = Yii::app()->db;
		  // print_r($data);
		 $id_curriculum = $data['id_curriculum'];

		 $query ='SELECT GROUP_CONCAT(name) AS names from research_areas where id_curriculum="'.$id_curriculum.'"';

		  $results = $conexion->createCommand($query)->queryAll();


		  if(!empty($results))
		  $rArea = " ";
		  foreach($results AS $key => $value){
		   $rArea = $value["names"].", ";
		  }

		  return $rArea;
	}

	public function actionResearchers()
	{


		$titlePage = "Cantidad de Investigadores";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM users WHERE type="fisico" ORDER BY year DESC')->queryAll();
		$researchers=Yii::app()->db->createCommand('SELECT id FROM users where type="fisico"')->queryAll();
		 $query='SELECT DISTINCT u.id,p.names, j.hospital_unit, curri.id AS id_curriculum, curri.SNI, curri.status, u.creation_date from users u
 				LEFT JOIN curriculum curri ON curri.id_user=u.id
 				LEFT JOIN jobs j ON curri.id=j.id_curriculum
  				LEFT JOIN persons p ON u.id=p.id_user
  				WHERE u.type="fisico";LIMIT 5' ;
  		$total = count($researchers);
	     $researchersIncome=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,

		    ),

		));

		$this->render('researchers',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage, 'year'=>$year));

	}

	public function actionProjects()
	{
		$titlePage = "Proyectos de Investigación";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM projects ORDER BY year DESC')->queryAll();
		$projects=Yii::app()->db->createCommand('SELECT id FROM projects')->queryAll();

		$query='SELECT u.id,p.names,pro.title, pro.discipline, pro.develop_uh, pro.is_sponsored, pro.registration_number, pro.status, pro.creation_date
		 		FROM projects pro
				 LEFT JOIN curriculum curri ON pro.id_curriculum=curri.id
 				 LEFT JOIN users u ON curri.id_user=u.id
  				 LEFT JOIN persons p ON u.id=p.id_user';
  	     $total = count($projects);
	     $projects=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('projects',array('projects'=>$projects, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionBooks()
	{
		$titlePage = "Libros";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM books ORDER BY year DESC')->queryAll();
		$books=Yii::app()->db->createCommand('SELECT id FROM books')->queryAll();
		$query='SELECT u.id,p.names,bo.book_title, bo.publisher, bo.release_date,bo.path, j.hospital_unit, bo.creation_date FROM books bo
				 JOIN curriculum curri ON bo.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
  	    $total = count($books);
	     $books=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('books',array('books'=>$books, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionChapters()
	{
		$titlePage = "Capítulos de Libros";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM books_chapters ORDER BY year DESC')->queryAll();
		$booksChapters=Yii::app()->db->createCommand('SELECT id FROM books_chapters')->queryAll();
		$query='SELECT u.id,p.names,cha.chapter_title, cha.book_title, cha.publishers, cha.url_doc, j.hospital_unit, cha.creation_date FROM books_chapters cha
				 JOIN curriculum curri ON cha.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
  		$total = count($booksChapters);
	     $chapters=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('chapters',array('chapters'=>$chapters, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionPatents()
	{
		$titlePage = "Registro de Propiedad Intelectual: Patentes";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM patent ORDER BY year DESC')->queryAll();
		$patent=Yii::app()->db->createCommand('SELECT id FROM patent')->queryAll();
		$query='SELECT u.id,p.names,pa.country, pa.name, pa.application_type, pa.application_number, pa.patent_type, j.hospital_unit, pa.creation_date
				FROM patent pa
				 JOIN curriculum curri ON pa.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
  		$total = count($patent);
	     $patents=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('patents',array('patents'=>$patents, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionSoftware()
	{
		$titlePage = "Registro de Propiedad Intelectual: Software";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM software ORDER BY year DESC')->queryAll();
		$software=Yii::app()->db->createCommand('SELECT id FROM software')->queryAll();
		$query='SELECT u.id,p.names, so.country, so.title, so.sector, so.organization, so.objective, so.path, j.hospital_unit, so.creation_date
				FROM software so
				 JOIN curriculum curri ON so.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
        $total = count($software);
	     $softwares=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('software',array('softwares'=>$softwares, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionCopyrights()
	{
		$titlePage = "Registro de Propiedad Intelectual: Derechos de Autor";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM copyrights ORDER BY year DESC')->queryAll();
		$copyrights=Yii::app()->db->createCommand('SELECT id FROM copyrights')->queryAll();
		$query='SELECT u.id,p.names, copy.participation_type, copy.title, copy.step_number, copy.application_date, j.hospital_unit, copy.creation_date
				FROM copyrights copy
				 JOIN curriculum curri ON copy.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
        $total = count($copyrights);
	     $copyrights=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('copyrights',array('copyrights'=>$copyrights, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionArticlesGuides()
	{
		$titlePage = "Artículos y Guías";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM articles_guides ORDER BY year DESC')->queryAll();
		$articles=Yii::app()->db->createCommand('SELECT id FROM articles_guides')->queryAll();
		$query='SELECT u.id,p.names, ar.title, ar.article_type, ar.magazine, ar.url_document, j.hospital_unit, ar.creation_date
				FROM articles_guides ar
				 JOIN curriculum curri ON ar.id_resume=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';
  	    $total = count($articles);
	     $articlesGuides=new CSqlDataProvider($query, array(
		    'pagination'=>array(
		        'pageSize'=>$total,
		    ),
		));

		$this->render('articlesGuides',array('articlesGuides'=>$articlesGuides, 'titlePage'=>$titlePage, 'year'=>$year));
	}

}
