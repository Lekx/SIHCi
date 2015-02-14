	<?php

	class ManejadorArchivosController extends Controller
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
		public function actionView($id)
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}

		// MA01-Registrar datos
		public function actionCreate()
		{
			$model=new ManejadorArchivos;

			
			if(isset($_POST['ManejadorArchivos']))
			{

		$model->attributes=$_POST['ManejadorArchivos'];

		$model->ruta = CUploadedFile::getInstanceByName('ManejadorArchivos[ruta]');
		//echo $model->ruta->size;
		echo $model->ruta->type;
			if($model->ruta->type == 'application/pdf' || $model->ruta->type == 'application/PDF' )
			//if($model->ruta->size <= 5000000)
			{
				$model->ruta->saveAs(YiiBase::getPathOfAlias("webroot").'/manejador_archivos/'.$model->nombre_archivo.'.pdf');
	   				if($model->save())
				$this->redirect(array('view','id'=>$model->id));

			} 
			 else 
			 	echo "Tipo de archivo no valido, solo se admiten .PDF" .$model->ruta->type ;

	     
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}

		/**
		 * Updates a particular model.
		 * If update is successful, the browser will be redirected to the 'view' page.
		 * @param integer $id the ID of the model to be updated
			 */ public function actionUpdate($id)
		{
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['ManejadorArchivos']))
			{
				$model->attributes=$_POST['ManejadorArchivos'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
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
			$dataProvider=new CActiveDataProvider('ManejadorArchivos');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}

		/**
		 * Manages all models.
		 */
		public function actionAdmin()
		{
			$model=new ManejadorArchivos('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['ManejadorArchivos']))
				$model->attributes=$_GET['ManejadorArchivos'];

			$this->render('admin',array(
				'model'=>$model,
			));
		}

		/**
		 * Returns the data model based on the primary key given in the GET variable.
		 * If the data model is not found, an HTTP exception will be raised.
		 * @param integer $id the ID of the model to be loaded
		 * @return ManejadorArchivos the loaded model
		 * @throws CHttpException
		 */
		public function loadModel($id)
		{
			$model=ManejadorArchivos::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}

		/**
		 * Performs the AJAX validation.
		 * @param ManejadorArchivos $model the model to be validated
		 */
		protected function performAjaxValidation($model)
		{
			if(isset($_POST['ajax']) && $_POST['ajax']==='manejador-archivos-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}


		public function actionDisplayFiles()
		{
			
		//	$files = ManejadorArchivos::model()->findAllByAttributes("seccion","Direccion general");

$files = $model=ManejadorArchivos::model()->findAll(array(
    'condition'=>'seccion="Direccion general" '
));

				$this->render('desplegar',array(
				'files'=>$files,
			));
		}
	}
