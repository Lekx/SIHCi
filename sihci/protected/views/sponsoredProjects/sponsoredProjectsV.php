
<h2>Protocolos patrocinados por la industria Farmacéutica</h2>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$SponsoredProjectsV,
	'summaryText'=>'', 
	'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(

	array('header'=>'patrocinador',
		 		'name'=>'sponsor_name',
                ),
	
		   array('header'=>'Titulo del proyecto',
		 		'name'=>'title',
                ),
		    array('header'=>'Disciplina',
		 		'name'=>'discipline',
                ),
		     array('header'=>'Unidad Hospitalaria',
		 		'name'=>'develop_uh',
                ),
		      array('header'=>'Investigador',
		 		'name'=>'fullname',
                ),
		      array('header'=>'Fecha de inicio del proyecto',
		 		'name'=>'fecha',
                ),
   	),
)); ?>

