

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$cveHcPublics,
	'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(

		 /*array('header'=>'Número de Registro',
		 		'name'=>'id',
                ),*/
		  array('header'=>'Nombre del Investigador',
		 		'name'=>'fullname',
                ),
		   array('header'=>'Línea de Investigación',
		 		'name'=>'name',
                ),
		    array('header'=>'Unidad Hospitalaria',
		 		'name'=>'hospital_unit',
                ),
   	),
)); ?>

