<?php

class CopyrightsController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
	
	//DA01-Registro de datos
	public function actionCreate()
	{
		$model=new Copyrights;
		// Uncomment the following line if AJAX validation is needed
		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		$model->id_curriculum = $id_curriculum->id;   
		$this->performAjaxValidation($model);
		//var_dump($_POST);

		if(isset($_POST['Copyrights']))
		{
			$model->attributes=$_POST['Copyrights'];
			$model->id_curriculum = $id_curriculum->id;  

			if($model->application_date == null)
    			$model->application_date ='00/00/0000';	

			if($model->save())
     		{
     			$section = "Propiedad Intelectual"; 
     			$action = "Creación";
				$details = "Subsección Derechos de Autor";
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			echo CJSON::encode(array('status'=>'404'));
                Yii::app()->end();
     		}

     		//Yii::app()->end();
		}

		if(!isset($_POST['ajax']))
			$this->render('create',array('model'=>$model));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//DA02-Modificar-registro 
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if($model->application_date == "30/11/-0001" || $model->application_date == "00/00/0000"){
			$model->application_date = "";
		}	

		if(isset($_POST['Copyrights']))
		{
			$model->attributes=$_POST['Copyrights'];

			if($model->application_date == null)
    			$model->application_date ='00/00/0000';	
    		
			if($model->save())
     		{
     			$section = "Propiedad Intelectual"; 
     			$action = "Modificación";
				$details = "Subsección Derechos de Autor. Registro Número: ".$model->id;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			echo CJSON::encode(array('status'=>'404'));
                Yii::app()->end();
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

	//DA03-Desactivar-registro
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$section = "Propiedad Intelectual";  
		$action = "Eliminación";
		$details = "Subsección Derechos de Autor. Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->participation_type.". Título : ".$model->title;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */

	//DA04-Desplegar-datos
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */

	//DA05-Listar-Registros
	public function actionAdmin()
	{
		$model=new Copyrights('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Copyrights']))
			$model->attributes=$_GET['Copyrights'];

		$this->render('admin',array('model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Copyrights the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Copyrights::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Copyrights $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='copyrights-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
