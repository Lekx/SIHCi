<?php

class ProjectsFollowupsController extends Controller
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
				'actions'=>array('index','view', 'FollowupToShow'),
				'users'=>array('@'),
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
	public function actionCreate($id)
	{
		$model=new ProjectsFollowups;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ProjectsFollowups']))
		{
			$model->unsetAttributes();
			$model->attributes=$_POST['ProjectsFollowups'];
			$model->id_project = $id;
			$modelfollowup->id_user = Yii::app()->user->id;
			$model->type = "followup";
			$model->url_doc = CUploadedFile::getInstance($model,'url_doc');

			if($model->validate() == 1){
				if(is_object($model->url_doc)){
	            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/projects/'.$id;

	                if(!is_dir($path))
	                	mkdir($path, 0777, true);

	            	$url_doc = $path.'/'.date('Y-m-d_H-i').'Archivo.'.$model->url_doc->getExtensionName();
					$model->url_doc->saveAs($url_doc);
				    $model->url_doc = $url_doc;
	            }
				if($model->save()){
					echo CJSON::encode(array('status'=>'success'));
		     		Yii::app()->end();
				}
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
	public function actionFollowupToShow()
	{
		$id= $_POST["id"];
		$followupCurrent= ProjectsFollowups::model()->findByAttributes(array('id'=>$id));
		$date = date("d/m/Y", strtotime($followupCurrent->creation_date));
		$comments= ProjectsFollowups::model()->findAllByAttributes(array('id_fucom'=>$id,), array('order'=>'creation_date DESC'));
		$comment="";
		foreach ($comments as $key => $value) {
			$user = Users::model()->findByAttributes(array('id'=>$comments[$key]->id_user));
			$rol = Roles::model()->findByAttributes(array('id'=>$user->id_roles));

			$comment .= "<div clas='comentsrow'><h5>Comentario - ".$rol->alias."</h5>";
			$comment .= "<p>".$comments[$key]->url_doc != null ? CHtml::link('Ver archivo', Yii::app()->baseUrl.$comments[$key]->url_doc,array("target"=>"_blank")) : "</p>";
			$comment .= "<br><br>";

			$comment .= "<div class=''>".$comments[$key]->followup."</div>";

			$comment .= "</div> <hr>";

		}
		echo CJSON::encode(array('id'=>$followupCurrent->id,'id_project'=>$followupCurrent->id_project,'followup'=>$followupCurrent->followup, 'date'=>$date, 'comments'=>$comment));
		Yii::app()->end();

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

		if(isset($_POST['ProjectsFollowups']))
		{
			$model->attributes=$_POST['ProjectsFollowups'];
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
		$dataProvider=new CActiveDataProvider('ProjectsFollowups');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		$modelFollowup=new ProjectsFollowups();
		$idLast=Yii::app()->db->createCommand('SELECT MAX(id) AS id FROM projects_followups WHERE type="followup"')->queryRow();

		$followupCurrent= ProjectsFollowups::model()->findByAttributes(array('id'=>$idLast['id']));
		$followups= ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$id,'type'=>'followup'), array('order'=>'creation_date DESC'));

		$this->render('admin',array('modelFollowup'=>$modelFollowup,
									'followupCurrent'=>$followupCurrent,
									'followups'=>$followups,
									'idProject'=>$id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProjectsFollowups the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProjectsFollowups::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProjectsFollowups $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-followups-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
