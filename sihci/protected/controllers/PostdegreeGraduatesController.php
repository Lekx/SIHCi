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
	public $layout='//layouts/column2';

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

		$this->performAjaxValidation($model);


		if(isset($_POST['PostdegreeGraduates']))
		{
				$model->attributes=$_POST['PostdegreeGraduates'];
				$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
							
				if($model->save())
				{
					$this->redirect(array('view','id'=>$model->id));
				}
					   
		}

		$this->render('create',array(
			'model'=>$model,
		));
    }

    //GP02-Modificar-datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$this->performAjaxValidation($model);

		if(isset($_POST['PostdegreeGraduates']))
		{
			$model->attributes=$_POST['PostdegreeGraduates'];

			if($model->save())
			{
			   	$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));

	}
	
	//GP03-Eliminar-datos
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

     	if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	//GP04-Listar-datos
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PostdegreeGraduates');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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