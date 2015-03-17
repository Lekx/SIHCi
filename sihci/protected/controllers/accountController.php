<?php 
  	class accountController extends controller{


	public $layout='//layouts/informativas';

	public function actionInfoAccount(){
		
			$details = Users::model()->findByPk(Yii::app()->user->id);
			$this->render('InfoAccount',array(
			'details'=>$details,
			));
	}


	public function actionUpdate(){

		$details = Users::model()->findByPk(Yii::app()->user->id);
		if(isset($_POST['Users']))
		{
			$details->attributes=$_POST['Users'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->renderPartial('_updateEmail',array(
			'details'=>$details,
		));



	}
		
	







  	}

	



?>
