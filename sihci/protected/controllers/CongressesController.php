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
		$modelAuthor=new CongressesAuthors;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
		if(isset($_POST['Congresses']))
		{
			$model->attributes=$_POST['Congresses'];
 			$model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			if($model->country == 'Mexico'){
					$model->type = 'Nacional';
				}
				else {
					$model->type = 'Internacional';
				}

			if($model->save()){
				$section = "Participación en Congresos";
     			$action = "Creación";
				$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Puesto: ".$model->work_title.". Congreso: ".$model->congress.".";
     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
				
     			$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					            
             					 	foreach($_POST['names'] as $key => $names){
						               	unset($modelAuthor);
						               	$modelAuthor = new CongressesAuthors;
						               	$modelAuthor->id_congresses = $model->id;
						       			$modelAuthor->names = $names;
						        		$modelAuthor->last_name1 = $last_name1[$key];
						       			$modelAuthor->last_name2 = $last_name2[$key];
						        		$modelAuthor->position = $position[$key];
			                    		$modelAuthor->save();
			              	 		}

				echo CJSON::encode(array('status'=>'200'));
     			Yii::app()->end();
     			//$this->render(array('admin','id'=>$model->id));
     			
     			
			}else{
     			echo CJSON::encode(array('status'=>'404'));
                        Yii::app()->end();
     		}

	}
		$this->render('create',array('model'=>$model, 'modelAuthor'=>$modelAuthor));
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
		$modelAuthors = CongressesAuthors::model()->findAllByAttributes(array('id_congresses'=>$model->id));
		$modelAuthor = new CongressesAuthors;

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
				
     				$idsCongresses = $_POST['idsCongresses'];
            					$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					                 
     					 foreach($_POST['names'] as $key => $value){

			        		if($idsCongresses[$key] == ''){
			        			unset($modelAuthor);
								$modelAuthor = new CongressesAuthors;
			        			$modelAuthor->id_congresses = $model->id;
			        			$modelAuthor->names = $names[$key];
								$modelAuthor->last_name1 = $last_name1[$key];
								$modelAuthor->last_name2 = $last_name2[$key];
								$modelAuthor->position = $position[$key];
								$modelAuthor->save();
                    		}else{
								$modelAuthor->updateByPk($idsCongresses[$key], array('names' => $value, 'last_name1' => $last_name1[$key], 'last_name2' => $last_name2[$key], 'position' => $position[$key])); 		
                		}
                	}



				echo CJSON::encode(array('status'=>'200'));
     			Yii::app()->end();
     			//$this->render(array('admin','id'=>$model->id));
			}else
     		{
     			echo CJSON::encode(array('status'=>'404'));
                        Yii::app()->end();
     		}

		}

		$this->render('update',array('model'=>$model,'modelAuthor'=>$modelAuthor, 'modelAuthors'=>$modelAuthors));
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

		CongressesAuthors::model()->deleteAll("id_congresses =".$id );
		$model= Congresses::model()->findByPk($id);
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
