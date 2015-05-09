<?php

class CongressesController extends Controller
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
				'actions'=>array('index','view','admin','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
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
	/*<!--PC01-Registrar datos  Participacion en congresos-->*/
	public function actionCreate()
	{
		$model=new Congresses;
 		$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		if(isset($_POST['Congresses']))
		{
			$model->attributes=$_POST['Congresses'];
			if($model->country == 'Mexico'){
					$model->type = 'Nacional';

				}
				else {
					$model->type = 'Internacional';
				}
			
			if($model->save()){
				$section = "Participación en Congresos"; 
     			$action = "Creación";
				$details = ":";
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
     			$this->render(array('admin','id'=>$model->id));	
			}else{
     			 $error = CActiveForm::validate($model);
                 if($error!='[]')
                    echo $error;
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
	/*<!--PC02-Modificar datos  Participacion en congresos-->*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		//Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Congresses']))
		{
			$model->attributes=$_POST['Congresses'];
			if($model->country == 'Mexico'){
					$model->type = 'Nacional';

				}
				else {
					$model->type = 'Internacional';
				}	
			if($model->save()){
				$section = "Participación en Congresos"; 
     			$action = "Modificación";
				$details = "Registro Número: ".$model->id;
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
			}else 
     		{
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
	/*<!--PC03-Eliminar datos  Participacion en congresos-->*/
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$section = "Participación en Congresos";   
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->work_title.". Congreso: ".$model->congress;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
		$model=new Congresses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Congresses']))
			$model->attributes=$_GET['Congresses'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Congresses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Congresses::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Congresses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='congresses-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
