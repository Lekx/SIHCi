<?php

class LanguagesController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','deleteLanguage'),
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
		$model=new Languages;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/UserLanguages/';
		$path2 = '/users/'.Yii::app()->user->id.'/UserLanguages/';

		if (!is_dir($path)) {
			mkdir($path, 0775, true);
		}

		if(isset($_POST['Languages']))
		{
			$model->attributes=$_POST['Languages'];

			$model->id_curriculum = $curriculum->id; 
			$model->path = CUploadedFile::getInstanceByName('Languages[path]');

			if($model->path != ''){
					$model->path->saveAs($path.'/documentPercentage'.$model->id.'.'.$model->path->getExtensionName());
					$model->path = $path2."documentPercentage".$model->id.".".$model->path->getExtensionName();
				}else{

				$model->path = "";
				}


			if($model->save())
     		{
     			$section = "Idiomas"; 
     			$action = "Creación";
				$details = "Nombre del usuario: ".Yii::app()->user->fullname;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
     		}	
		     
		}

			$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/UserLanguages/';
		$path2 = '/users/'.Yii::app()->user->id.'/UserLanguages/';
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		 if($model->evaluation_date == "30/11/-0001" || $model->evaluation_date == "0000-00-00"){
				$model->evaluation_date = "";
			}
		$oldPath = $model->path;

		if(isset($_POST['Languages']))
		{
			$model->attributes=$_POST['Languages'];

			$model->path = CUploadedFile::getInstanceByName('Languages[path]');

			if($model->path != ''){
					$model->path->saveAs($path.'/documentPercentage'.$model->id.'.'.$model->path->getExtensionName());
					$model->path = $path2."documentPercentage".$model->id.".".$model->path->getExtensionName();
			}else{
				$model->path = $oldPath;
			}
			

			if($model->save())
     		{
     			$section = "Idiomas"; 
     			$action = "Creación";
				$details = "Numero de registro: ".$model->id;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
     		}	
		     
		}

		if(!isset($_POST['ajax']))
			$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteLanguage($id)
	{
		$model=$this->loadModel($id);
		$section = "Idiomas"; 
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->language;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

     	if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Languages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Languages']))
			$model->attributes=$_GET['Languages'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Languages the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Languages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Languages $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='languages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
