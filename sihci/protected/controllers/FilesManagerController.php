<?php
class FilesManagerController extends Controller
{

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

	public function accessRules()
	{
		return array(

				array('allow',
					'actions'=>array('index','create','update','delete','admin','view'),
					'expression'=>'($user->Rol->alias==="ADMIN" || $user->Rol->alias==="JIOPD")',
					'users'=>array('@'),
				),
				array('allow',
					'actions'=>array('displayFiles'),
					'users'=>array('*'),
				),
				array('deny',
					'users'=>array('*'),
				),

			);
	}


	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	// MA01-Registrar datos FilesManager
	public function actionCreate()
		{
			if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
				$iduser = (int)$_GET["ide"];
			else
				$iduser = Yii::app()->user->id;

			$model=new FilesManager;
			$this->performAjaxValidation($model);


			if(isset($_POST['FilesManager']))
			{
		$file = CUploadedFile::getInstanceByName('FilesManager[path]');
		$model->attributes=$_POST['FilesManager'];
		$model->end_date = substr($model->end_date, 0, 10)." "."23:59:59";
		$model->path = CUploadedFile::getInstanceByName('FilesManager[path]');
		$path = YiiBase::getPathOfAlias("webroot") . "/files_manager/";
		if (!file_exists($path)) {
			mkdir($path, 0775, true);
		}
			if($model->validate()){
				$folder = "/files_manager/";
				$path2 = YiiBase::getPathOfAlias("webroot");
				$file->saveAs(YiiBase::getPathOfAlias("webroot").$folder.$model->file_name.'.pdf');
				$model->path = $path2.$folder.$model->file_name.'.pdf';

					if($model->save()){
						$log = new SystemLog();
						$log->id_user = $iduser;
						$log->section = "Empresas";
						$log->details = "Se creo un nuevo registro";
						$log->action = "creacion";
						$log->datetime = new CDbExpression('NOW()');
						$log->save();
						echo CJSON::encode(array('status'=>'success'));
						Yii::app()->end();
					}else{
				//echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Solo se admiten archivos con extenciòn .pdf'));
				$error = CActiveForm::validate($model);
				if($error!='[]')
					echo $error;
				Yii::app()->end();
			}
		}else{
			//echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Por Favor llene todos los campos.'));
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


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);



		if(isset($_POST['FilesManager']))
		{
			$model->attributes=$_POST['FilesManager'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();


		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FilesManager');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionAdmin()
	{
		$model=new FilesManager('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FilesManager']))
			$model->attributes=$_GET['FilesManager'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function loadModel($id)
	{
		$model=FilesManager::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='files-manager-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDisplayFiles($section)
		{

		$result = $model=FilesManager::model()->findAll(array(
			'condition'=>'section="'.$section.'" AND NOW() BETWEEN start_date AND end_date'
			));


		echo "<ul>";
		foreach($result as $files => $newArray){
			echo"<li><a href='../../".$newArray["path"]."' target='_blank'>".$newArray["file_name"]."</a></li>";


		}
		echo "</ul>";

	}
}
