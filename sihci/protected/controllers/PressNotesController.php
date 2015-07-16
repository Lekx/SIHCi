<?php

class PressNotesController extends Controller
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
			array('allow', 
			    'actions'=>array('admin','create','update','delete','view','index'),
				'expression'=>'($user->type==="fisico")',
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

	//DP01-Registro de datos
	public function actionCreate()
	{
		$model=new PressNotes;
		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		$model->id_curriculum = $id_curriculum->id; 

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PressNotes']))
		{
			$model->attributes=$_POST['PressNotes'];
			$model->id_curriculum = $id_curriculum->id;
			  
			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;    
	     	
	     	if($model->date == null)
    			$model->date ='00/00/0000';		
	     	
	     	if($model->save())
			{
				$section = "Difusión de Prensa"; 
     			$action = "Creación";
				$details = "Datos: ".$model->type;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		    	echo CJSON::encode(array('status'=>'success'));
		    	Yii::app()->end();
		    }	
		    else 
	    	{
     			$error = CActiveForm::validate($model);
                if($error!='[]')
                   echo $error;
                Yii::app()->end();
	        }		
 	
		}

		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//DP02-Modificar registro
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if($model->date == "30/11/-0001" || $model->date == "00/00/0000"){
			$model->date = "";
		}	
		if(isset($_POST['PressNotes']))
		{
			$model->attributes=$_POST['PressNotes'];
			if($model->save())
     		{
     			$section = "Difusión de Prensa";  
     			$action = "Modificación";
				$details = "Registro Número: ".$model->id.".";
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     		}	
     		else 
     		{
     			 $error = CActiveForm::validate($model);
                 if($error!='[]')
                    echo $error;
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
	//DP03-Eliminar registro 
  	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$section = "Difusión de Prensa";  
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->type." dirigido a: ".$model->directed_to;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	//DP04-Desplegar registro
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	//DP05-Listar datos
	public function actionAdmin()
	{
		$model=new PressNotes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PressNotes']))
			$model->attributes=$_GET['PressNotes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PressNotes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PressNotes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PressNotes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='press-notes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
