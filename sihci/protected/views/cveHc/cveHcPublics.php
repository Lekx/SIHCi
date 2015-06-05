

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
		   /*array('header'=>'Nombre del Investigador',
		 		'value'=>array($this,'usersFullNames'),'type' => 'raw',
                ),*/
		   array('header'=>'Línea de Investigación',
		   		'value'=>array($this,'researchAreas'),'type' => 'raw',
                ),
		    array('header'=>'Unidad Hospitalaria',
		 		'name'=>'hospital_unit',
                ),
   	),
)); ?>

