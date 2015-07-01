<?php

$this->menu = array(
	array('label' => 'Datos de Cuenta', 'url' => array('account/infoAccount')),
	array('label' => 'Bitacora', 'url' => array('account/systemLog')),

	
	
);
?>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Bitacora</h1>
            <hr>
        </div>

<h3>Getionar:</h3>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'section',
		'details',
		'action',
		'datetime',

	),
)); 
?>

