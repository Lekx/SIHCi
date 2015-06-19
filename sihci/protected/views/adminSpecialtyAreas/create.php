<?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl. '/js/admin.js');
?>
<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */


$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión Areas de especialidad</h1>
            <hr>
        </div>

<h3>Crear registro de area:</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'modelSpecialtyAreas'=>$modelSpecialtyAreas)); ?>