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
				'actions'=>array('ResearchersIncome', 'index', 'ResearchersLow', 'NumberOfResearchers',
					'NumberOfResearchersSNI', 'NumberOfResearchersNoSNI'),
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
		$this->redirect('NumberOfResearchers');
	}


	public function actionResearchersIncome()
	{
		$titlePage = "Anual Total Ingreso de Investigadores";

		 $count=Yii::app()->db->createCommand('SELECT COUNT(curri.id) FROM curriculum curri 
		 	INNER JOIN users u ON curri.id_user=u.id
		 	INNER JOIN jobs j ON curri.id=j.id_curriculum
			INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  			INNER JOIN persons p ON u.id=p.id_user')->queryScalar();	


		 $query='SELECT u.id,p.names,rese.name,j.hospital_unit,curri.SNI from curriculum curri 
 				INNER JOIN users u ON curri.id_user=u.id
 				INNER JOIN jobs j ON curri.id=j.id_curriculum
 				INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  				INNER JOIN persons p ON u.id=p.id_user
  				WHERE curri.status=1';

	     $researchersIncome=new CSqlDataProvider($query,array(
                                'totalItemCount'=>$count,
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));

		$this->render('researchersIncome',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage));
	}

	public function actionResearchersLow()
	{
		$titlePage = "Anual Total Baja de Investigadores";

		 $count=Yii::app()->db->createCommand('SELECT COUNT(curri.id) FROM curriculum curri 
		 	INNER JOIN users u ON curri.id_user=u.id
		 	INNER JOIN jobs j ON curri.id=j.id_curriculum
			INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  			INNER JOIN persons p ON u.id=p.id_user')->queryScalar();	

		 $query='SELECT u.id,p.names,rese.name,j.hospital_unit,curri.SNI from curriculum curri 
 				INNER JOIN users u ON curri.id_user=u.id
 				INNER JOIN jobs j ON curri.id=j.id_curriculum
 				INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  				INNER JOIN persons p ON u.id=p.id_user
  				WHERE curri.status=0';

	     $researchersIncome=new CSqlDataProvider($query,array(
                                'totalItemCount'=>$count,
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));

		$this->render('researchersIncome',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage));
		
	}

	public function actionNumberOfResearchers()
	{
		$titlePage = "Anual Total Cantidad de Investigadores";

		 $count=Yii::app()->db->createCommand('SELECT COUNT(curri.id) FROM curriculum curri 
		 	INNER JOIN users u ON curri.id_user=u.id
		 	INNER JOIN jobs j ON curri.id=j.id_curriculum
			INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  			INNER JOIN persons p ON u.id=p.id_user')->queryScalar();	

		 $query='SELECT u.id,p.names,rese.name,j.hospital_unit,curri.SNI from curriculum curri 
 				INNER JOIN users u ON curri.id_user=u.id
 				INNER JOIN jobs j ON curri.id=j.id_curriculum
 				INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  				INNER JOIN persons p ON u.id=p.id_user';

	     $researchersIncome=new CSqlDataProvider($query,array(
                                'totalItemCount'=>$count,
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));

		$this->render('researchersIncome',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage));
		
	}

	public function actionNumberOfResearchersSNI()
	{
		$titlePage = "Anual Total Cantidad de Investigadores con SNI";

		 $count=Yii::app()->db->createCommand('SELECT COUNT(curri.id) FROM curriculum curri 
		 	INNER JOIN users u ON curri.id_user=u.id
		 	INNER JOIN jobs j ON curri.id=j.id_curriculum
			INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  			INNER JOIN persons p ON u.id=p.id_user')->queryScalar();	

		 $query='SELECT u.id,p.names,rese.name,j.hospital_unit,curri.SNI from curriculum curri 
 				INNER JOIN users u ON curri.id_user=u.id
 				INNER JOIN jobs j ON curri.id=j.id_curriculum
 				INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  				INNER JOIN persons p ON u.id=p.id_user
  				WHERE curri.SNI!=0';

	     $researchersIncome=new CSqlDataProvider($query,array(
                                'totalItemCount'=>$count,
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));

		$this->render('researchersIncome',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage));
		
	}

	public function actionNumberOfResearchersNoSNI()
	{
		$titlePage = "Anual Total Cantidad de Investigadores sin SNI";

		 $count=Yii::app()->db->createCommand('SELECT COUNT(curri.id) FROM curriculum curri 
		 	INNER JOIN users u ON curri.id_user=u.id
		 	INNER JOIN jobs j ON curri.id=j.id_curriculum
			INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  			INNER JOIN persons p ON u.id=p.id_user')->queryScalar();	

		 $query='SELECT u.id,p.names,rese.name,j.hospital_unit,curri.SNI from curriculum curri 
 				INNER JOIN users u ON curri.id_user=u.id
 				INNER JOIN jobs j ON curri.id=j.id_curriculum
 				INNER JOIN research_areas rese ON curri.id=rese.id_curriculum
  				INNER JOIN persons p ON u.id=p.id_user
  				WHERE curri.SNI=0';

	     $researchersIncome=new CSqlDataProvider($query,array(
                                'totalItemCount'=>$count,
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));

		$this->render('researchersIncome',array('researchersIncome'=>$researchersIncome, 'titlePage'=>$titlePage));
		
	}

}
