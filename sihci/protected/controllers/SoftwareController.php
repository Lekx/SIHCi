<?php

class SoftwareController extends Controller
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	//SO01-Registro de datos
	public function actionCreate()
	{
		$model=new Software;

		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		
		$end_date = Software::model()->findByAttributes(array('end_date'=>$model->end_date));
		$model->id_curriculum = $id_curriculum->id; 
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Software']))
		{
			$model->attributes=$_POST['Software'];
			$model->id_curriculum = $id_curriculum->id;                  
            
    		if($model->end_date == null)
    			$model->end_date ='00/00/0000';		
				
				if (!empty(CUploadedFile::getInstanceByName('Software[path]')))
				{
	           		 $model->path = CUploadedFile::getInstanceByName('Software[path]');
				   	$urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Folder_Software/';
		          
		            if(!is_dir($urlFile))          
		              	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Folder_Software/', 0777, true);

					    $model->path->saveAs($urlFile.'fileSowtfware'.date('d-m-Y_H-i-s').'.'.$model->path->getExtensionName());
					    $model->path = '/users/'.Yii::app()->user->id.'/Folder_Software/fileSowtfware'.date('d-m-Y_H-i-s').'.'.$model->path->getExtensionName();    			 			   	
					
			    }
				else 
				{
					$model->path = "";
				}	

					if($model->save())
					{	   			   
					    echo CJSON::encode(array('status'=>'200'));
					   	//$this->redirect(array('admin','id'=>$model->id));
				    	Yii::app()->end();
				    }			    	
				    else 
			    	{
			    		echo CJSON::encode(array('status'=>'404'));
		                Yii::app()->end();
			        }
					    
		}
			
		if(!isset($_POST['ajax']))
			$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	//SO02-Modificar-registro
	public function actionUpdate($id)
	{
		$model=new Software;

		$model=$this->loadModel($id);

		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		$end_date = Software::model()->findByAttributes(array('end_date'=>$model->end_date));
		$oldPath = $model->path;

		$model->id_curriculum = $id_curriculum->id; 
				
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if($model->end_date == "30/11/-0001" || $model->end_date == "00/00/0000"){
			$model->end_date = "";
		}	

		if(isset($_POST['Software']))
		{
			$model->attributes=$_POST['Software'];
			$model->id_curriculum = $id_curriculum->id;                      
			
			if($model->end_date == null)
    			$model->end_date ='00/00/0000';		

							
				if (!empty(CUploadedFile::getInstanceByName('Software[path]')))
				{			
					if(!empty($oldPath))
						unlink(YiiBase::getPathOfAlias("webroot").$oldPath);
					
		           		$model->path = CUploadedFile::getInstanceByName('Software[path]');
					   	$urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Folder_Software/';
			          
			            if(!is_dir($urlFile))          
			              	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Folder_Software/', 0777, true);

						    $model->path->saveAs($urlFile.'fileSowtfware'.date('d-m-Y_H-i-s').'.'.$model->path->getExtensionName());
						    $model->path = '/users/'.Yii::app()->user->id.'/Folder_Software/fileSowtfware'.date('d-m-Y_H-i-s').'.'.$model->path->getExtensionName();    			 			   	

			    }
				else if(empty(CUploadedFile::getInstanceByName('Software[path]'))) {
					echo "que hay loco".$oldPath;
					echo ($model->path);
				}	

						if($model->save())
						{	   			   
						    echo CJSON::encode(array('status'=>'200'));
						   	//$this->redirect(array('admin','id'=>$model->id));
					    	Yii::app()->end();
					    }			    	
					    else 
				    	{
				    		echo CJSON::encode(array('status'=>'404'));
			                Yii::app()->end();
				        }
					    
		}
			
		if(!isset($_POST['ajax']))
			$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	//SO03-Desactivar-registro
	public function actionDelete($id)
	{
		
		$model= Software::model()->findByPk($id);
			
		if ($model->path != null ){
			 unlink(YiiBase::getPathOfAlias("webroot").$model->path);
		     $model->delete();
		}
		else 
 			$this->loadModel($id)->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */

	//SO04-Desplegar- registro
	public function actionIndex()
	{
		$this->actionAdmin();
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

	//SO06-Listar registro
	public function actionAdmin()

	{
		$model=new Software('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Software']))
			$model->attributes=$_GET['Software'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Software the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Software::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Software $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='software-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

