<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de Investigadores',
);

?>

<h2>
	Total Ingreso de Investigadores
</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$researchersIncome,
	'columns'=>array(
		 array('header'=>'Numero de Usuario',
		 		'name'=>'id',
                ),
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		   array('header'=>'Línea de Investigación',
		 		'name'=>'name',
                ),
		    array('header'=>'Undad Hospitalaria',
		 		'name'=>'hospital_unit',
                ),
		     array('header'=>'Sistema NI',
		 		'name'=>'SNI',
                ),

   	),
)); ?>

