<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */

$this->breadcrumbs=array(
	'Files Managers'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#files-manager-grid').yiiGridView('update', {
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
            <h1>Manejador de Archivos</h1>
            <hr>
        </div>

       <h4 style="margin-left:105px">Gestionar</h4>
		<input type="text" id="search" onchange="search()" placeholder="Buscar.." class="searchadmin">
		<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>
       	<?php echo CHtml::link('Crear',array('FilesManager/create'),array('class'=>'admin_create')); ?>
       	<br>
       	<br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'files-manager-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		'section',
		'file_name',
		//'path',
		'start_date',
		'end_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
