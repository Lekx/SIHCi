<?php

class FilesManagerController extends Controller
{

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

	
	public function accessRules()
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
	}

	
	 
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	
	// MA01-Registrar datos FilesManager
	public function actionCreate()
		{
			$model=new FilesManager;

			
			if(isset($_POST['FilesManager']))
			{

		$model->attributes=$_POST['FilesManager'];

		$model->path = CUploadedFile::getInstanceByName('FilesManager[path]');
		
			if($model->path->type == 'application/pdf' || $model->path->type == 'application/PDF' )
			
			{
				$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/files_manager/'.$model->file_name.'.pdf');
				$model->path ='/simet/simet/files_manager/'.$model->file_name.'.pdf';
	   		
				if($model->save())
				$this->redirect(array('view','id'=>$model->id));

			} 
			 else 
			 	echo "Tipo de archivo no valido, solo se admiten .PDF" .$model->path->type ;

	     
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		

		if(isset($_POST['FilesManager']))
		{
			$model->attributes=$_POST['FilesManager'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
	public function actionIndex()
	{
	
		$dataProvider=new CActiveDataProvider('FilesManager');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	public function actionAdmin()
	{
		$model=new FilesManager('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FilesManager']))
			$model->attributes=$_GET['FilesManager'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function loadModel($id)
	{
		$model=FilesManager::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='files-manager-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDisplayFiles($section)
		{
			
			$result = $model=FilesManager::model()->findAll(array(
			    'condition'=>'seccion="'.$section.'" AND NOW() BETWEEN start_date AND end_date'
			));


			foreach($result as $files => $newArray){
				echo"<a href='".$newArray["path"]."' target='_blank'>".$newArray["file_name"]."</a>";
				echo"<br>";
			}

		}
}
