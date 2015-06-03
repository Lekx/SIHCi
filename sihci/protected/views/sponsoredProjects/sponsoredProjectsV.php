

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$SponsoredProjectsV,
	'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(

		
		  array('header'=>'Nombre del Investigador',
		 		'name'=>'names',
                ),
		   array('header'=>'Titulo del proyecto',
		 		'name'=>'title',
                ),
		    array('header'=>'Nombre de la Disciplina',
		 		'name'=>'discipline',
                ),
   	),
)); ?>

