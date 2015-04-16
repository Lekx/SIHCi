
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_user',
		'section',
		'details',
		'action',
		'datetime',

	),
)); 

	$idlog = Yii::app()->user->id;
	$rawData=Yii::app()->db->createCommand('SELECT id_user FROM system_log WHERE id_user = 1 ')->queryAll();

	$dataProvider=new CArrayDataProvider($rawData, array(
	    'id'=>'users-grid',
	    'sort'=>array(
	        'attributes'=>array(
	             'id_user', 'action', 'datetime',
	        ),
	    ),
	    'pagination'=>array(
	        'pageSize'=>10,
	    ),
	));

?>

