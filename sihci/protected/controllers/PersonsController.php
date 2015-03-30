<?php

class PersonsController extends Controller
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
	// public function accessRules()
	// {
	// 	return array(
	// 		array('allow',  // allow all users to perform 'index' and 'view' actions
	// 			'actions'=>array('index','view'),
	// 			'users'=>array('admin', '@'),
	// 		),
	// 		array('allow', // allow authenticated user to perform 'create' and 'update' actions
	// 			'actions'=>array('create','update'),
	// 			'users'=>array('admin', '@'),
	// 		),
	// 		array('allow', // allow admin user to perform 'admin' and 'delete' actions
	// 			'actions'=>array('admin','delete'),
	// 			'users'=>array('admin', '@'),
	// 		),
	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 		),
	// 	);
	// }



	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	//CV04-Desplegar datos. 
	public function actionView($id)
	{
		  
		$this->render('view',array('model'=>$this->loadModel($id), 'curriculum', $curriculum));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	//CV01-Registro de datos 
	public function actionCreate()
	{
		$model=new Persons;
		$curriculum = new Curriculum;
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Persons']))
		{
			$model->attributes=$_POST['Persons'];
			$model->id_user = Yii::app()->user->id;
			$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
		
			if ($model->validate()) {
				
				if($model->photo_url != ''){
						//	 mkdir('/SIHCi/sihci/users/'.$model->id_user.'/cve-hc/', 0777);
					mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/', 0777, true);
					$model->photo_url->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png');
					$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.$model->id_user.'/cve-hc/perfil.png';
				
						if(isset($_POST['Curriculum']))
							{
								$curriculum->attributes = $_POST['Curriculum'];
																		
								$curriculum->id_user = Yii::app()->user->id;
								$curriculum->id_actual_address = 1;
								if($curriculum->validate())
									{	
										$model->save();
										$curriculum->save();
										$this->redirect(array('view','id'=>$model->id));
										//<?php echo CHtml::link('Link Text',array('controller/action'));
									}
								
							}			   		
				}else{
					if(isset($_POST['Curriculum']))
							{
								$curriculum->attributes = $_POST['Curriculum'];
																		
								$curriculum->id_user = Yii::app()->user->id;
								$curriculum->id_actual_address = 1;
								if($curriculum->validate())
									{
										$model->save();
										$curriculum->save();
										$this->redirect(array('view','id'=>$model->id));
									}
								
							}
				}

			}//end if validate
		}
	$this->render('create',array('model'=>$model, 'curriculum'=>$curriculum));
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
		$curriculum = new Curriculum;
		$curriculum=Curriculum::model()->find('id_user=:id_user',
                              array(':id_user'=>Yii::app()->user->id));
      
      if(isset($_POST['Persons']) && isset($_POST['Curriculum']))
		{
			$model->attributes=$_POST['Persons'];
			$curriculum->attributes = $_POST['Curriculum'];
			$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
			
			if ($model->validate()) {
				
				if($model->photo_url != ''){
					
					$model->photo_url->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png');
					$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
					
					$this->performAjaxValidation($model);
						
						if($model->save()){
							$curriculum->native_country = $curriculum->native_country;
							$curriculum->save();
							$this->redirect(array('view','id'=>$model->id));
							}

				}else{

					$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png';
						if($model->save()){
							$curriculum->native_country = $curriculum->native_country;
							$curriculum->save();
							$this->redirect(array('view','id'=>$model->id));
							}
					}//end if else photo_url == ''
			}// end if validate
		}// end isset $_POST

		$this->render('update',array('model'=>$model, 'curriculum'=>$curriculum));
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
		$dataProvider=new CActiveDataProvider('Persons');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Persons('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Persons']))
			$model->attributes=$_GET['Persons'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Persons the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Persons::model()->findByPk($id);
		$curriculum=Curriculum::model()->findByPk($id);
				
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	/**
	 * Performs the AJAX validation.
	 * @param Persons $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='persons-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



}
