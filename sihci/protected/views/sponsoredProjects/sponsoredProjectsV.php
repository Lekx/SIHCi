

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$SponsoredProjectsV,
	'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(

		
		  /*array('header'=>'Nombre del Investigador',
		 		'name'=>'title',
                ),*/
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
   	),
)); ?>

