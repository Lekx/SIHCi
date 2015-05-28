<style>
	canvas{
		width: 100% !important;
		height: auto !important;
	}
</style>
<?php 

$this->menu=array(
	array('label'=>'Total ingreso y egreso de investigadores', 'url'=>array('Charts/totalRegisteredResearchesIo')),
	array('label'=>'Cantidad de Investigadores', 'url'=>array('Charts/numberofResearchers')),

);

require_once($action.".php");


 ?>
