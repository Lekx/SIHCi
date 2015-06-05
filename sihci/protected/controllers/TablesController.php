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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','researchers', 'projects', 'Books','chapters',
								 'scientistMagazines','patents', 'software', 'copyrights', 'articlesGuides'),
				'users'=>array('*'),
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
	public function actionResearchers()
	{
		$titlePage = "Cantidad de Investigadores";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM users')->queryAll();

		 $query='SELECT DISTINCT u.id,p.names,rese.name,j.hospital_unit,curri.SNI, curri.status, u.creation_date from users u 
 				JOIN curriculum curri ON curri.id_user=u.id
 				JOIN jobs j ON curri.id=j.id_curriculum
 				JOIN research_areas rese ON curri.id=rese.id_curriculum
  				JOIN persons p ON u.id=p.id_user';

	     $researchersIncome=new CSqlDataProvider($query);

		$this->render('researchers',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage, 'year'=>$year));
		
	}
	
	public function actionProjects()
	{
		$titlePage = "Proyectos de Investigación";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM projects')->queryAll();

		$query='SELECT u.id,p.names,pro.title, pro.discipline, pro.develop_uh, pro.is_sponsored, pro.registration_number, pro.status, pro.creation_date 
		 		FROM projects pro
				 JOIN curriculum curri ON pro.id_curriculum=curri.id
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $projects=new CSqlDataProvider($query);

		$this->render('projects',array('projects'=>$projects, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionBooks()
	{
		$titlePage = "Libros";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM books')->queryAll();

		$query='SELECT u.id,p.names,bo.book_title, bo.publisher, bo.release_date,j.hospital_unit, bo.creation_date FROM books bo
				 JOIN curriculum curri ON bo.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $books=new CSqlDataProvider($query);

		$this->render('books',array('books'=>$books, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionChapters()
	{
		$titlePage = "Capítulos";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM books_chapters')->queryAll();

		$query='SELECT u.id,p.names,cha.chapter_title, cha.book_title, cha.publishers,j.hospital_unit, cha.creation_date FROM books_chapters cha
				 JOIN curriculum curri ON cha.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $chapters=new CSqlDataProvider($query);

		$this->render('chapters',array('chapters'=>$chapters, 'titlePage'=>$titlePage, 'year'=>$year));
	}
	
	public function actionScientistMagazines()
	{
		$titlePage = "Revístas Científicas";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM books_chapters')->queryAll();

		$query='';

	     $scientistMagazines=new CSqlDataProvider($query);

		$this->render('scientistMagazines',array('scientistMagazines'=>$scientistMagazines, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionPatents()
	{
		$titlePage = "Patentes";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM patent')->queryAll();

		$query='SELECT u.id,p.names,pa.country, pa.name, pa.application_type, pa.application_number, pa.patent_type, j.hospital_unit, pa.creation_date 
				FROM patent pa
				 JOIN curriculum curri ON pa.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $patents=new CSqlDataProvider($query);

		$this->render('patents',array('patents'=>$patents, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionSoftware()
	{
		$titlePage = "Software";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM software')->queryAll();

		$query='SELECT u.id,p.names, so.country, so.title, j.hospital_unit, so.creation_date 
				FROM software so
				 JOIN curriculum curri ON so.id_curriculum=curri.id
				 JOIN jobs j ON curri.id=j.id_curriculum
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $softwares=new CSqlDataProvider($query);

		$this->render('software',array('softwares'=>$softwares, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionCopyrights()
	{
		$titlePage = "Derechos de Autor";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM copyrights')->queryAll();

		$query='';

	     $copyrights=new CSqlDataProvider($query);

		$this->render('copyrights',array('copyrights'=>$copyrights, 'titlePage'=>$titlePage, 'year'=>$year));
	}

	public function actionArticlesGuides()
	{
		$titlePage = "Artículos y Guías";
		$year=Yii::app()->db->createCommand('SELECT DISTINCT YEAR(creation_date) as year FROM articles_guides')->queryAll();

		$query='';

	     $articlesGuides=new CSqlDataProvider($query);

		$this->render('articlesGuides',array('articlesGuides'=>$articlesGuides, 'titlePage'=>$titlePage, 'year'=>$year));
	}

}
