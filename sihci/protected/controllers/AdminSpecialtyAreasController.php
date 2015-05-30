<?php

class AdminSpecialtyAreasController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	//AE01-Registrar datos
	public function actionCreate()
	{
		$model=new AdminSpecialtyAreas;
		$modelSpecialtyAreas = new AdSpecialtyAreas;

		// Uncomment the following line if AJAX validation is needed
	    $this->performAjaxValidation($model);
		
		if(isset($_POST['AdminSpecialtyAreas']))
		{
			$model->attributes=$_POST['AdminSpecialtyAreas'];
			
			if($model->save())
            {           		              
	 			$ext_subspecialty = $_POST['ext_subspecialtys'];	          
            
				foreach($_POST['ext_subspecialtys'] as $key => $ext_subspecialtys)
				{
	               	unset($modelSpecialtyAreas);
	               	$modelSpecialtyAreas = new AdSpecialtyAreas;

	               	$modelSpecialtyAreas->id_specialty_areas = $model->id;
	       			$modelSpecialtyAreas->ext_subspecialty = $ext_subspecialty[$key];
	        		
            		$modelSpecialtyAreas->save();
          	    }	

                echo CJSON::encode(array('status'=>'200'));
                Yii::app()->end();

           }					               
           else
           {
           		echo CJSON::encode(array('status'=>'404'));
                Yii::app()->end();
           }
        }   
  		$this->render('create',array('model'=>$model,'modelSpecialtyAreas'=>$modelSpecialtyAreas));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//AE02-Modificar datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelSpecialtyArea = AdSpecialtyAreas::model()->findAllByAttributes(array('id_specialty_areas'=>$model->id));
		$modelSpecialtyAreas = new AdSpecialtyAreas;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['AdminSpecialtyAreas']))
		{
			$model->attributes=$_POST['AdminSpecialtyAreas'];


			if($model->save())
            {           		              
	        	$idsAdminSpecialtyAreas = $_POST['idsAdminSpecialtyAreas'];
	 			$ext_subspecialty = $_POST['ext_subspecialtys'];	          
            	
            	foreach($_POST['ext_subspecialty'] as $key => $value)
				{
	               	if($idsAdminSpecialtyAreas[$key] == '')
	               	{
	               		echo "Pase por aqui";
		               	unset($modelSpecialtyAreas);
		               	$modelSpecialtyAreas = new AdSpecialtyAreas;

		               	$modelSpecialtyAreas->id_specialty_areas = $model->id;
		       			$modelSpecialtyAreas->ext_subspecialty = $ext_subspecialty[$key];
	            		$modelSpecialtyAreas->save();
		        		
          	   	    }	
                   	else
                   	{
                   		echo "No se que hago aqui";
                   		$modelSpecialtyAreas->updateByPk($idsAdminSpecialtyAreas[$key], array('ext_subspecialty'=>$value)); 								
                	}
	            	
          	    }	
                echo CJSON::encode(array('status'=>'200'));
                Yii::app()->end();
	        }
	        else
           	{
           		echo CJSON::encode(array('status'=>'404'));
                Yii::app()->end();
            }				               
		}	
  		$this->render('update',array('model'=>$model,'modelSpecialtyAreas'=>$modelSpecialtyAreas,'modelSpecialtyArea'=>$modelSpecialtyArea));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	//AE03-Eliminar Datos
	public function actionDelete($id)
	{
		AdSpecialtyAreas::model()->deleteAll("id_specialty_areas=".$id );
		$model= AdminSpecialtyAreas::model()->findByPk($id);
		
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	//AE05-Desplegar datos
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AdminSpecialtyAreas');
		$this-> actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AdminSpecialtyAreas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AdminSpecialtyAreas']))
			$model->attributes=$_GET['AdminSpecialtyAreas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AdminSpecialtyAreas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AdminSpecialtyAreas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AdminSpecialtyAreas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-specialty-areas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
