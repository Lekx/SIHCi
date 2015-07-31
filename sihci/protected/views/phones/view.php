<?php
/* @var $this PhonesController */
/* @var $model Phones */



$this->menu=array(
	array('label'=>'List Phones', 'url'=>array('index')),
	array('label'=>'Create Phones', 'url'=>array('create')),
	array('label'=>'Update Phones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Phones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?')),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1>View Phones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_person',
		array(
			'name'=>'email',
			'value'=>Emails::model()->findByAttributes(array('id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id))->email,
			),
		array(
			'name'=>'tipo email',
			'value'=>Emails::model()->findByAttributes(array('id_person'=>Persons::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id))->type,
			),
		'type',
		'country_code',
		'local_area_code',
		'phone_number',
		'extension',
		'is_primary',
	),
)); ?>
