<script type="text/javascript">
	$(document).ready(function(){
		//alert($("#projectsMenu").text());
		$("#projectsMenu").appendTo($(".sysmenu"));

	});

</script>




<div id="projectsMenu">
	<?php echo $pendingProjects; ?>
</div>

<?php
/* @var $this ProjectsController */
/* @var $model Projects */


<<<<<<< HEAD

=======
>>>>>>> ae089f6f7322ab820cdf70fe395bafa378ac5502

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");



?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestión de proyectos</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'id_curriculum',
		array(
			'name'=>'is_sponsored',
			'type'=>'html','id'=>'is_sponsored','value'=>'CHtml::encode($data->is_sponsored)',
			'value'=>'$data->is_sponsored == "1" ? "<img src=\'".Yii::app()->request->baseUrl."/img/Acciones/patrocinio.svg\' class=\'sponsorTag\' title=\'Proyecto patrocinado\'>" : "<img src=\'".Yii::app()->request->baseUrl."/img/Acciones/patrocinio2.svg\' class=\'sponsorTag\' title=\'Proyecto no patrocinado\'>"','htmlOptions'=>array('style' => 'width: 30px;')

		),
		array('name'=>'Título','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),

		//'title',
		array(
			'name'=>'discipline',
			'type'=>'html','id'=>'discipline','value'=>'CHtml::encode($data->discipline)',
			'value'=>'$data->discipline == "-1" ? "" : $data->discipline',

			),
		/*array(
			'name'=>'research_type',
			'value'=>'$data->research_type == "-1" ? "" : $data->research_type',
			),
		array(
			'name'=>'priority_topic',
			'value'=>'$data->priority_topic == "-1" ? "" : $data->priority_topic',
			),*/
		array(
			'name'=>'develop_uh',
			'type'=>'html','id'=>'develop_uh','value'=>'CHtml::encode($data->develop_uh)',
			'value'=>'$data->develop_uh == "-1" ? "" : $data->develop_uh',

			),

		array(
			'name'=>'folio',
			'type'=>'html','id'=>'folio','value'=>'CHtml::encode($data->folio)',
			'value'=>'$data->folio == "-1" ? "" : $data->folio',

			),

		array(
			'name'=>'registration_number',
			'type'=>'html','id'=>'registration_number','value'=>'CHtml::encode($data->registration_number)',
			'value'=>'$data->registration_number == "-1" ? "" : $data->registration_number',
			),
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)'),
			//'status',

		/*
		'sub_topic',
		'justify',
		'is_sni',

		'institution_colaboration',
		'national_institutions',
		'participant_institutions',
		'international_institutions_',
		'participant_institutions_international',
		'colaboration_type',
		'has_adtl_caracteristics_a',
		'adtl_caracteristics_a',
		'has_adtl_caracteristics_b',
		'adtl_caracteristics_b',
		'has_adtl_caracteristics_c',
		'adtl_caracteristics_c',
		'has_adtl_caracteristics_d',
		'adtl_caracteristics_d',
		'has_adtl_caracteristics_e',
		'adtl_caracteristics_e',
		'has_adtl_caracteristics_f',
		'adtl_caracteristics_f',
		'has_adtl_caracteristics_g',
		'adtl_caracteristics_g',

		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
