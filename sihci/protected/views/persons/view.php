<?php
/* @var $this PersonsController */
/* @var $model Persons */


$this->menu=array(
	array('label'=>'List Persons', 'url'=>array('index')),
	array('label'=>'Create Persons', 'url'=>array('create')),
	array('label'=>'Update Persons', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Persons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?')),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h1>View Persons #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
			array(
			'name'=>'status',
			'value'=>Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->status,
			),
		'names',
		'last_name1',
		'last_name2',
		'marital_status',
		'genre',
		'birth_date',
		'country',
		array(
			'name'=>'native_country',
			'value'=>Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->native_country,
			),
		'state_of_birth',
		'curp_passport',
		array(
			'label'=>'Foto de Perfil',
			'type'=>'raw',
			'value'=>CHtml::image(Yii::app()->baseUrl.'/users/'.Yii::app()->user->id.'/cve-hc/perfil.png'),
			),
		'person_rfc',


	),
)); ?>
