<?php

class SponsoredProjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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

public function actionSponsoredProjects()
	{

		$query='SELECT u.id,p.names,pro.title, pro.discipline, pro.develop_uh, pro.is_sponsored, pro.registration_number, pro.status, pro.creation_date 
     		FROM projects pro
     		JOIN curriculum curri ON pro.id_curriculum=curri.id
      		JOIN users u ON curri.id_user=u.id
       		JOIN persons p ON u.id=p.id_user 
       		WHERE is_sponsored = 1';

		 $cveHcPublics=new CSqlDataProvider($query,array(
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));
		$this->render('SponsoredProjectsV',array(			
				'SponsoredProjectsV'=>$SponsoredProjectsV
		));

	}



}
