<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de Investigadores',
);
$this->menu=array(
	//array('label'=>'Anual Total Ingreso de Investigadores', 'url'=>array('index')),
	//array('label'=>'Anual Total Baja de Investigadores', 'url'=>array('researchersLow')),
	array('label'=>'Anual Total Cantidad de Investigadores', 'url'=>array('NumberOfResearchers')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#system-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h2>
	<?php echo $titlePage ?>
</h2>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search_researchers_income',array(
	'model'=>$researchersIncome,
)); ?>
</div><!-- search-form -->

<?php 

 

 echo CHtml::dropDownList('listYear', 'listYear', $year);

 echo CHtml::link('Ingreso de Investigadores',array('tables/researchersIncome'));
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo CHtml::link('Baja de Investigadores',array('tables/researchersLow'));
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo CHtml::link('Investigadores con SNI',array('tables/NumberOfResearchersSNI'));
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo CHtml::link('Investigadores sin SNI',array('tables/NumberOfResearchersNoSNI'));


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$researchersIncome,
	 'ajaxUpdate' => true,
	'filter' => null,
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

