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
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('createProject', 'createSponsorship', 
							 'update', 'deleteProject', 'view', 'index',
							 'adminProjects', 'getSponsors'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	// AP01 Registrar Proyectos
	public function actionCreateProject() {

	}

	public function actionCreateSponsorship() {
		$model=new Sponsorship;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);



		if(isset($_POST['Sponsorship']))
		{
			$model->attributes=$_POST['Sponsorship'];
			// $model->id_user_sponsorer = Yii::app()->user->id;
			// $model->status = "pendiente";
			if($model->save())
				$this->redirect(array('adminProjects'));
		}

		$this->render('form_sponsorship', array('model' => $model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $folio) {

		if ($folio != null) {
			$model = Projects::model()->findByPk($id);

			if (isset($_POST['Projects'])) {
				$model->attributes = $_POST['Projects'];
				if ($model->save()) {
					$this->redirect(array('adminProjects'));
				}
			}
			$update="update_projects";
		}else{
			$model = Sponsorship::model()->findByPk($id);

			if (isset($_POST['Sponsorship'])) {
				$model->attributes = $_POST['Sponsorship'];
				if ($model->save()) {
					$this->redirect(array('adminProjects'));
				}
			}
			$update = "form_sponsorship";
		}

		$this->render($update, array('model'=>$model,));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	// AP03 Listar Proyectos
	public function actionDeleteProject($id, $folio) {

		if ($folio != null) {
			$command = Yii::app()->db->createCommand();
		
            $command->delete('projects_coworkers', 'id_project=:id_project', array(':id_project'=>$id));
            $command->delete('projects_docs', 'id_project=:id_project', array(':id_project'=>$id));
            $command->delete('projects_followups', 'id_project=:id_project', array(':id_project'=>$id));
           
			$model = Projects::model()->findByPk($id)->delete();
		}else{
			$model = Sponsorship::model()->findByPk($id)->delete();
		}
		

			if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('adminProjects'));
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	}

	// AP04 Listar Proyectos
	public function actionView($id, $folio) {
		$connection = Yii::app()->db;
		$query = "";
		
		if ($folio != null) {
			$query .= 'SELECT CONCAT(p.names," ", p.last_name1," ", p.last_name2) AS names, pro.*, 
			pc.id AS id_project_coworkers, pc.id_project, pc.fullname, pd.id AS id_project_docs, pd.id_project,
			pd.type, pd.path, pd.creation_date AS creation_date_project_docs, pf.id AS id_project_followups,
			pf.id_project, pf.followup, pf.datetime
			 FROM projects pro
				 JOIN curriculum curri ON pro.id_curriculum=curri.id
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user
  				 LEFT JOIN projects_coworkers pc ON pc.id_project=pro.id
			     LEFT JOIN projects_docs pd ON pd.id_project=pro.id
			     LEFT JOIN projects_followups pf ON pf.id_project=pro.id
            WHERE pro.id='.$id;

			$view = 'view_project';
		} else {

			$query .= "SELECT s.sponsor_name, sp.*  
  	 			FROM sponsorship sp
 				 JOIN users u ON u.id=sp.id_user_sponsorer
  				 JOIN sponsors s ON u.id=s.id_user
            WHERE sp.id=
            " . $id;
			$view = 'view_sponsorship';

		}

		$command = $connection->createCommand($query);
		$model = $command->queryRow();

		$this->render($view, array('model'=>$model,));
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

	// AP06 Listar Proyectos
	public function actionAdminProjects() {

		$queryProjects=Yii::app()->db->createCommand('SELECT pro.id, CONCAT(p.names," ", p.last_name1," ", p.last_name2) AS names, pro.title AS project_name, pro.is_sponsored, pro.status, pro.creation_date, pro.registration_number, pro.folio 
		 		FROM projects pro
				 JOIN curriculum curri ON pro.id_curriculum=curri.id
 				 JOIN users u ON curri.id_user=u.id
  				 JOIN persons p ON u.id=p.id_user')->queryAll();

  	 	$querySponsorship=Yii::app()->db->createCommand('SELECT sp.id,s.sponsor_name AS names, sp.*  
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

	public function actionGetSponsors() {
		if (Yii::app()->request->isAjaxRequest&&!empty($_GET['term'])) {
			$sql = 'SELECT u.id, s.sponsor_name AS label
			FROM users u 
			JOIN sponsors s ON s.id_user = u.id
			WHERE u.type="moral" AND u.status="activo" AND s.sponsor_name LIKE :qterm ORDER BY s.sponsor_name ASC';
			$command = Yii::app()->db->createCommand($sql);
			$qterm = $_GET['term'].'%';
			$command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
			$result = $command->queryAll();
			echo CJSON::encode($result); 
			exit;
		} else {
			return false;
		}
	}

}
