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
				'actions'=>array('researchers', 'projects', 'books'),
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

		$query='SELECT u.id,p.names,bo.book_title, bo.publisher, bo.release_date, bo.creation_date 
		 		FROM books bo
				 JOIN curriculum curri ON bo.id_curriculum=curri.id
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user';

	     $books=new CSqlDataProvider($query);

		$this->render('books',array('books'=>$books, 'titlePage'=>$titlePage, 'year'=>$year));
	}	

	
}
