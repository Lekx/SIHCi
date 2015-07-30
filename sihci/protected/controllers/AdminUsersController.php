<?php

class AdminUsersController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/system';

	/**
	 * @return array action filters
	 */
	public function filters() {
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
			array('allow',
	 			'actions'=>array('deleteUser','update','createUser','adminUsers','view',
	 				             'changeStatus','changeRol','changeStatusCurriculum','doubleSession','index'
	 				            ),
	 			'expression'=>'($user->Rol->alias==="ADMIN")',
	 			'users'=>array('@'),
	 		),
	 		array('allow',
	 			'actions'=>array('view','changeStatus','changeRol','changeStatusCurriculum','index'),
	 			'expression'=>'($user->Rol->alias==="JIOPD")',
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	 function checkEmailDifferent($email, $email2){
 		if ($email != $email2){
 			return false;
 		}else
 			return true;
 		}

 function checkEmailNull($email, $email2){
 	if($email == '' || $email2 == ''){
 		return false;
 	}else
 			return true;
 		}


 	function checkPasswordDifferent($password, $password2){
 		if ($password != $password2){
       return false;
 		}else
 			return true;


 		}

 	function checkPasswordNull($password, $password2){
 		if($password == '' || $password2 == ''){
       return false;
 		}else
 			return true;

 		}

 	public function actionInfoAccount(){
 			$this->layout = 'system';
 		if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
 			$iduser = (int)$_GET["ide"];
 		else
 			$iduser = Yii::app()->user->id;

 			$details = Users::model()->findByPk($iduser);
 			$this->render('infoAccount',array(
 			'details'=>$details,
 			));
 	}

 	public function checkEmailExist($email){
 		if ($this->currentemail != $email){
       			return false;
 		}
 		else
 			return true;
 		}
 		public function checkPasswordExist($password){
 			if ($this->currentpassword != sha1(md5(sha1($password)))){
         	return false;
 			}else
 				return true;
 			}

 		public function checkEmailValid($email){
 		  	if (!preg_match("/^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$/",$email)){
           return false;
 		  } else
 		      return true;
 		  }



		public function actionCreateUser() {
			$layout =  '//layouts/system';

			$model = new Users;
			$modelPersons = new Persons;

			$this->performAjaxValidation($model);
			$this->performAjaxValidation($modelPersons);

			if(isset($_POST['Users'])) {
				$model->id_roles = '3';
				$model->attributes = $_POST['Users'];

				$result = $model->findAll(array('condition' => 'email="' . $model->email . '"'));
				if (empty($result)){
				if ($this->checkEmailDifferent($_POST['Users']['email'], $_POST['Users']['email2']) && $this->checkEmailNull($_POST['Users']['email'], $_POST['Users']['email2']) && $this->checkEmailValid($_POST['Users']['email'],$_POST['Users']['email2'])) {
					if ($this->checkPasswordDifferent($_POST['Users']['password'], $_POST['Users']['password2']) && $this->checkPasswordNull($_POST['Users']['password'],$_POST['Users']['password2'])) {



							$model->registration_date = new CDbExpression('NOW()');
							$model->activation_date = new CDbExpression('NOW()');
							$model->status = 'activo';
							$model->act_react_key = sha1(md5(sha1(date('d/m/y H:i:s') . $model->email . rand(1000, 5000))));
							$model->password = sha1(md5(sha1($model->password)));

							if ($model->validate()) {

								if (isset($_POST['Persons'])) {

									$modelPersons->attributes = $_POST['Persons'];

									$result2 = $modelPersons->findAll(array('condition' => 'curp_passport="' . $modelPersons->curp_passport . '"'));
									if (empty($result2)) {

										$modelPersons->id_user = 0;
										$modelPersons->marital_status = -1;
										$modelPersons->genre = -1;
										$modelPersons->birth_date = '00/00/0000';

										if ($modelPersons->validate()) {
											if($model->save()){
												$modelPersons->id_user = $model->id;
												if($modelPersons->save()){
													//$this->activateAccount($model->email,$model->act_react_key);
													$log = new SystemLog();
													$log->id_user = Yii::app()->user->id;
													$log->section = "Empresas";
													$log->details = "Se creo un nuevo registro";
													$log->action = "creacion";
													$log->datetime = new CDbExpression('NOW()');
													$log->save();
													echo CJSON::encode(array('status'=>'success'));
													Yii::app()->end();

													}else{
													echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro (Persona), vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
													Yii::app()->end();
												}
											}else{
												echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error interno al crear el registro (Usuarios), vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
												Yii::app()->end();
											}

										}else{
											echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'El curp o pasaporte no es correcto, vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
											Yii::app()->end();
										}

								}else{
									echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'El curp ingresado ya existe, vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
									Yii::app()->end();
								}
							}
						}
					}else{
						echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Las contraseñas no concuerdan, vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
						Yii::app()->end();
					}
				}else{
					echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Los correos no concuerdan, vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
					Yii::app()->end();
				}
				}else{
					echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ya existe el correo ingresado, vuelva a intentarlo más tarde o si persiste el error contacte al administrador.'));
					Yii::app()->end();
				}
			}

			if (!isset($_POST['ajax'])) {
				$this->render('create_user', array('model' => $model, 'modelPersons' => $modelPersons));
			}
		}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($ide) {
		$model = $this->loadModel($ide);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}

		}

		$this->render('update_user', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteUser($id) {
		$command = Yii::app()->db->createCommand();
		$users = Users::model()->findByPK($id);


		if($users->type == "fisico"){
			$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$id));
			$persons = Persons::model()->findByAttributes(array('id_user'=>$id));
			$address = Addresses::model()->findByAttributes(array('id'=>$curriculum->id_actual_address));
			$sponsorship = Sponsorship::model()->findAllByAttributes(array('id_user_researcher'=>$id));

			if($curriculum != null){

				$books = Books::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$booksChapters = BooksChapters::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$certifications = Certifications::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$congresses = Congresses::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$copyrights = Copyrights::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$grades = Grades::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$docs = DocsIdentity::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$patents = Patent::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$pressNotes = PressNotes::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$projects = Projects::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$directedThesis = DirectedThesis::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$software = Software::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$postdegreeGraduates = PostdegreeGraduates::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$researchAreas = ResearchAreas::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$knowledgeApplication = KnowledgeApplication::model()->findAllByAttributes(array('id_curriculum'=>$curriculum->id));
				$jobs = Jobs::model()->findByAttributes(array('id_curriculum'=>$curriculum->id));

				if($jobs != null)
					$jobs->delete();

				if($researchAreas != null){
					$command->delete('research_areas', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($postdegreeGraduates != null){
					$command->delete('postdegree_graduates', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($software != null){
					$command->delete('software', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($directedThesis != null){
					$command->delete('directed_thesis', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($projects != null){

					foreach ($projects as $key => $value) {
						$projectsCoworkers = ProjectsCoworkers::model()->findAllByAttributes(array('id_project'=>$projects[$key]->id));
						$projectsCommittee = ProjectsCommittee::model()->findAllByAttributes(array('id_project'=>$projects[$key]->id));
						$projectsFollowups = ProjectsFollowups::model()->findAllByAttributes(array('id_project'=>$projects[$key]->id));

						if($projectsCoworkers != null){
							$command->delete('projects_coworkers', 'id_project=:id_project', array(':id_project'=>$projects[$key]->id));
							$command = Yii::app()->db->createCommand();
						}

						if($projectsCommittee != null){
							$command->delete('projects_committee', 'id_project=:id_project', array(':id_project'=>$projects[$key]->id));
							$command = Yii::app()->db->createCommand();
						}

					 if($projectsFollowups != null){
					 	$command->delete('projects_followups', 'id_project=:id_project', array(':id_project'=>$projects[$key]->id));
					 	$command = Yii::app()->db->createCommand();
					 }
					 if($sponsorship != null){

						 foreach ($sponsorship as $key => $value) {
							 $sponsoredProjects = SponsoredProjects::model()->findByAttributes(array('id_project'=>$projects[$key]->id));

							 if($sponsoredProjects != null){
								 $command->delete('sponsored_projects', 'id=:id', array(':id'=>$sponsoredProjects->id));
								 $command = Yii::app()->db->createCommand();
							 }

						 }
						 $command->delete('sponsorship', 'id_user_sponsorer=:id_user_sponsorer', array(':id_user_sponsorer'=>$id));
						 $command = Yii::app()->db->createCommand();
					 }
					}
					$command->delete('projects', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($pressNotes != null){
					$command->delete('press_notes', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($patents != null){
					$command->delete('patent', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($docs != null){
					$command->delete('docs_identity', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($grades != null){
					$command->delete('grades', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($copyrights != null){
					$command->delete('copyrights', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($congresses != null){
					$command->delete('congresses', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($books != null){
					$booksAuthors = BooksAuthors::model()->findAllByAttributes(array('id_book'=>$books->id));
					if($booksAuthors != null){
						$command->delete('books_authors', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
						$command = Yii::app()->db->createCommand();
					}

					$command->delete('books', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($booksChapters != null){
					$command->delete('books_chapters', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				if($certifications != null){
					$command->delete('certifications', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}
				if($knowledgeApplication != null){
					$command->delete('knowledge_application', 'id_curriculum=:id_curriculum', array(':id_curriculum'=>$curriculum->id));
					$command = Yii::app()->db->createCommand();
				}

				$curriculum->delete();
			}

			if($address != null){
					$address->delete();
				}

			if($persons != null){
				$emails = Emails::model()->findAllByAttributes(array('id_person'=>$persons->id));
				$phones = Phones::model()->findAllByAttributes(array('id_person'=>$persons->id));

				if($emails != null){
					$command->delete('emails', 'id_person=:id_person', array(':id_person'=>$persons->id));
					$command = Yii::app()->db->createCommand();
				}
				if($phones != null){
					$command->delete('phones', 'id_person=:id_person', array(':id_person'=>$persons->id));
					$command = Yii::app()->db->createCommand();
				}


				$persons->delete();
			}

			$users->delete();

		}else{

			$command = Yii::app()->db->createCommand();
			$sponsorship = Sponsorship::model()->findAllByAttributes(array('id_user_sponsorer'=>$id));
			$sponsors = Sponsors::model()->findByAttributes(array('id_user'=>$id));
			$persons = Persons::model()->findByAttributes(array('id_user'=>$id));

			if($sponsors != null){
				$sponsorsContacts = SponsorsContacts::model()->findAllByAttributes(array('id_sponsor'=>$sponsors->id));
				$sponsorBilling = SponsorBilling::model()->findAllByAttributes(array('id_sponsor'=>$sponsors->id));
				$sponsorsContact = SponsorsContact::model()->findAllByAttributes(array('id_sponsor'=>$sponsors->id));
				$sponsorsDocs = SponsorsDocs::model()->findAllByAttributes(array('id_sponsor'=>$sponsors->id));

				if($sponsorsDocs != null){
					$command->delete('sponsors_docs', 'id_sponsor=:id_sponsor', array(':id_sponsor'=>$sponsors->id));
					$command = Yii::app()->db->createCommand();
				}
				if($sponsorsContact != null){
					$command->delete('sponsors_contact', 'id_sponsor=:id_sponsor', array(':id_sponsor'=>$sponsors->id));
					$command = Yii::app()->db->createCommand();
				}
				if($sponsorBilling != null){
					$command->delete('sponsor_billing', 'id_sponsor=:id_sponsor', array(':id_sponsor'=>$sponsors->id));
					$command = Yii::app()->db->createCommand();
				}
				if($sponsorsContacts != null){
					$command->delete('sponsors_contacts', 'id_sponsor=:id_sponsor', array(':id_sponsor'=>$sponsors->id));
					$command = Yii::app()->db->createCommand();
				}

				$sponsors->delete();
			}
			if($sponsorship != null){

				foreach ($sponsorship as $key => $value) {
					$sponsoredProjects = SponsoredProjects::model()->findByAttributes(array('id_sponsorship'=>$sponsorship[$key]->id));
					if($sponsoredProjects != null){
						$command->delete('sponsored_projects', 'id=:id', array(':id'=>$sponsoredProjects->id));
						$command = Yii::app()->db->createCommand();
					}

				}
				$command->delete('sponsorship', 'id_user_sponsorer=:id_user_sponsorer', array(':id_user_sponsorer'=>$id));
				$command = Yii::app()->db->createCommand();
			}

			$persons->delete();
			$users->delete();
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(array('adminUsers'));
		}

	}

	public function actionView($id) {
		$connection = Yii::app()->db;
		$query = "";
		if (Users::model()->findByPk($id)->type == "fisico") {
			$query .= "SELECT u.email,u.status,u.type,p.*,c.*,a.*,d.*,ph.*,e.*,j.*,g.*,ra.* FROM users AS u
            LEFT JOIN persons AS p ON p.id_user = u.id
            LEFT JOIN curriculum AS c ON c.id_user = u.id
            LEFT JOIN addresses AS a ON c.id_actual_address = a.id
            LEFT JOIN docs_identity AS d ON d.id_curriculum = d.id
            LEFT JOIN phones AS ph ON ph.id_person = a.id
            LEFT JOIN emails AS e ON e.id_person = a.id
            LEFT JOIN jobs AS j ON j.id_curriculum = u.id
            LEFT JOIN grades AS g ON g.id_curriculum = u.id
            LEFT JOIN research_areas AS ra ON ra.id_curriculum = c.id

            WHERE u.id=
            " . $id;
			$view = 'view_researcher';
		} else {

			$query .= "SELECT u.email,u.status,u.type,p.*,s.sponsor_name,sp.*,sc.*,sc.type as typecontact,scs.*,sd.* FROM users AS u
            LEFT JOIN persons AS p ON p.id_user = u.id
            LEFT JOIN sponsors AS s ON s.id_user = u.id
            LEFT JOIN sponsors AS sp ON sp.id_user = u.id
            LEFT JOIN sponsors_contact AS sc ON sc.id_sponsor = u.id
            LEFT JOIN sponsors_contacts AS scs ON scs.id_sponsor = u.id
            LEFT JOIN sponsors_docs AS sd ON sd.id_sponsor = u.id
            WHERE u.id=
            " . $id;
			$view = 'view_sponsors';

		}

		$command = $connection->createCommand($query);
		$model = $command->queryRow();

		$this->render($view, array(
			'model' => $model,
		));
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex() {

		$this->actionAdminUsers();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdminUsers() {
		$model = new Users('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Users'])) {
			$model->attributes = $_GET['Users'];
		}

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Users::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionChangeStatus(){
		$idRef = $_POST[1];
		$value = $_POST[2];

		if(Users::model()->updateByPk($idRef, array('status' => $value))){
			echo CJSON::encode(array('status'=>'success','message'=>'Cambio exitoso.','subMessage'=>'El estatus a sido cambiado satisfactoriamente.'));
			Yii::app()->end();
		}else{
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error al cambiar el estatus del usuario.'));
			Yii::app()->end();
		}

	}

		public function actionChangeRol(){
		$idRef = $_POST[1];
		$idRol = $_POST[2];

		if(Users::model()->updateByPk($idRef, array('id_roles' => $idRol))){
			echo CJSON::encode(array('status'=>'success','message'=>'Cambio exitoso.','subMessage'=>'El rol a sido cambiado satisfactoriamente.'));
			Yii::app()->end();
		}else{
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error al cambiar el rol del usuario.'));
			Yii::app()->end();
			}
	}

	public function actionChangeStatusCurriculum(){
		$idRefc = $_POST[1];
		$valuec = $_POST[2];

		if(Curriculum::model()->updateByPk($idRefc, array('status'=>(int)$valuec))){
			echo CJSON::encode(array('status'=>'success','message'=>'Cambio exitoso.','subMessage'=>'El estatus a sido cambiado satisfactoriamente.'));
			Yii::app()->end();
		}else{
			echo CJSON::encode(array('status'=>'failure','message'=>'Ocurrió un error.','subMessage'=>'Ha ocurrido un error al cambiar el estatus del curriculum del usuario.'));
			Yii::app()->end();
		}
	}

	public function actionDoubleSession($id){

		if((int)$id == 0){
			Yii::app()->user->setState('id',Yii::app()->user->admin);
			Yii::app()->user->setState('admin',0);
			$this->redirect(array('adminUsers/adminUsers'));
		}else{
			Yii::app()->user->setState('admin',Yii::app()->user->id);
			Yii::app()->user->setState('id',(int)$id);
			$this->redirect(array('account/infoAccount'));
		}
	}

	public function usersFullNames($data, $row) {

		$id = $data->id;
		$info = Persons::model()->findBySql("SELECT concat(last_name1,' ',last_name2,', ',names) AS names from persons WHERE id_user=".$id);
			return $info["names"];
	}
	public function usersCurpPassport($data, $row) {

		$id = $data->id;
		$info = Persons::model()->findBySql("SELECT curp_passport  from persons WHERE id_user=$id");
			return $info["curp_passport"];
	}
}
