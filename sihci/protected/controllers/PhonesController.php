<?php
//BORRAR
class PhonesController extends Controller
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
/*	public function accessRules()
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

	//CV04-Desplegar datos.
	public function actionView($id)
	{
		$emails = new Emails;
		$emails->email = Emails::model()->findByAttributes(array('id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id))->email;
		$emails->type = Emails::model()->findByAttributes(array('id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id))->type;
		$this->render('view',array('model'=>$this->loadModel($id),	'emails'=>$emails));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	//CV01-Registro de datos
	public function actionCreate()
	{


		$model=new Phones;
		$emails = new Emails;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Phones']))
		{
			$model->attributes=$_POST['Phones'];
			$model->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
				if ($model->validate()) {
					if(isset($_POST['Emails']))
							{
								$emails->attributes = $_POST['Emails'];
								$emails->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
								if($emails->validate()){
										$model->save();
										$emails->save();
										$this->redirect(array('view','id'=>$model->id));
									}

							}
				}

		}

		$this->render('create',array('model'=>$model, 'emails' =>$emails,));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

     //CV02-Modificar registro
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$emails = new Emails;
		$emails=Emails::model()->find('id_person=:id_person',
    array(':id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id));


	// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Phones']) && isset($_POST['Emails']))
		{
			$model->attributes=$_POST['Phones'];
			$emails->attributes = $_POST['Emails'];
			if($model->save()){
				$emails->email = $emails->email;
				$emails->type = $emails->type;
				$emails->save();
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model, 'emails' =>$emails,
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
		$dataProvider=new CActiveDataProvider('Phones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Phones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Phones']))
			$model->attributes=$_GET['Phones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Phones the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Phones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Phones $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='phones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
