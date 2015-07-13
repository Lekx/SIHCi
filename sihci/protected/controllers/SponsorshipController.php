<?php

class SponsorshipController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getResearchers','admin'),
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
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$modelProjectsDocs = new ProjectsDocs;
		$model= new Sponsorship;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelProjectsDocs);


		if(isset($_POST['Sponsorship'])){
			$model->attributes=$_POST['Sponsorship'];
			$model->id_user_sponsorer = Yii::app()->user->id;
			$model->status = "PENDIENTE";

			/*$id_sponsorship = Sponsorship::model()->findByAttributes(array("id_user" => Yii::app()->user->id))->id;
			$DocExist = SponsorsDocs::model()->findAllByAttributes(array('id_sponsor' => $id_sponsor));
			$modelProjectsDocs = array();
			if ($DocExist != null) {
				foreach ($DocExist as $key => $value) {
					$modelProjectsDocs[$value->file_name] = array($value->id, $value->path);
				}
			}*/

			$modelProjectsDocs = new ProjectsDocs;

			if($model->validate()){
					if($model->save()){
						/*
						$id_user = Yii::app()->user->id;
						$model_id = $model->id;
						$path = YiiBase::getPathOfAlias("webroot") . "/users/" . $id_user . "/sponsorship/" . $model_id; ;
						if (!file_exists($path)) {
								mkdir($path, 0777, true);
						}
						$modelProjectsDocs->file_name = "Contrato con investigador";
						$model->path = CUploadedFile::getInstanceByName('Doc1');


*/




						echo CJSON::encode(array('status'=>'success'));
						Yii::app()->end();
					}
				}else{
						$error = CActiveForm::validate($model);
						if($error!='[]')
						echo $error;
						Yii::app()->end();
					}
		}
			$this->render('create',array(
				'model'=>$model,'modelProjectsDocs'=>$modelProjectsDocs
			));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sponsorship']))
		{
				$model->attributes=$_POST['Sponsorship'];
			if($model->validate()){
				if($model->save()){
					echo CJSON::encode(array('status'=>'success'));
					Yii::app()->end();
				}
			}else {
				$error = CActiveForm::validate($model);
				if($error!='[]')
				echo $error;
				Yii::app()->end();
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sponsorship');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	private function checkAuth()
	{
		$conexion = Yii::app()->db;
		$query = "SELECT u.id, u.email, s.sponsor_name FROM users AS u JOIN sponsors AS s ON s.id_user = u.id WHERE u.id = ".Yii::app()->user->id;
		$checkAuth = $conexion->createCommand($query)->queryAll();
		//print_r($checkAuth);
		$result = false;
		if(!empty($checkAuth))
			$result = true;

		return $result;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sponsorship('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sponsorship']))
			$model->attributes=$_GET['Sponsorship'];
		//var_dump($this->checkAuth());
		$this->render('admin',array(
			'model'=>$model, 'checkAuth'=>$this->checkAuth()
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sponsorship the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sponsorship::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sponsorship $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sponsorship-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGetResearchers() {
		if (Yii::app()->request->isAjaxRequest&&!empty($_GET['term'])) {
			$sql = 'SELECT u.id , CONCAT(p.last_name1, " ", p.last_name2, ", ", p.names) AS label
			FROM users AS u
			LEFT JOIN persons AS p ON u.id = p.id_user
			RIGHT JOIN curriculum AS cv ON u.id = cv.id_user
			WHERE u.type="fisico"
			AND u.status="activo"
			AND (p.last_name1 LIKE :qterm OR p.names LIKE :qterm) ORDER BY p.last_name1 ASC';
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
