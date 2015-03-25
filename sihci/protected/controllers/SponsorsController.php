<?php

class SponsorsController extends Controller
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

	
	public function actionCreate()
	{
		$model=new Sponsors;
		$modelAddresses = new Addresses;
		$modelPersons = new Persons;

		

		if(isset($_POST['Sponsors']))
		{  
			$model->attributes=$_POST['Sponsors'];
			$modelAddresses->attributes = $_POST['Addresses'];
			$model->id_user = Yii::app()->user->id;
			


			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model, 'modelAddresses'=>$modelAddresses, 'modelPersons'=>$modelPersons
		));
	}

	public function actionCreate_persons()
	{
		$model=new Persons;
		

		

		if(isset($_POST['Persons']))
		{  
			$model->attributes=$_POST['Persons'];
			$model->id_user = Yii::app()->user->id;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_persons',array(
			'model'=>$model,
		));
	}

	public function actionCreate_contact()
	{
		$model=new Phones;
		$emails = new Emails;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Phones']))
		{
			$email = $_POST['Emails']['email'];
			$type = $_POST['Emails']['type'];

			$model->attributes=$_POST['Phones'];
			$model->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->email = $email;
			$emails->type = $type;
			
			if($model->save())
				
				$this->redirect(array('view','id'=>$model->id));
			
		}

		$this->render('create_contact',array(
			'model'=>$model, 'emails' =>$emails,
		));
	}

	public function actionCreate_addresses()
	{
		$model=new Addresses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_addresses',array(
			'model'=>$model,
		));
	}


	public function actionCreate_docs()
	{
		$model=new SponsorsDocs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SponsorsDocs']))
		{
			$model->attributes=$_POST['SponsorsDocs'];
			$model->id_sponsor = Sponsors::model()->findByAttributes(array("id_user"=>Yii::app()->user->id));
			$model->path = CUploadedFile::getInstanceByName('sponsors[path]');
	
			//terminar las comparaciones de tipo de archivo a subir.
			if($model->path->type == 'application/pdf' || $model->path->type == 'application/PDF' )
			
			{
				$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/files_manager/'.$model->file_name.'.pdf');
				$model->path ='/sihci/sihci/files_manager/'.$model->file_name.'.pdf';
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_docs',array(
			'model'=>$model,
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

		if(isset($_POST['Sponsors']))
		{
			$model->attributes=$_POST['Sponsors'];
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
		$dataProvider=new CActiveDataProvider('Sponsors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sponsors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sponsors']))
			$model->attributes=$_GET['Sponsors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sponsors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sponsors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sponsors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sponsors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
