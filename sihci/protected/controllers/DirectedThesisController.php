<?php

class DirectedThesisController extends Controller
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

    //TE01-Registrar datos
    public function actionCreate()
    {
        $model=new DirectedThesis;
        $model->id_curriculum = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if(isset($_POST['DirectedThesis']))
        {
            $model->attributes=$_POST['DirectedThesis'];
            $model->path = CUploadedFile::getInstanceByName('DirectedThesis[path]');
             
                 
                    if(!is_dir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/directed_thesis/'))
                            mkdir(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/directed_thesis/', 0777, true);
                         
                             
                            if($model->save()){
                                if($model->path != ''){
                                    $model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/directed_thesis/Doc_aprobatorio'.'.'.$model->path->getExtensionName());
                                    $model->path = 'sihci/sihci/users/'.Yii::app()->user->id.'/directed_thesis/Doc_aprobatorio'.'.'.$model->path->getExtensionName();  
                                
                               }
                                echo CJSON::encode(array('status'=>'success'));
                                Yii::app()->end();

                                }else{
                                    $error = CActiveForm::validate($model);
                                    if($error!='[]')
                                         echo $error;
                                        Yii::app()->end();
                                }

                   
             }

                    $this->render('create',array('model'=>$model));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    
    //TE02-Modificar datos
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model); 

        if(isset($_POST['DirectedThesis']))
        {

            $model->attributes=$_POST['DirectedThesis'];
            $model->path = CUploadedFile::getInstanceByName('DirectedThesis[path]');

            if($model->path != ''){
                
                $model->path->saveAs(YiiBase::getPathOfAlias("webroot").'/users/'.Yii::app()->user->id.'/directed_thesis/Doc_aprobatorio'.'.'.$model->path->getExtensionName());
               $model->path = 'sihci/sihci/users/'.Yii::app()->user->id.'/directed_thesis/Doc_aprobatorio'.'.'.$model->path->getExtensionName(); 
                
                if($model->save()){
                                echo CJSON::encode(array('status'=>'success'));
                                Yii::app()->end();

                            }else{
                                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                    Yii::app()->end();
                                }
            }else{

                  //$model->path = 'sihci/sihci/users/'.Yii::app()->user->id.'/directed_thesis/Doc_aprobatorio'.'.'.$model->path->getExtensionName();
                if($model->save()){
                                echo CJSON::encode(array('status'=>'success'));
                                Yii::app()->end();

                            }else{
                                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                    Yii::app()->end();
                                }
           }
              
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
    //TE03-Eliminar datos
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

    //TE04-Eliminar datos
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('DirectedThesis');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */

    //TE05-Listar registros
    public function actionAdmin()
    {
        $model=new DirectedThesis('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['DirectedThesis']))
            $model->attributes=$_GET['DirectedThesis'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    public function actionSearch()
    {
        $model=new Peticiones('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['DirectedThesis']))
            $model->attributes=$_GET['DirectedThesis'];

        $this->render('search',array(
            'model'=>$model,
        ));
    }

  
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DirectedThesis the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=DirectedThesis::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DirectedThesis $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='directed-thesis-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
