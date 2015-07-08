<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
$this->menu=array(
    //array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
    //array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
    array('label'=>'Manejador de Archivos ', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
        array('label'=>'Gestionar', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'sub1')),
        array('label'=>'Crear', 'url'=>array('postdegreeGraduates/create'),'itemOptions'=>array('class' => 'sub1')),

//postdegreeGraduates
    array('label'=>'Gestión de usuarios ', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'menuitem 2 now')),
        array('label'=>'Gestionar', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'sub')),
        array('label'=>'Crear', 'url'=>array('AdminUsers/CreateUser'),'itemOptions'=>array('class' => 'sub')),
//knowledgeApplication
    array('label'=>'Gestión de proyectos', 'url'=>array('adminProjects/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
        array('label'=>'Gestionar', 'url'=>array('adminProjects/admin'),'itemOptions'=>array('class' => 'sub3')),
        array('label'=>'Crear', 'url'=>array('adminProjects/create'),'itemOptions'=>array('class' => 'sub3')),
//patent
    array('label'=>'Respaldos', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
//copyrights
    array('label'=>'Áreas de especialidad', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'menuitem 5')),
            array('label'=>'Gestionar', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'sub5')),
            array('label'=>'Crear', 'url'=>array('adminSpecialtyAreas/create'),'itemOptions'=>array('class' => 'sub5')),
//copyrights
    array('label'=>'Lineas de investigación', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'menuitem 6')),
            array('label'=>'Gestionar', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'sub6')),
            array('label'=>'Crear', 'url'=>array('adminResearchAreas/create'),'itemOptions'=>array('class' => 'sub6')),
//articlesGuides

    //array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

    );


?>

    <div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Gestión de usuarios</h1>
            <hr>
        </div>

<h4>Crear usuario:</h4>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'users-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => true,
  	'htmlOptions' => array('enctype' => 'multipart/form-data'),
  	'enableClientValidation' => true,
)); ?>


    <?php Yii::app()->bootstrap->register(); ?>


    <div class="row">
        <?php echo $form->textField($model,'email',array('placeholder'=>"Email",'title'=>'Email')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
         <input type="text" name="Users[email2]" id="Users_email2" placeholder="Verificacion de Email" title="Verificacion de Email" ></input>
    </div>


    <div class="row">
        <?php echo $form->passwordField($model,'password',array('placeholder'=>"Contraseña",'title'=>'Contraseña Minimo 6 maximo 15 caracteres','maxlength'=>15)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <input type="password" name="Users[password2]" id="Users_password2" placeholder="Verificacion de Contraseña" title="Verificacion de Contraseña" maxlength="15"></input>
    </div>



    <div class="row">
    <span class="plain-select">
              <?php $this->widget('ext.CountrySelectorWidget', array(

        'value' =>  'Persons_country',
        'name' => 'Persons[country]',
        'id' =>  'Persons_country',
        'useCountryCode' => false,
        'defaultValue' => 'Mexico',
        'firstEmpty' => true,
        'firstText' => 'Pais',

        )); ?>
        </span>
    </div>

    <div class="row">
        <?php echo $form->textField($modelPersons,'names',array('placeholder'=>"Nombre/s completos.", 'title'=>'Nombre/s completos','onKeypress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelPersons,'names'); ?>
    </div>

    <div class="row">
        <?php echo $form->textField($modelPersons,'last_name1',array('placeholder'=>"Apellido Paterno",'title'=>'Apellido Paterno','onKeypress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelPersons,'last_name1'); ?>
    </div>

    <div class="row">
        <?php echo $form->textField($modelPersons,'last_name2',array('placeholder'=>"Apelido Materno",'title'=>'Apellido Materno','onKeypress'=>'return lettersOnly(event)')); ?>
        <?php echo $form->error($modelPersons,'last_name2'); ?>
    </div>

    <div class="row">
        <?php echo $form->textField($modelPersons,'curp_passport',array('placeholder'=>"Pasaporte/Curp",'title'=>'Pasaporte/Curp')); ?>
        <?php echo $form->error($modelPersons,'curp_passport'); ?>
    </div>

    <div class="row buttons">
      <?php echo CHtml::htmlButton('Enviar',array(
                  'onclick'=>'send("users-form", "AdminUsers", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
                  'class'=>'savebutton',
              ));
      ?>
      <?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>

      </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
