<?php

class ProjectsReviewController extends Controller
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
				'actions'=>array('create','update','admin','sponsoredAdmin','acceptSponsorship','rejectSponsorship','review'),
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
/*
	private function nextReview($actualStatus){
		switch($actualStatus){
			case "divuh": $status = "DIV1"; break;
			case "": $status = "DIV2"; break;
			case "": $status = "DIV3"; break;
			case "": $status = "DIV4"; break;
			case "": $status = "DIV5"; break;
			default: $status = "DIV6"; break;

		}

		return $status;
	}
*/
	private function projectsToReview(){
		$id_role = Users::model()->findByPk(Yii::app()->user->id)->id_roles;


		$role = Roles::model()->findByPk($id_role)->alias;


		$conection = Yii::app()->db;

		$pProjects = $conection->createCommand("SELECT p.is_sponsored, p.id, p.title, pf.creation_date FROM projects AS p LEFT JOIN projects_followups AS pf ON pf.id_project = p.id WHERE p.status = '".$role."' GROUP BY(p.title)")->queryAll();

		//$pProjects = Projects::model()->findAllByAttributes(array("status"=>$role));
		$pendingProjects ="";
		

		foreach($pProjects AS $key => $value){
			$element ="";
			$element .= '<div class="projectRow" style="width:97%;border:0px solid black; margin:5px;font-size:.85em;">';
			$element .= '<div class = "projectTitle" >'.$value["title"].'</div>';
			$element .= '<div class = "projectDetails" style="border-bottom:1px solid #333;font-size:.9em;">'.$value["is_sponsored"].' - '.$value["creation_date"].'</div>';
			$element .= '</div>';
			$pendingProjects .= CHtml::link($element,array('projectsReview/review','id'=>$value["id"]));
			
		}
		return $pendingProjects;
	}


	public function actionAdmin()
	{
		$model=new Projects('search');
		

		$this->render('admin',array(
			'model'=>$model, 'pendingProjects'=>$this->projectsToReview()
		));
	}

		/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

		/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionReview($id)
	{

		$modelfollowup = new ProjectsFollowups;



        // Uncomment the following line if AJAX validation is needed
         //$this->performAjaxValidation($modelfollowup);

        if(isset($_POST['ProjectsFollowups']))
        {
        	//echo "entered";
            $modelfollowup->attributes=$_POST['ProjectsFollowups'];



            $modelfollowup->id_project = $id;
            $modelfollowup->id_user = Yii::app()->user->id;

            $modelfollowup->url_doc = CUploadedFile::getInstance($modelfollowup,'url_doc');



            if($modelfollowup->validate() == 1){
            if(is_object($modelfollowup->url_doc)){ 
            	$path = YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/projects/'.$id;

	                if(!is_dir($path))
	                	mkdir($path, 0777, true);

	                	$url_doc = $path.'/'.date('Y-m-d H:i').'ArchivoComentarioPor_'.$modelfollowup->id.'.'.$modelfollowup->url_doc->getExtensionName();
	 					$modelfollowup->url_doc->saveAs($url_doc);

					    $modelfollowup->url_doc = $url_doc;    			 			   	
            }

			
            if($modelfollowup->save()){
     			echo CJSON::encode(array('status'=>'success'));
     			Yii::app()->end();
			}
               // $this->redirect(array('admin'));

        }else{
			$error = CActiveForm::validate($modelfollowup);
			unset($modelfollowup->url_doc);
			if($error!='[]')
				echo $error;
				
			Yii::app()->end();

        }
        }




		$this->render('review',array(
			'model'=>$this->loadModel($id),'pendingProjects'=>$this->projectsToReview(),'modelfollowup'=>$modelfollowup
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
