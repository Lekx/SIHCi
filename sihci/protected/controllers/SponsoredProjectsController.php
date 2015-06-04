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

public function actionSponsoredProjectsV()
	{

		$query=	'SELECT u.id, pro.title, pro.discipline, pro.develop_uh, CONCAT(per.last_name1," ",per.last_name2," ",per.names) AS fullname
				FROM users AS u
				INNER JOIN persons AS per ON u.id=per.id_user
				INNER JOIN curriculum AS c ON c.id_user= u.id
				INNER JOIN projects AS pro ON pro.id_curriculum=c.id
				INNER JOIN sponsors AS spo ON u.id=spo.id_user
				INNER JOIN sponsorship AS sph ON sph.id_user_sponsorer=spo.id
				INNER JOIN sponsored_projects AS sp ON sp.id_project=pro.id
				WHERE u.type = "fisico"';

		 $SponsoredProjectsV=new CSqlDataProvider($query,array(
                                'pagination'=>array(
                                                'pageSize'=>10,
                                ),
                ));
		$this->render('SponsoredProjectsV',array(			
				'SponsoredProjectsV'=>$SponsoredProjectsV
		));

	}



}
