<?php
class UsersController extends Controller
{
	function checkEmail($email, $email2){
		 
    
    	if ($email != $email2){
		echo "<script> alert(\"Las dos correos son distintos.\")</script>";
		return false;
      } 
      else{
      	return true;
      }
} 
	function checkPassword($password, $password2){
		if ($password != $password2){
		echo "<script> alert(\"Las dos claves son distintas.\")</script>";
		return false;
            } 
      else{
      	return true;
      }
} 
	
	public $layout='//layouts/column2';
	
	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
		);
	}
	
	
 
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCreate()
	{
		$this->layout = 'informativas';
		$model=new Users;
		$modelPersons = new Persons;
		
		if(isset($_POST['Users']))
		{
			$model->id_roles = '1';
			$model->attributes=$_POST['Users'];
			$result = $model->findAll(array('condition'=>'email="'.$model->email.'"'));
			if($this->checkEmail($_POST['Users']['email'], $_POST['Users']['email2']))
			if($this->checkPassword($_POST['Users']['password'], $_POST['Users']['password2']))
			if (!empty($result)){
					echo "<script> alert(\"Este correo ya existe.\")</script>";
      		}else{
			$model->registration_date = new CDbExpression('NOW()');
			$model->activation_date = new CDbExpression('0000-00-00');
			$model->status = 0;
			$model->act_react_key = sha1(md5(sha1(date('d/m/y H:i:s').$model->email.rand(1000, 5000))));
  				//if($model->validate())
					$model->password = sha1(md5($model->password));
					//$model->attributes=$_POST['Users'];
					
			if($model->validate())  
			if(isset($_POST['Persons']))
			{
				$modelPersons->attributes = $_POST['Persons'];
				$modelPersons->person_rfc="1234567890123";
				$result2 = $modelPersons->findAll(array('condition'=>'curp_passport="'.$modelPersons->curp_passport.'"'));
				if (!empty($result2)){
					echo "<script> alert(\"Este RFC/Pasaporte ya existe.\")</script>";
					
      			}else{
				
				$modelPersons->id_user = 0;
				$modelPersons->marital_status = -1;
				$modelPersons->genre = -1;
				$modelPersons->birth_date = '00/00/0000';
					if($modelPersons->validate()){
						$model->save();
						$modelPersons->id_user = $model->id;
						$modelPersons->save();

							$log = new SystemLog();
							$log->id_user = Yii::app()->user->id;
							$log->section = "Empresas";
							$log->details = "Se creo un nuevo registro";
							$log->action = "creacion";
							$log->datetime = new CDbExpression('NOW()');
							$log->save();
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
			
			
			} 
	}
		$this->render('create',array(
			'model'=>$model,'modelPersons'=>$modelPersons
		));
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];
		$this->render('admin',array( 
			'model'=>$model,
		));
	}
	
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}