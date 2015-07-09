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
)); 
if(in_array(Yii::app()->user->Rol->alias, explode(",",$model->status))){

	$rejectRol = Yii::app()->user->Rol->alias;
	//echo substr(Yii::app()->user->Rol->alias,1,3);
	if(Yii::app()->user->Rol->alias == "SEUH" || substr(Yii::app()->user->Rol->alias,0,3) == "COM"){


		echo CHtml::htmlButton('Rechazar',array(
			'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "reject'.Yii::app()->user->Rol->alias.'");',
			'class'=>'savebutton',
		));
	}

	echo " ".CHtml::htmlButton('Aprobar',array(
            'onclick'=>'javascript: send("","projectsReview/sendReview", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "projectsReview/review'.(isset($_GET['id']) ? "/".$_GET['id'] : "").'", "'.Yii::app()->user->Rol->alias.'");',
            'class'=>'savebutton',
        ));
?>
<div class="row">
<?php $this->renderPartial('../projectsReview/_form', array('model'=>$modelfollowup)); ?>
</div>
<?php
}
?>
<div class="row">
<?php

foreach($followups AS $key => $value){
	//print_r($value);
	$user = Users::model()->findByPk($value->id_user);
	//var_dump();
	echo '<p>'.$user->persons[0]->names.' '.$user->persons[0]->last_name1.' '.$user->persons[0]->last_name2.' ('.$user->email.') escribió: <br>';
	echo $value['followup'].'<br>';
	echo '<small>Creado el '.$value['creation_date'].' '.(empty($value['url_doc']) ? "" : "<a href=../../".$value['url_doc'].">Ver archivo disponible</a>" ).'</small><hr></p>';
	
}
?>
</div>