<?php

class PatentController extends Controller
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
	//RP01-Registrar-datos
	public function actionCreate()
	{
		$model=new Patent;

		// Uncomment the following line if AJAX validation is needed
		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;    
		$model->id_curriculum = $id_curriculum;
		$this->performAjaxValidation($model);

		if(isset($_POST['Patent']))
		{
			$model->attributes=$_POST['Patent'];
			$model->id_curriculum =$id_curriculum;

			if($model->consession_date == null)
    			$model->consession_date ='00/00/0000';	

		    if($model->save())
     		{

     			$section = "Propiedad Intelectual"; 
     			$action = "Creación";
				$details = "Subsección Patentes";
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			echo CJSON::encode(array('status'=>'200'));

     			Yii::app()->end();
     		}	
     		else 
     		{
     			echo CJSON::encode(array('status'=>'404'));
                Yii::app()->end();
     		}
			
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//RP02-Modificar-datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if($model->consession_date == "30/11/-0001" || $model->consession_date == "00/00/0000"){
			$model->consession_date = "";
		}	

		if(isset($_POST['Patent']))
		{
			$model->attributes=$_POST['Patent'];

			if($model->consession_date == null)
    			$model->consession_date ='00/00/0000';	
    		
			if($model->save())
     		{
     			$section = "Propiedad Intelectual"; 
     			$action = "Modificación";
				$details = "Subsección Patentes. Registro Número: ".$model->id;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			echo CJSON::encode(array('status'=>'200'));
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
	//RP03-Eliminar-datos
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$section = "Propiedad Intelectual";  
		$action = "Eliminación";
		$details = "Subsección Patentes. Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->participation_type.". Estado de Patente: ".$model->state;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */

    //RP04-Desplegar-datos
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	
    //RP05-Listar-datos
	public function actionAdmin()
	{
		$model=new Patent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Patent']))
			$model->attributes=$_GET['Patent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Patent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Patent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Patent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='patent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
