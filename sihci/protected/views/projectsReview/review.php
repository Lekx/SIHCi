
<script type="text/javascript">
	$(document).ready(function(){

		$("#projectsMenu").appendTo($(".sysmenu"));

	});

</script>


<div id="projectsMenu">
	<?php echo $pendingProjects; ?>
</div>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Revisión de proyecto.</h3>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'title',
		'discipline',
		'research_type',
		'priority_topic',
		'sub_topic',
		'justify',
		'is_sni',
		'develop_uh',
		'institution_colaboration',
		'national_institutions',
		'participant_institutions',
		'international_institutions_',
		'participant_institutions_international',
		'colaboration_type',
		'adtl_caracteristics_a',
		'adtl_caracteristics_b',
		'adtl_caracteristics_c',
		'adtl_caracteristics_d',
		'adtl_caracteristics_e',
		'adtl_caracteristics_f',
		'adtl_caracteristics_g',
		'status',
		'folio',
		'is_sponsored',
		'registration_number',
	),
)); ?>


<?php $this->renderPartial('_form', array('model'=>$modelfollowup)); ?>
