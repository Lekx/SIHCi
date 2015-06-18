
<?php 
$this->menu=array(
	array('label'=>'Investigadores Registrados en el Sistema', 'url'=>array('Charts/totalRegisteredResearchers')),
	array('label'=>'Total de Proyectos Registrados', 'url'=>array('Charts/projectsTotal')),
	array('label'=>'Total de libros Registrados', 'url'=>array('Charts/booksTotal')),
	array('label'=>'Total de Capitulos de libros Registrados', 'url'=>array('Charts/chaptersTotal')),
	array('label'=>'Total de Articulos y Guías Registrados', 'url'=>array('Charts/articlesGuides_')),
);
require_once($action.".php");
 ?>