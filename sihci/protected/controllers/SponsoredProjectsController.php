<?php

class SponsoredProjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/system', meaning
	 * using two-column layout. See 'protected/views/layouts/system.php'.
	 */
	public $layout='//layouts/informativas';

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
		
		$this->actionSponsoredProjectsV();
	}

public function actionSponsoredProjectsV()
	{
		$this->layout = 'informativas';
		$query=	'SELECT p.id,CONCAT(pe.last_name1," ",pe.last_name2," ",pe.names) AS fullname, sp.sponsor_name, spo.id_user_sponsorer,
				p.title,  p.discipline, p.develop_uh, date(p.creation_date) AS fecha
				from projects AS p 
				LEFT JOIN curriculum AS c ON c.id = id_curriculum 
				LEFT JOIN persons AS pe ON pe.id_user = c.id_user 
				LEFT JOIN users AS u ON u.id = c.id_user 
				LEFT JOIN sponsored_projects AS spr ON spr.id_project = p.id 
				LEFT JOIN sponsorship AS spo ON spo.id = spr.id_sponsorship 
				LEFT JOIN sponsors AS sp ON sp.id_user = spo.id_user_sponsorer 
				WHERE u.type = "fisico" AND p.is_sponsored = 1';

		 $sponsoredProjectsV=new CSqlDataProvider($query,array(
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));
		$this->render('sponsoredProjectsV',array(			
				'sponsoredProjectsV'=>$sponsoredProjectsV
		));

	}



}
