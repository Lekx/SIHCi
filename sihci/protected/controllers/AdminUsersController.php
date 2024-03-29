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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	function checkEmail($email, $email2) {

		if ($email != $email2) {
			echo "email";
			return false;
		} else {
			return true;
		}
	}
	function checkPassword($password, $password2) {
		if ($password != $password2) {
			echo "pass";
			return false;
		} else {
			return true;
		}
	}
	public function actionCreateUser() {

		$model = new Users;
		$modelPersons = new Persons;

		if (isset($_POST['Users'])) {
			$model->id_roles = '1';
			$model->attributes = $_POST['Users'];

			$result = $model->findAll(array('condition' => 'email="' . $model->email . '"'));
			if (empty($result)) {
				if ($this->checkEmail($_POST['Users']['email'], $_POST['Users']['email2'])) {
					if ($this->checkPassword($_POST['Users']['password'], $_POST['Users']['password2'])) {

						$model->registration_date = new CDbExpression('NOW()');
						$model->activation_date = new CDbExpression('0000-00-00');

						$model->status = 'activo';

						$model->status = 'inactivo';

						$model->act_react_key = sha1(md5(sha1(date('d/m/y H:i:s') . $model->email . rand(1000, 5000))));
						$model->password = sha1(md5(sha1($model->password)));

						if ($model->validate()) {

							if (isset($_POST['Persons'])) {

								$modelPersons->attributes = $_POST['Persons'];
								$modelPersons->person_rfc = "1234567890123";

								$result2 = $modelPersons->findAll(array('condition' => 'curp_passport="' . $modelPersons->curp_passport . '"'));
								if (empty($result2)) {

									$modelPersons->id_user = 0;
									$modelPersons->marital_status = -1;
									$modelPersons->genre = -1;
									$modelPersons->birth_date = '0000-00-00';

									if ($modelPersons->validate()) {
										if ($model->save()) {
											$modelPersons->id_user = $model->id;
											if ($modelPersons->save()) {
												echo "202";
											} else {
												echo "Ha ocurrido un error al crear el registro (CU03)";
											}

										} else {
											echo "Ha ocurrido un error al crear el registro (CU02)";
										}

										$log = new SystemLog();
										$log->id_user = Yii::app()->user->id;
										$log->section = "Empresas";
										$log->details = "Se creo un nuevo registro";
										$log->action = "creacion";
										$log->datetime = new CDbExpression('NOW()');
										$log->save();

									} else {
										echo "Ha ocurrido un error al crear el registro (CU01)";
									}

								} else {
									echo "Ya hay una cuenta registrada con este CURP.";
								}

							}
						}
					} else {
						echo "Las contraseñas no concuerdan";
					}

				} else {
					echo "Los correos electronicos no concuerdan";
				}

			} else {
				echo "Ya existe una cuenta registrada con este correo.";
			}

		}

		if (!isset($_POST['ajax'])) {
			$this->renderPartial('create_user', array('model' => $model, 'modelPersons' => $modelPersons));
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

		$users = Users::model()->findByPK($id);
		

		if($users->type == "fisico"){
			$curriculum = Curriculum::model()->findByAttributes(array('id_user'=>$id));
			$persons = Persons::model()->findByAttributes(array('id_user'=>$id));
			$address = Addresses::model()->findByAttributes(array('id'=>$curriculum->id_actual_address));
			$command = Yii::app()->db->createCommand();

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
				
				$curriculum->delete();
			}
			
			if($address != null)
					$address->delete();

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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('adminUsers'));
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
		$idRef = $_POST["id"];
		$value = $_POST["value"];

		if(Users::model()->updateByPk($idRef, array('status' => $value)))
			echo "Actualizacion realizada con exito.";
		else
			echo "Error al actualizar el estado del usuario.";
	}

	public function actionChangeStatusCurriculum(){
		$idRefc = $_POST["idc"];
		$valuec = $_POST["valuec"];

		if(Curriculum::model()->updateByPk($idRefc, array('status' => $valuec)))
			echo "Actualizacion realizada con exito.";
		else
			echo "Error al actualizar el estado del usuario.";
	}

	public function actionDoubleSession($id){

		if((int)$id == 0){
			Yii::app()->user->setState('id',Yii::app()->user->admin);
			Yii::app()->user->setState('admin',0);	
			//echo "vamos a salir";
			$this->redirect(array('adminUsers/adminUsers'));
		}else{
			Yii::app()->user->setState('admin',Yii::app()->user->id);
			Yii::app()->user->setState('id',(int)$id);
			//echo "vamos a entrar";
			$this->redirect(array('account/infoAccount'));
		}
		//echo $id;
		//$this->redirect(array('Account/InfoAccount'));
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
