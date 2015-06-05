

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$SponsoredProjectsV,
	'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(

	array('header'=>'Nombre de patrocinador',
		 		'name'=>'sponsor_name',
                ),
	array('header'=>'Numero del proyecto',
		 		'name'=>'id',
		 		),
		   array('header'=>'Titulo del proyecto',
		 		'name'=>'title',
                ),
		    array('header'=>'Nombre de la Disciplina',
		 		'name'=>'discipline',
                ),
		     array('header'=>'Unidad Hospitalaria',
		 		'name'=>'develop_uh',
                ),
		      array('header'=>'Nombre del Investigador',
		 		'name'=>'fullname',
                ),
		      array('header'=>'Correo Electronico',
		 		'name'=>'email',
                ),
		      array('header'=>'Nombre del proyecto',
		 		'name'=>'project_name',
                ), 
		      array('header'=>'Fecha de inicio del proyecto',
		 		'name'=>'fecha',
                ),
   	),
)); ?>

