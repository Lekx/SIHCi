<?php

class ArticlesGuidesController extends Controller
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
	/*public function actionCreate()
	{
		$model=new ArticlesGuides;
		$modelAuthor = new ArtGuidesAuthor;
		   
		$id_resume = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		
		$model->id_resume = $id_resume->id; 
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelAuthor);
		
		if(isset($_POST['ArticlesGuides']) && isset($_POST['ArtGuidesAuthor']))
		{
			$model->attributes=$_POST['ArticlesGuides'];
			$modelAuthor->attributes=$_POST['ArtGuidesAuthor'];

			$model->id_resume = $id_resume->id;   
	        $model->url_document = CUploadedFile::getInstance($model,'url_document');
			$modelAuthor->id_art_guides = "1";

			if($model->validate()==1 && $modelAuthor->validate()==1)
            {            	
            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/ArticlesAndGuides/';
               	if ($model->url_document !="")
               	{
	                if(!is_dir($path))
	                	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/ArticlesAndGuides/', 0777, true);	              
	                
	 					$model->url_document->saveAs($path.'file'.$model->isbn.'.'.$model->url_document->getExtensionName());
					    $model->url_document = '/users/'.Yii::app()->user->id.'/ArticlesAndGuides/file'.$model->isbn.'.'.$model->url_document->getExtensionName();
		                
		                if($model->save())
		                {
		          
							$names = $_POST['names'];
				            $last_name1 = $_POST['last_name1'];
				            $last_name2 = $_POST['last_name2'];
				            $position = $_POST['position'];
       						   
	     					foreach($_POST['ArtGuidesAuthor'] as $key => $value)
	     					{							
	     						unset($modelAuthor);
				               	$modelAuthor = new ArtGuidesAuthor;	
								$modelAuthor->id_art_guides  = $model->id;
				       			$modelAuthor->names = $names[$key];
				        		$modelAuthor->last_name1 = $last_name1[$key];
				       			$modelAuthor->last_name2 = $last_name2[$key];
				        		$modelAuthor->position = $position[$key];
	                    		$modelAuthor->save();
		              	    }
		              	    $section = "Artículos y Guías"; 
		     				$action = "Creación";
							$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->title;
		     				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);		     		
				       		echo CJSON::encode(array('status'=>'success'));
				     		Yii::app()->end();
						
		               }
		                                 
			    }
			    else 
			    {
	               	if($model->save())
	               	{             

			      		//$names = $_POST['ArtGuidesAuthor']['names'];
			           // $last_name1 = $_POST['ArtGuidesAuthor']['last_name1'];
			           // $last_name2 = $_POST['ArtGuidesAuthor']['last_name2'];
			           // $position = $_POST['ArtGuidesAuthor']['position'];
			            	$names = $_POST['names'];
				            $last_name1 = $_POST['last_name1'];
				            $last_name2 = $_POST['last_name2'];
				            $position = $_POST['position'];
				            
			  			foreach($_POST['ArtGuidesAuthor'] as $key => $value)
     					{
     						unset($modelAuthor);
				            $modelAuthor = new ArtGuidesAuthor;	
							$modelAuthor->id_art_guides  = $model->id;
			       			$modelAuthor->names = $names[$key];
			        		$modelAuthor->last_name1 = $last_name1[$key];
			       			$modelAuthor->last_name2 = $last_name2[$key];
			        		$modelAuthor->position = $position[$key];
                    		$modelAuthor->save();
	              	    }	
          	 	 		$section = "Artículos y Guías"; 
	     				$action = "Creación";
						$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->title;
	     				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
	     			
               	  		echo CJSON::encode(array('status'=>'success'));
			     		Yii::app()->end();
                    } 		                      
		        }    
	        }// if validate
	        else
	        {
          		$error1 = CActiveForm::validate($model);
				$error2 = CActiveForm::validate($modelAuthor);
				$error = "{";
				if($error1 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error1));
				if($error2 !='[]')
					$error.= str_replace("{", "",str_replace("}", "",$error2));

				if($error!='[]')
					echo str_replace("]\"", "],\"",$error)."}";

				Yii::app()->end();		         
	        }
	    }//	ArticlesGuides  
        	
   		if(!isset($_POST['ajax']))
				$this->render('create',array('model'=>$model,'modelAuthor'=>$modelAuthor));
	} 
	*/
		public function actionCreate()
	{
		$model=new ArticlesGuides;
		$modelAuthor = new ArtGuidesAuthor;
		   
		$id_resume = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));   
		
		$model->id_resume = $id_resume->id; 
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['ArticlesGuides']))
		{
			$model->attributes=$_POST['ArticlesGuides'];
			$model->id_resume = $id_resume->id;   

	        $model->url_document = CUploadedFile::getInstanceByName('ArticlesGuides[url_document]');

			if($model->validate())
            {
            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/ArticlesAndGuides/';

               	if (!empty(CUploadedFile::getInstanceByName('ArticlesGuides[url_document]')))
               	{
	                if(!is_dir($path))
	                	mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/ArticlesAndGuides/', 0777, true);
	              
	                	$model->url_document->saveAs($path.'file'.$model->isbn.'.'.$model->url_document->getExtensionName());
					    $model->url_document = '/users/'.Yii::app()->user->id.'/ArticlesAndGuides/file'.$model->isbn.'.'.$model->url_document->getExtensionName();    			 			   	
		                if($model->save())
		                {
		               		              
				 			$names = $_POST['names'];
				            $last_name1 = $_POST['last_names1'];
				            $last_name2 = $_POST['last_names2'];
				            $position = $_POST['positions'];
				            
         					foreach($_POST['names'] as $key => $names)
         					{
				               	unset($modelAuthor);
				               	$modelAuthor = new ArtGuidesAuthor;

				               	$modelAuthor->id_art_guides = $model->id;
				       			$modelAuthor->names = $names;
				        		$modelAuthor->last_name1 = $last_name1[$key];
				       			$modelAuthor->last_name2 = $last_name2[$key];
				        		$modelAuthor->position = $position[$key];
	                    		$modelAuthor->save();
		              	    }	
		              	    $section = "Artículos y Guías"; 
		     				$action = "Creación";
							$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->title;
		     				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		     				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		                    Yii::app()->end();
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
			               	$modelAuthor = new ArtGuidesAuthor;
			               	$modelAuthor->id_art_guides  = $model->id;
			       			$modelAuthor->names = $names;
			        		$modelAuthor->last_name1 = $last_name1[$key];
			       			$modelAuthor->last_name2 = $last_name2[$key];
			        		$modelAuthor->position = $position[$key];
                    		$modelAuthor->save();
	              	    }	
              	 	 		$section = "Artículos y Guías"; 
		     				$action = "Creación";
							$details = "Fecha: ".date("Y-m-d H:i:s").". Datos: Titulo: ".$model->title;
		     				Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		     				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                        	Yii::app()->end();

                    } 		                      
		            else 
		            {
		            	echo CJSON::encode(array('status'=>'404'));
	                    Yii::app()->end();
		            }
		        }    
	        }// if validate
	    }//	ArticlesGuides	   
        	
   		if(!isset($_POST['ajax']))
				$this->render('create',array('model'=>$model,'modelAuthor'=>$modelAuthor));
	} 

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);
		$modelAuthors = ArtGuidesAuthor::model()->findAllByAttributes(array('id_art_guides'=>$model->id));
		$modelAuthor = new ArtGuidesAuthor;
       
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model); 
		$oldUrlDocument = $model->url_document;
        if(isset($_POST['ArticlesGuides']))
        {
	            $model->attributes=$_POST['ArticlesGuides'];
	            $model->url_document = CUploadedFile::getInstanceByName('ArticlesGuides[url_document]');

			if($model->validate()==1)
			{	
           		if ($model->url_document != "")
                {

                    if(!empty($oldUrlDocument))
                    	unlink(YiiBase::getPathOfAlias("webroot").$oldUrlDocument);
                    
                    $model->url_document = CUploadedFile::getInstanceByName('ArticlesGuides[url_document]');
                    $urlFile = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/ArticlesAndGuides/';
                  
                    if(!is_dir($urlFile))          
                        mkdir($urlFile, 0777, true);

                       $model->url_document->saveAs($urlFile.'file'.$model->isbn.'.'.$model->url_document->getExtensionName());
		               $model->url_document= '/users/'.Yii::app()->user->id.'/ArticlesAndGuides/file'.$model->isbn.'.'.$model->url_document->getExtensionName();                                                    
                }                
                else                  
                   $model->url_document = $oldUrlDocument;       
                    
            		if($model->save())
            		{
    					$idsArticlesGuides = $_POST['idsArticlesGuides'];
    					$names = $_POST['names'];
			            $last_name1 = $_POST['last_names1'];
			            $last_name2 = $_POST['last_names2'];
			            $position = $_POST['positions'];
					                 
     					 foreach($_POST['names'] as $key => $value)
     					 {
     					 
			        		if($idsArticlesGuides[$key] == '')
			        		{
			        			unset($modelAuthor);
								$modelAuthor = new ArtGuidesAuthor;
			        			$modelAuthor->id_art_guides = $model->id;
			        			$modelAuthor->names = $names[$key];
								$modelAuthor->last_name1 = $last_name1[$key];
								$modelAuthor->last_name2 = $last_name2[$key];
								$modelAuthor->position = $position[$key];
								$modelAuthor->save();
                    		}
                    		else
                    		{
								$modelAuthor->updateByPk($idsArticlesGuides[$key], array('names' => $value, 'last_name1' => $last_name1[$key], 'last_name2' => $last_name2[$key], 'position' => $position[$key])); 		
                		    }
                	    }
                	    
                	    $section = "Artículos y Guías"; 
		     			$action = "Modificación";
						$details = "Número Registro: ".$model->id;
		     			Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		     			
           	 		  	echo CJSON::encode(array('status'=>'success'));
				     	Yii::app()->end();
                	} 
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
				$this->render('update',array('model'=>$model,'modelAuthor'=>$modelAuthor, 'modelAuthors'=>$modelAuthors));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		ArtGuidesAuthor::model()->deleteAll("id_art_guides =".$id );
		$model= ArticlesGuides::model()->findByPk($id);


		$section = "Artículos y Guías";  
		$action = "Eliminación";
		$details = "Registro Número: ".$model->id.". Fecha de Creación: ".$model->creation_date.".";
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);

		if($model->url_document != null)
		{
			unlink(YiiBase::getPathOfAlias("webroot").$model->url_document);
			$model->delete();
		}
		else
			$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionDeleteAuthor($id, $idArticlesGuidesAuthors){

		$modelAuthors= ArtGuidesAuthor::model()->findByPk($id);
		$section = "Autor de articulos y guías";
		$action = "Eliminación";
		$details = "Registro Número: ".$modelAuthors->id.". Datos: ".$modelAuthors->names;
		Yii::app()->runController('adminSystemLog/saveLog/section/'.$section.'/details/'.$details.'/action/'.$action);
		$modelAuthors->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('articlesGuides/update/'.$idArticlesGuidesAuthors));
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
		$model=new ArticlesGuides('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticlesGuides']))
			$model->attributes=$_GET['ArticlesGuides'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ArticlesGuides the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ArticlesGuides::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ArticlesGuides $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articles-guides-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
