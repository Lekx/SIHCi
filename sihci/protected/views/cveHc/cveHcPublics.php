
<section class="informativa">


	<section class="column-center2">
	  <div class="titleinfo">
     <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Comites.png" alt="">
       	<h2>CVE-HC</h2>
        <hr>
        </div>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'cveHcPublics',
	'dataProvider'=>$cveHcPublics,
	'summaryText'=>'', 
	'ajaxUpdate' => true,
	'summaryText'=>'',
	'filter' => null,
	'htmlOptions'=> array('class'=>'hometable'),
	'columns'=>array(

		 /*array('header'=>'Número de Registro',
		 		'name'=>'id',
                ),*/
		  array('header'=>'Nombre del Investigador',
		 		'name'=>'fullname',
				'htmlOptions'=>array('width'=>'40px'),
                ),
		   /*array('header'=>'Nombre del Investigador',
		 		'value'=>array($this,'usersFullNames'),'type' => 'raw',
                ),*/
		   array('header'=>'Línea de Investigación',
		   		'value'=>array($this,'researchAreas'),'type' => 'raw',
				 'htmlOptions'=>array('width'=>'40px'),
                ),
		    array('header'=>'Unidad Hospitalaria',
		 		'name'=>'hospital_unit',
				'htmlOptions'=>array('width'=>'40px'),
				'headerHtmlOptions'=>array('width'=>'30')
                ),
   	),
)); ?>
</section>

</section>