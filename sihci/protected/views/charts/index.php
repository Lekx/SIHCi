
<?php 
$this->menu=array(
	array('label'=>'Investigadores registrados en el sistema', 'url'=>array('Charts/totalRegisteredResearchers')),
	array('label'=>'Total de proyectos registrados', 'url'=>array('Charts/projectsTotal')),
	array('label'=>'Total de libros registrados', 'url'=>array('Charts/booksTotal')),
	array('label'=>'Total de capítulos de libros registrados', 'url'=>array('Charts/chaptersTotal')),
	array('label'=>'Total de articulos y guías registrados', 'url'=>array('Charts/articlesGuides_')),
);
require_once($action.".php");
 ?>