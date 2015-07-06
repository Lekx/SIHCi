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


	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	// MA01-Registrar datos FilesManager
	public function actionCreate()
		{
			$model=new FilesManager;


			if(isset($_POST['FilesManager']))
			{

		$model->attributes=$_POST['FilesManager'];
		$model->end_date = substr($model->end_date, 0, 10)." "."23:59:59";
		$model->path = CUploadedFile::getInstanceByName('FilesManager[path]');
		$path = YiiBase::getPathOfAlias("webroot") . "/files_manager/";
		if (!file_exists($path)) {
			mkdir($path, 0775, true);
		}
			if($model->validate() == 1)
			{

				$folder = "/files_manager/";
				$path2 = YiiBase::getPathOfAlias("webroot");
				$model->path->saveAs(YiiBase::getPathOfAlias("webroot").$folder.$model->file_name.'.pdf');
				$model->path = $path2.$folder.$model->file_name.'.pdf';

					if($model->save())
						$this->redirect(array('admin'));

			}else{
				$error = CActiveForm::validate($model);
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
