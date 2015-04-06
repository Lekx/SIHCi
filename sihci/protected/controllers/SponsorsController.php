<<<<<<< HEAD
<?php

class SponsorsController extends Controller
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
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	}*/

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

	
	public function actionCreate()
	{
		$model=new Sponsors;
		$modelAddresses = new Addresses;
		$modelPersons = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		//echo $modelPersons->names;
		

		if(isset($_POST['Sponsors']))
		{  
				$model->attributes=$_POST['Sponsors'];
				$modelAddresses->attributes = $_POST['Addresses'];
				$modelPersons->attributes = $_POST['Persons'];
				$modelPersons->photo_url = CUploadedFile::getInstanceByName('Sponsors[photo_url]');
				//echo $modelPersons->photo_url->type;
				$modelPersons->marital_status = "soltero";
				$modelPersons->genre = "masculino";
				$modelPersons->birth_date = '00/00/0000';
				$modelPersons->country = "";
				$modelPersons->person_rfc = "";
				$model->id_user = 1;
				$model->id_address = 1;

			if($modelAddresses->validate() && $modelPersons->validate() && $model->validate()){
					if($modelAddresses->save()){
						$model->id_user = Yii::app()->user->id;
						$model->id_address = $modelAddresses->id;
							if($model->save()){

							/*	if($modelPersons->photo_url->type == 'image/jpeg' || $modelPersons->photo_url->type == 'image/JPEG' ||
							   $modelPersons->photo_url->type == 'image/jpg' || $modelPersons->photo_url->type == 'image/JPG' ||
							   $modelPersons->photo_url->type == 'image/png' || $modelPersons->photo_url->type == 'image/PNG' 
							   )
								{  0*/
									$id_sponsor = Sponsors::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
									$path = YiiBase::getPathOfAlias("webroot")."/sponsors/".$id_sponsor."/img/";
									//echo "<br>".$path;
									if (!file_exists($path)) 
										mkdir($path, 0775);
									//queda hasta aqui.
								// $modelPersons->photo_url->saveAs($path.'img/logo'.$modelPersons->photo_url);

									echo $modelPersons->photo_url;
									//$modelPersons->photo_url = $path.'img/logo'.$modelPersons->photo_url->getExtensionName(); 
								
								
							//	}
								if($modelPersons->save()){

							$log = new SystemLog();
							$log->id_user = Yii::app()->user->id;
							$log->section = "Empresas";
							$log->details = "Se creo un nuevo registro";
							$log->action = "creacion";
							$log->datetime = new CDbExpression('NOW()');
							$log->save();

				
						}
						}
						}
			}
					
				
		}

		$this->render('create',array(
			'model'=>$model, 'modelAddresses'=>$modelAddresses, 'modelPersons'=>$modelPersons
		));
	}


	public function actionCreate_persons()
	{
		$model=new Persons;
		

		

		if(isset($_POST['Persons']))
		{  
			$model->attributes=$_POST['Persons'];
			$model->id_user = Yii::app()->user->id;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_persons',array(
			'model'=>$model,
		));
	}

	public function actionCreate_contact()
	{
		$model=new Phones;
		$emails = new Emails;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Phones']))
		{
			$email = $_POST['Emails']['email'];
			$type = $_POST['Emails']['type'];

			$model->attributes=$_POST['Phones'];
			$model->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->email = $email;
			$emails->type = $type;
			
			if($model->save())
				
				$this->redirect(array('view','id'=>$model->id));
			
		}

		$this->render('create_contact',array(
			'model'=>$model, 'emails' =>$emails,
		));
	}

	public function actionCreate_addresses()
	{
		$model=new Addresses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_addresses',array(
			'model'=>$model,
		));
	}


	public function actionCreate_docs()
	{
		$model=new SponsorsDocs;



		if(isset($_POST['Doc1']))
		{
			echo "<br>entramos<br>";
			//$model->attributes=$_POST['SponsorsDocs'];

			$id_sponsor = Sponsors::model()->findByAttributes(array("id_user"=>Yii::app()->user->id))->id;

if(is_object(CUploadedFile::getInstanceByName('Doc1'))){
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Documento que acredite la creación de la empresa";
			$model->path = CUploadedFile::getInstanceByName('Doc1');
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 1";
}

if(is_object(CUploadedFile::getInstanceByName('Doc2'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Acreditación de las facultades del representante o apoderado";
			$model->path = CUploadedFile::getInstanceByName('Doc2');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 2";
}

if(is_object(CUploadedFile::getInstanceByName('Doc3'))){
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;			
			$model->file_name="Permisos de actividades";
			$model->path = CUploadedFile::getInstanceByName('Doc3');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 3";
}

if(is_object(CUploadedFile::getInstanceByName('Doc4'))){	
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;		
			$model->file_name="RFC o equivalente";
			$model->path = CUploadedFile::getInstanceByName('Doc4');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 4";

}

if(is_object(CUploadedFile::getInstanceByName('Doc5'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Comprobante de domicilio";
			$model->path = CUploadedFile::getInstanceByName('Doc5');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 5";
}

if(is_object(CUploadedFile::getInstanceByName('Doc6'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Identificación Oficial del Representante";
			$model->path = CUploadedFile::getInstanceByName('Doc6');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			if($model->save())
				echo "soy Chingon y guarde el 6";
}
			/*
			$model->path = CUploadedFile::getInstanceByName('SponsorsDocs[path]');
			//echo CUploadedFile::getInstanceByName('field_one')." ".CUploadedFile::getInstanceByName('field_two')." ".CUploadedFile::getInstanceByName('field_three');

				$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
				$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
				if($model->save())
					echo "soy Chingon y guarde";*/

		}
		$this->render('create_docs',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sponsors']))
		{
			$model->attributes=$_POST['Sponsors'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		$dataProvider=new CActiveDataProvider('Sponsors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sponsors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sponsors']))
			$model->attributes=$_GET['Sponsors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sponsors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sponsors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sponsors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sponsors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
=======
<?php

class SponsorsController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/layoutSponsors';

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
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	}*/

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

	
	public function actionSponsorsInfo()
	{	
		$sponsorExist = Sponsors::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));

		if($sponsorExist != null){
			$model=$this->loadModel($sponsorExist->id);
			$modelAddresses=Addresses::model()->findByPk($model->id_address);
		}else{
			$model=new Sponsors;
			$modelAddresses = new Addresses;
		}

		
		$modelPersons = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id));
		

		if(isset($_POST['Sponsors']))
		{  
				$model->attributes=$_POST['Sponsors'];
				$modelAddresses->attributes = $_POST['Addresses'];

			if(!empty(CUploadedFile::getInstanceByName('Persons[photo_url]'))){
					$logo = CUploadedFile::getInstanceByName('Persons[photo_url]');
				echo "entre 1";
				}

			if($modelAddresses->validate() && $model->validate()){
					if($modelAddresses->save()){
						$model->id_user = Yii::app()->user->id;
						$model->id_address = $modelAddresses->id;
							if($model->save()){

						if(!empty(CUploadedFile::getInstanceByName('Persons[photo_url]'))){
							echo "entre 2";
									$id_sponsor = Sponsors::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
									$path = YiiBase::getPathOfAlias("webroot")."/sponsors/".$id_sponsor."/img/";
									if (!file_exists($path)) 
										mkdir($path, 0775,true);

									$files = glob($path); // get all file names
									foreach($files as $file){ // iterate files
									  if(is_file($file))
									    unlink($file); // delete file
									}
									$logo->saveAs($path.'logo.'.$logo->getExtensionName());
									$logo = $path.'logo.'.$logo->getExtensionName(); 
								
								
						
						if($modelPersons->updateByPk(Persons::model()->findByAttributes(array("id_user"=>Yii::app()->user->id))->id,array('photo_url'=>$logo))){

							$log = new SystemLog();
							$log->id_user = Yii::app()->user->id;
							$log->section = "Empresas";
							$log->details = "Se creo un nuevo registro";
							$log->action = "creacion";
							$log->datetime = new CDbExpression('NOW()');
							$log->save();

				
						}
						}
						}
						}
			}
					
				
		}

		$this->render('SponsorsInfo',array(
			'model'=>$model, 'modelAddresses'=>$modelAddresses, 'modelPersons'=>$modelPersons
		));
	}


	public function actionCreate_persons()
	{
		$model=new Persons;
		

		

		if(isset($_POST['Persons']))
		{  
			$model->attributes=$_POST['Persons'];
			$model->id_user = Yii::app()->user->id;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_persons',array(
			'model'=>$model,
		));
	}

	public function actionCreate_contact()
	{
		$model=new Phones;
		$emails = new Emails;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Phones']))
		{
			$email = $_POST['Emails']['email'];
			$type = $_POST['Emails']['type'];

			$model->attributes=$_POST['Phones'];
			$model->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->id_person = Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
			$emails->email = $email;
			$emails->type = $type;
			
			if($model->save())
				
				$this->redirect(array('view','id'=>$model->id));
			
		}

		$this->render('create_contact',array(
			'model'=>$model, 'emails' =>$emails,
		));
	}

	public function actionCreate_addresses()
	{
		$model=new Addresses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Addresses']))
		{
			$model->attributes=$_POST['Addresses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_addresses',array(
			'model'=>$model,
		));
	}

	public function actionCreate_billing()
	{
		$model=new SponsorsBilling;

		if(isset($_POST['Billing']))
		{
			$model->attributes=$_POST['Billing'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_billing',array(
			'model'=>$model,
		));
	}


	public function actionCreate_docs()
	{
		$model=new SponsorsDocs;



		if(isset($_POST['Doc1']))
		{
			echo "<br>entramos<br>";

			$id_sponsor = Sponsors::model()->findByAttributes(array("id_user"=>Yii::app()->user->id))->id;

if(is_object(CUploadedFile::getInstanceByName('Doc1'))){
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Documento que acredite la creación de la empresa";
			$model->path = CUploadedFile::getInstanceByName('Doc1');
			$path2 = YiiBase::getPathOfAlias("webroot")."/sponsors/docs/".$model->file_name.".".$model->path->getExtensionName();
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName();
			
			$model->save();
}

if(is_object(CUploadedFile::getInstanceByName('Doc2'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Acreditación de las facultades del representante o apoderado";
			$model->path = CUploadedFile::getInstanceByName('Doc2');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			$model->save();
}

if(is_object(CUploadedFile::getInstanceByName('Doc3'))){
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;			
			$model->file_name="Permisos de actividades";
			$model->path = CUploadedFile::getInstanceByName('Doc3');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			$model->save();
}

if(is_object(CUploadedFile::getInstanceByName('Doc4'))){	
			unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;		
			$model->file_name="RFC o equivalente";
			$model->path = CUploadedFile::getInstanceByName('Doc4');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			$model->save();

}

if(is_object(CUploadedFile::getInstanceByName('Doc5'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Comprobante de domicilio";
			$model->path = CUploadedFile::getInstanceByName('Doc5');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			$model->save();
}

if(is_object(CUploadedFile::getInstanceByName('Doc6'))){
				unset($model);
			$model=new SponsorsDocs;
			$model->id_sponsor = $id_sponsor;
			$model->file_name="Identificación Oficial del Representante";
			$model->path = CUploadedFile::getInstanceByName('Doc6');			
			$model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName());
			$model->path ='/sihci/sihci/sponsors/docs/'.$model->file_name.".".$model->path->getExtensionName(); 
			$model->save();
}

		}
		$this->render('create_docs',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sponsors']))
		{
			$model->attributes=$_POST['Sponsors'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		$dataProvider=new CActiveDataProvider('Sponsors');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sponsors('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sponsors']))
			$model->attributes=$_GET['Sponsors'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sponsors the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sponsors::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sponsors $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sponsors-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
>>>>>>> 4f2cfc59530924b7604537f37cc82888b7a0cc9e
