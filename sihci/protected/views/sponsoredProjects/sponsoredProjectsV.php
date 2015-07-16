
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
</section>
</section>

