<?php

class BooksController extends Controller
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
	//LI01-Registrar datos
	public function actionCreate()
	{
		$model=new Books;
		$modelAuthor = new BooksAuthors;
		   
		$id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		
		$model->id_curriculum = $id_curriculum->id; 
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Books']))
		{
			$model->attributes=$_POST['Books'];
			$model->id_curriculum = $id_curriculum->id;   

	        $model->path = CUploadedFile::getInstanceByName('Books[path]');

			if($model->validate())
            {
            	$urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Userbooks/';

               	if ($model->path != null)
               	{
	                if(!is_dir($urlFile))
	                	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Userbooks/', 0777, true);
	                
	    		 				
	 					$model->path->saveAs($urlFile.'file'.$model->isbn.'.'.$model->path->getExtensionName());
					    $model->path = '/users/'.Yii::app()->user->id.'/Userbooks/file'.$model->isbn.'.'.$model->path->getExtensionName();    			 			   	
			              
			                if($model->save())
			                {			               		              
					 			$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					            
	         					foreach($_POST['names'] as $key => $names)
	         					{
					               	unset($modelAuthor);
					               	$modelAuthor = new BooksAuthors;

					               	$modelAuthor->id_book = $model->id;
					       			$modelAuthor->names = $names;
					        		$modelAuthor->last_name1 = $last_name1[$key];
					       			$modelAuthor->last_name2 = $last_name2[$key];
					        		$modelAuthor->position = $position[$key];
		                    		$modelAuthor->save();
			              	    }
			              	    	
			              	    $section = "Libros";
     							$action = "Creación";
								$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->book_title;
     							Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			                    
								if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
								/*echo CJSON::encode(array('status'=>'success'));
	                            $this->redirect(array('admin'));
	                            Yii::app()->end();*/

			               }					               
			               else
			               {
			               		echo CJSON::encode(array('status'=>'404'));
	                            Yii::app()->end();
			               }
			    
			    }
			    else
			    {
	               	if($model->save())
	               	{             
			 			$names = $_POST['names'];
			            $last_name1 = $_POST['last_names1'];
			            $last_name2 = $_POST['last_names2'];
			            $position = $_POST['positions'];
			            
     					foreach($_POST['names'] as $key => $names)
     					{
			               	unset($modelAuthor);
			               	$modelAuthor = new BooksAuthors;
			               	$modelAuthor->id_book  = $model->id;
			       			$modelAuthor->names = $names;
			        		$modelAuthor->last_name1 = $last_name1[$key];
			       			$modelAuthor->last_name2 = $last_name2[$key];
			        		$modelAuthor->position = $position[$key];
                    		$modelAuthor->save();
	              	    }	
              	 		$section = "Libros";
						$action = "Creación";
						$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->book_title;
						
						Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
	               	  	
						if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
						/*echo CJSON::encode(array('status'=>'200'));
                        $this->redirect(array('admin','id'=>$model->id));
                        Yii::app()->end();*/

                    } 		                      
		            else 
		            {
		            	echo CJSON::encode(array('status'=>'404'));
	                    Yii::app()->end();
		            }
		        }    
	        }// if validate
	    }//	Books	   
        	
   		if(!isset($_POST['ajax']))
				$this->render('create',array('model'=>$model,'modelAuthor'=>$modelAuthor));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	//LI02-Modificar datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelAuthors = BooksAuthors::model()->findAllByAttributes(array('id_book'=>$model->id));
		$modelAuthor = new BooksAuthors;
       
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model); 
		$oldUrlDocument = $model->path;

        if(isset($_POST['Books']))
        {
	            $model->attributes=$_POST['Books'];
	            $model->path = CUploadedFile::getInstanceByName('Books[path]');
	
           		if ($model->path != null)
                {
                    if(!empty($oldUrlDocument))
                    	unlink(YiiBase::getPathOfAlias("webroot").$oldUrlDocument);
                    
                    $model->path = CUploadedFile::getInstanceByName('Books[path]');
	                    $urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Userbooks/';
	                  
	                    if(!is_dir($urlFile))          
	                        mkdir($urlFile, 0777, true);

	                    $model->path->saveAs($urlFile.'file'.$model->isbn.'.'.$model->path->getExtensionName());
			            $model->path= '/users/'.Yii::app()->user->id.'/Userbooks/file'.$model->isbn.'.'.$model->path->getExtensionName();                                                    
			        
			        
                }                
                else                  
                  $model->path = $oldUrlDocument;       
                    
        		if($model->save())
        		{
					$idsBooks = $_POST['idsBooks'];
					$names = $_POST['names'];
		            $last_name1 = $_POST['last_names1'];
		            $last_name2 = $_POST['last_names2'];
		            $position = $_POST['positions'];
		                 
 					 foreach($_POST['names'] as $key => $value)
 					 {
 					 
		        		if($idsBooks[$key] == '')
		        		{
		        			unset($modelAuthor);
							$modelAuthor = new BooksAuthors;
		        			$modelAuthor->id_book = $model->id;
		        			$modelAuthor->names = $names[$key];
							$modelAuthor->last_name1 = $last_name1[$key];
							$modelAuthor->last_name2 = $last_name2[$key];
							$modelAuthor->position = $position[$key];
							$modelAuthor->save();
                		}
                		else
                		{
							$modelAuthor->updateByPk($idsBooks[$key], array('names' => $value, 'last_name1' => $last_name1[$key], 'last_name2' => $last_name2[$key], 'position' => $position[$key])); 		
            		    }
            	    }

            	    $section = "Libros";
					$action = "Modificación";
					$details = "Registro Número: ".$model->id;
					
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
       	 		   
       	 		    if(!isset($_GET['ajax']))
                                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
					/*echo CJSON::encode(array('status'=>'200'));
                    $this->redirect(array('admin'));
                    Yii::app()->end();*/
            	} 
            	
            	/*else 
                {
    				echo CJSON::encode(array('status'=>'404'));
                    Yii::app()->end();
                } */          
            
        }
        	
   		if(!isset($_POST['ajax']))
				$this->render('update',array('model'=>$model,'modelAuthor'=>$modelAuthor,'modelAuthors'=>$modelAuthors));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	//LI03-Eliminar datos
	public function actionDelete($id)
	{
		BooksAuthors::model()->deleteAll("id_book=".$id );
		$model= Books::model()->findByPk($id);
		$section = "Libros";
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->book_title;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		if($model->path != null)
		{
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
	//LI04-Desplegar datos
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Books');
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	//LI05-Listar registros
	public function actionAdmin()
	{
		$model=new Books('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Books']))
			$model->attributes=$_GET['Books'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Books the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Books::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Books $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='books-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
