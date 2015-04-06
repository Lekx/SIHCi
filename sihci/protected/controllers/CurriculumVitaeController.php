<?php

class CurriculumVitaeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/layoutDatesPersons';
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

	public function actionPersonalData(){
		$Exist = Sponsors::model()->findByAttributes(array('id_user' => Yii::app()->user->id));
		$model=new Persons;
		$curriculum = new Curriculum;
	//	$this->performAjaxValidation($model);

		 //obtiene el id del usuario

		// if($person=Persons::model()->find('id_user=:id_user',array(':id_user'=>Yii::app()->user->id))){
		// 	  $this->redirect(array('update','id'=>$person->id));
		// 	}else{
					if(isset($_POST['Persons']))
					{
						$model->attributes=$_POST['Persons'];
						$model->id_user = Yii::app()->user->id;
						$model->photo_url = CUploadedFile::getInstanceByName('Persons[photo_url]');
					
						if ($model->validate()) {
							
							if($model->photo_url != ''){
								mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/', 0777, true);
								$model->photo_url->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png');
								$model->photo_url = YiiBase::getPathOfAlias("webroot").'/users/'.$model->id_user.'/cve-hc/perfil.png';
							
									if(isset($_POST['Curriculum']))
										{
											$curriculum->attributes = $_POST['Curriculum'];
																					
											$curriculum->id_user = Yii::app()->user->id;
											$curriculum->id_actual_address = 1;
											if($curriculum->validate())
												{	
													$model->save();
													$curriculum->save();
													$this->redirect(array('view','id'=>$model->id));
													//<?php echo CHtml::link('Link Text',array('controller/action'));
												}
											
										}			   		
							}else{
								mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/cve-hc/', 0777, true);
								if(isset($_POST['Curriculum']))
										{
											$curriculum->attributes = $_POST['Curriculum'];
																					
											$curriculum->id_user = Yii::app()->user->id;
											$curriculum->id_actual_address = 1;
											if($curriculum->validate())
												{
													$model->save();
													$curriculum->save();
													$this->redirect(array('view','id'=>$model->id));
												}
											
										}
							}

						}//end if validate
					}
					$this->render('personalData',array('model'=>$model, 'curriculum'=>$curriculum));
	//	}//valida si el usuario ya existe entra a Actualizar
	
	}




}
