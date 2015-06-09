<?php

class AdminProjectsController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/system';

	/**
	 * @return array action filters
	 */
	public function filters() {
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreateProject() {

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($ide) {

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	}

	public function actionView($id) {

	}
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		
		$this->actionAdminProjects();
	}

	/**
	 * Manages all models.
	 */
	// AP06 
	public function actionAdminProjects() {

		$queryProjects=Yii::app()->db->createCommand('SELECT u.id, CONCAT(p.names," ", p.last_name1," ", p.last_name2) AS names, pro.title AS project_name, pro.is_sponsored, pro.status, pro.creation_date, pro.registration_number, pro.folio 
		 		FROM projects pro
				 JOIN curriculum curri ON pro.id_curriculum=curri.id
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user')->queryAll();

  	 	$querySponsorship=Yii::app()->db->createCommand('SELECT u.id,s.sponsor_name AS names, sp.*  
  	 			FROM sponsorship sp
 				 JOIN users u ON u.id=sp.id_user_sponsorer
  				 JOIN sponsors s ON u.id=s.id_user')->queryAll();
  		
	      $queryresults = array_merge($queryProjects, $querySponsorship);

	     $dataProvider = new CArrayDataProvider($queryresults, array(
					'id'=>'id',
					'pagination'=>array('pageSize'=>30,),
					
					));

		$this->render('admin', array('dataProvider' => $dataProvider,));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */


	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'projects-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
