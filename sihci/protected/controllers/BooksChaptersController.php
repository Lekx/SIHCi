<?php

class BooksChaptersController extends Controller
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
				'actions'=>array('index','view','admin','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	public function actionCreate()
    {
        $model=new BooksChapters;
        $modelAuthor = new BooksChaptersAuthors;
      

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation(array($model, $modelAuthor));

        if(isset($_POST['BooksChapters']))
        {
            $model->attributes=$_POST['BooksChapters'];
            $model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
            $model->url_doc = CUploadedFile::getInstanceByName('BooksChapters[url_doc]');
        
            if($model->validate())
            {

            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Books_Chapters/';
               		if($model->url_doc != ''){
	                if(!is_dir($path))
	                	 mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/Books_Chapters/', 0777, true);
	                
 					$model->url_doc->saveAs($path.'Capitulo_libro'.$model->publishing_year.'.'.$model->url_doc->getExtensionName());
		            $model->url_doc = '/users/'.Yii::app()->user->id.'/books_Chapters/Capitulo_libro'.$model->publishing_year.'.'.$model->url_doc->getExtensionName();    
	                	 $this->performAjaxValidation($modelAuthor);
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
			               	   echo CJSON::encode(array('status'=>'200'));
                               $this->redirect(array('admin','id'=>$model->id));
                               Yii::app()->end();

			               }
			               else{

			               		echo CJSON::encode(array('status'=>'404'));
                                Yii::app()->end();
			               }

			               }
			               else {

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
			               	   echo CJSON::encode(array('status'=>'200'));
                               $this->redirect(array('admin','id'=>$model->id));
                               Yii::app()->end();

			            }
			            else {

			            	echo CJSON::encode(array('status'=>'404'));
                            Yii::app()->end();
			            }

			         }		   
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelAuthors = BooksChaptersAuthors::model()->findAllByAttributes(array('id_books_chapters'=>$model->id));
		$modelAuthor = new BooksChaptersAuthors;
       
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model, $modelAuthor); 
		$actual_url = $model->url_doc;
        if(isset($_POST['BooksChapters']))
        {
	            $model->attributes=$_POST['BooksChapters'];
	            $model->url_doc = CUploadedFile::getInstanceByName('BooksChapters[url_doc]');

            if($model->validate()){
           
           		if($model->url_doc != ''){
                
	               $model->url_doc->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/books_Chapters/Capitulo_libro'.$model->publishing_year.'.'.$model->url_doc->getExtensionName());
	               $model->url_doc = '/users/'.Yii::app()->user->id.'/books_Chapters/Capitulo_libro'.$model->publishing_year.'.'.$model->url_doc->getExtensionName(); 
                 }
                 else {
                 	$model->url_doc = $actual_url;
                 }
            		if($model->save()){

            					$idsBooksChapters = $_POST['idsBooksChapters'];
            					$names = $_POST['names'];
					            $last_name1 = $_POST['last_names1'];
					            $last_name2 = $_POST['last_names2'];
					            $position = $_POST['positions'];
					                 
     					 foreach($_POST['names'] as $key => $value){
     					 	var_dump($idsBooksChapters[$key]);
     					 	echo "<br>";
			        		if($idsBooksChapters[$key] == ""){
			        			unset($modelAuthor);
								$modelAuthor = new BooksChaptersAuthors;
			        			$modelAuthor->id_books_chapters = $model->id;
			        			$modelAuthor->names = $names[$key];
								$modelAuthor->last_name1 = $last_name1[$key];
								$modelAuthor->last_name2 = $last_name2[$key];
								$modelAuthor->position = $position[$key];
								$modelAuthor->save();
                    		}else
								$modelAuthor->updateByPk($idsBooksChapters[$key], array('names' => $value, 'last_name1' => $last_name1[$key], 'last_name2' => $last_name2[$key], 'position' => $position[$key])); 		
                		}

                   	 		  echo CJSON::encode(array('status'=>'200'));
                               $this->redirect(array('admin','id'=>$model->id));
                               Yii::app()->end();
                	} else {

                		echo CJSON::encode(array('status'=>'404'));
                        Yii::app()->end();
                	}
            
            }//End validate 
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
	public function actionDelete($id)
	{
		BooksChaptersAuthors::model()->deleteAll("id_books_chapters =".$id );
		$model= BooksChapters::model()->findByPk($id);
		if($model->url_doc != null){
		unlink(YiiBase::getPathOfAlias("webroot").$model->url_doc);
		$model->delete();
		}else
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
		$dataProvider=new CActiveDataProvider('BooksChapters');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
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
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	protected function performAjaxValidationAuthors($modelAuthors)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='books-chapters-form')
		{
			echo CActiveForm::validate($modelAuthors);
			Yii::app()->end();
		}
	}
}
