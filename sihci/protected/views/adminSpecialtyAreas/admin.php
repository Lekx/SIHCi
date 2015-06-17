<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */

//AE05-Desplegar datos

$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-specialty-areas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");


?>

<?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl. '/js/admin.js');
?>
<div class="admintitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión de Áreas de especialidad</h1>
            <hr>
        </div>



<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-specialty-areas-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		array('name' =>'Especialidad', 'type'=>'html','id'=>'specialty','value'=>'CHtml::encode($data->specialty)'),
		array('name' =>'Subespecialidad', 'type'=>'html','id'=>'subspecialty','value'=>'CHtml::encode($data->subspecialty)'),

		array('class'=>'CButtonColumn'),
	),
)); ?>