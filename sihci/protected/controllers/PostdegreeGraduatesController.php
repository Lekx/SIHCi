<?php
/**
 * This is the model class for table "postdegree_graduates".
 *
 * The followings are the available columns in table 'postdegree_graduates':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $fullname
 */
class PostdegreeGraduatesController extends Controller
{
	public $layout='//layouts/system';

	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete', 
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	
	public function actionSearchBar(){
		$this->render('searchBar');
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	//GP01-Registrar datos
	public function actionCreate()
	{
		$model=new PostdegreeGraduates;
		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		$model->id_curriculum = $id_curriculum->id; 
		// Uncomment the following line if AJAX validation is needed

		$this->performAjaxValidation($model);


		if(isset($_POST['PostdegreeGraduates']))
		{
			$model->attributes=$_POST['PostdegreeGraduates'];
			$model->id_curriculum = $id_curriculum->id;  

			if($model->save())
     		{
     			$section = "Graduados de Posgrado"; 
     			$action = "Creación";
				$details = "Nombre del Graduado: ".$model->fullname;
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
			$this->render('create',array('model'=>$model));
    }

    //GP02-Modificar-datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PostdegreeGraduates']))
		{
			$model->attributes=$_POST['PostdegreeGraduates'];

			if($model->save())
     		{
     			$section = "Graduados de Posgrado"; 
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
	
	//GP03-Eliminar-datos
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$section = "Graduados de Posgrado"; 
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->fullname;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$model->delete();

     	if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	//GP04-Listar-datos
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	//GP05-Desplegar-datos GP06-Barra-de-Busqueda
	public function actionAdmin()
	{
		$model=new PostdegreeGraduates('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PostdegreeGraduates']))
			$model->attributes=$_GET['PostdegreeGraduates'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PostdegreeGraduates the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PostdegreeGraduates::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='postdegree-graduates-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	

}