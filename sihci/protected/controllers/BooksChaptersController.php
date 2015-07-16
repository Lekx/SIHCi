<?php

class BooksChaptersController extends Controller
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
		
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			    'actions'=>array('admin','create','update','delete','deleteAuthor','view','index'),
				'expression'=>'($user->type==="fisico")',
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

	//CA01-Registrar datos
	public function actionCreate()
    {

        $model=new BooksChapters;
        $modelAuthor = new BooksChaptersAuthors;
      
        // Uncomment the following line if AJAX validation is needed

         $this->performAjaxValidation($model);
       

        if(isset($_POST['BooksChapters']))
        {
            $model->attributes=$_POST['BooksChapters'];
            $model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
            $model->url_doc = CUploadedFile::getInstanceByName('BooksChapters[url_doc]');
        
            if($model->validate() == 1)
            {
            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Books_Chapters/';
               		if($model->url_doc != ''){
	                	if(!is_dir($path))
	                	 	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Books_Chapters/', 0777, true);

 							 $model->url_doc->saveAs($path.'Capitulo_libro'.date('d-m-Y_H-i-s').'.'.$model->url_doc->getExtensionName());
		           			 $model->url_doc = '/users/'.Yii::app()->user->id.'/Books_Chapters/Capitulo_libro'.date('d-m-Y_H-i-s').'.'.$model->url_doc->getExtensionName();
	                	
			               		if($model->save()){
			               		              
					 			$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					            
             					 	foreach($_POST['names'] as $key => $names){
						               	unset($modelAuthor);
						               	$modelAuthor = new BooksChaptersAuthors;
						               	$modelAuthor->id_books_chapters = $model->id;
						       			$modelAuthor->names = $names;
						        		$modelAuthor->last_name1 = $last_name1[$key];
						       			$modelAuthor->last_name2 = $last_name2[$key];
						        		$modelAuthor->position = $position[$key];
			                    		$modelAuthor->save();
			              	 		}	
			              	    $section = "Capítulos de Libros";
     							$action = "Creación";
								$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->chapter_title;
     							Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			                    
                                echo CJSON::encode(array('status'=>'success'));
				     			Yii::app()->end();
                            
			               		}
			        }
			        else
			        {
			        	if($model->save()){

					 			$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					            
             					 foreach($_POST['names'] as $key => $names){
					               	unset($modelAuthor);
					               	$modelAuthor = new BooksChaptersAuthors;
					               	$modelAuthor->id_books_chapters = $model->id;
					       			$modelAuthor->names = $names;
					        		$modelAuthor->last_name1 = $last_name1[$key];
					       			$modelAuthor->last_name2 = $last_name2[$key];
					        		$modelAuthor->position = $position[$key];
		                    		$modelAuthor->save();
			              	 }
			              	 $section = "Capítulos de Libros";
     							$action = "Creación";
								$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->chapter_title;
     							Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
			                    
			                    echo CJSON::encode(array('status'=>'success'));
				     			Yii::app()->end();
			               }

			        } 
			} 
			else{
					$error = CActiveForm::validate($model);
					if($error!='[]')
						echo $error;
   				   
   				   Yii::app()->end();
			}

        }

        $this->render('create',array(
            'model'=>$model,'modelAuthor'=>$modelAuthor,
        ));
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	//CA02-Modificar datos
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelAuthors = BooksChaptersAuthors::model()->findAllByAttributes(array('id_books_chapters'=>$model->id));
		$modelAuthor = new BooksChaptersAuthors;
       
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model, $modelAuthors); 
		$actual_url = $model->url_doc;
        if(isset($_POST['BooksChapters']))
        {
	            $model->attributes=$_POST['BooksChapters'];

	            $model->url_doc = CUploadedFile::getInstanceByName('BooksChapters[url_doc]');
				
		if($model->validate()==1){
           		if ($model->url_doc != ''){

                    if(!empty($actual_url))
                    unlink(YiiBase::getPathOfAlias("webroot").$actual_url);

                    $model->url_doc = CUploadedFile::getInstanceByName('BooksChapters[url_doc]');
                    $urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Books_Chapters/';
                  
                    if(!is_dir($urlFile))          
                        mkdir($urlFile, 0777, true);

                       $model->url_doc->saveAs($urlFile.'Capitulo_libro'.date('d-m-Y_H-i-s').'.'.$model->url_doc->getExtensionName());
		               $model->url_doc = '/users/'.Yii::app()->user->id.'/Books_Chapters/Capitulo_libro'.date('d-m-Y_H-i-s').'.'.$model->url_doc->getExtensionName();                                                    

                } else {
                  
                    $model->url_doc = $actual_url;       
                 }   
            	
            	if($model->save()){

            					$idsBooksChapters = $_POST['idsBooksChapters'];
            					$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					                 
     					 foreach($_POST['names'] as $key => $value){

			        		if($idsBooksChapters[$key] == ''){
			        			unset($modelAuthor);
								$modelAuthor = new BooksChaptersAuthors;
			        			$modelAuthor->id_books_chapters = $model->id;
			        			$modelAuthor->names = $names[$key];
								$modelAuthor->last_name1 = $last_name1[$key];
								$modelAuthor->last_name2 = $last_name2[$key];
								$modelAuthor->position = $position[$key];
								$modelAuthor->save();
                    		}else{
								$modelAuthor->updateByPk($idsBooksChapters[$key], array('names' => $value, 'last_name1' => $last_name1[$key], 'last_name2' => $last_name2[$key], 'position' => $position[$key])); 		
                		}
                	}

                	$section = "Capítulos de Libros";
					$action = "Modificación";
					$details = "Registro Número: ".$model->id;
					Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
                   	 		   
					echo CJSON::encode(array('status'=>'success'));
				    Yii::app()->end();			

                	}
            }    	
            else{
        			$error = CActiveForm::validate($model);
					if($error!='[]')
						echo $error;
				   
				     Yii::app()->end();
            }

        }

        $this->render('update',array(
            'model'=>$model,'modelAuthor'=>$modelAuthor, 'modelAuthors'=>$modelAuthors
        ));
    }
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	//CA03-Eliminar datos
	public function actionDelete($id)
	{
		BooksChaptersAuthors::model()->deleteAll("id_books_chapters =".$id );
		$model= BooksChapters::model()->findByPk($id);
		$section = "Capítulos de Libros";
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.". Datos: ".$model->chapter_title;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		if($model->url_doc != null){
		unlink(YiiBase::getPathOfAlias("webroot").$model->url_doc);
		$model->delete();
		}else
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDeleteAuthor($id, $idBooksChapters){

		$modelAuthors= BooksChaptersAuthors::model()->findByPk($id);
		$section = "Autor de capítulos libros";
		$action = "Eliminación";
		$details = "Registro Número: ".$modelAuthors->id.". Datos: ".$modelAuthors->names;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$modelAuthors->delete();
		//$this->loadModel($id)->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('booksChapters/update/'.$idBooksChapters));
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

	//CA06-Barra de busqueda
	public function actionAdmin()
	{
		$model=new BooksChapters('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BooksChapters']))
			$model->attributes=$_GET['BooksChapters'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BooksChapters the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BooksChapters::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BooksChapters $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='books-chapters-form')
		{
			echo CActiveForm::validate(array($model));
			Yii::app()->end();
		}
	}
}
