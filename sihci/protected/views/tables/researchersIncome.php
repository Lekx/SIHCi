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
		'id',
		'names',
		'name',
		'hospital_unit',
		'SNI',
   	),
)); ?>

