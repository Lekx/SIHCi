
<section class="informativa">



	<section class="column-center2">
	  <div class="titleinfo">
     <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comites.png" alt="">
       	<h2>Protocolos patrocinados por la industria Farmacéutica</h2>
        <hr>
        </div>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$sponsoredProjectsV,
	'summaryText'=>'',
	'ajaxUpdate' => true,
	'filter' => null,
	'summaryText'=>'',
	'htmlOptions' => array('class' => 'table'),
	'columns'=>array(

	array('header'=>'Patrocinador',
		 		'name'=>'sponsor_name',
				'htmlOptions'=>array('width'=>'100'),
			 ),
		   array('header'=>'Título del proyecto',
		 		'name'=>'title',
			'htmlOptions'=>array('width'=>'40'),
                ),
		    array('header'=>'Disciplina',
		 		'name'=>'discipline',
				'htmlOptions'=>array('width'=>'40'),
                ),
		     array('header'=>'Unidad Hospitalaria',
		 		'name'=>'develop_uh',
			'htmlOptions'=>array('width'=>'40'),
                ),
		      array('header'=>'Investigador',
		 		'name'=>'fullname',
					'htmlOptions'=>array('width'=>'40'),
                ),
		      array('header'=>'Fecha de inicio del proyecto',
		 		'name'=>'fecha',
				'htmlOptions'=>array('width'=>'40'),
                ),
   	),
)); ?>
</section>
</section>
