<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */

$this->breadcrumbs=array(
	'Projects Followups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
$project = Projects::model()->findByAttributes(array('id'=>$idProject));
?>
<script>
	$(document).ready(function(){
		$('#projects-followups-form').hide();

	});
</script>
<h1>Seguimientos del Proyecto </h1>
<h5><?php echo $project->title;?></h5>

<?php
// echo CHtml::link('Crear Nuevo','create');
			 echo CHtml::ajaxLink(
 						  "Crear Nuevo",
 						  Yii::app()->createUrl( 'projectsFollowups/create/'.$project->id ),
 						  array( // ajaxOptions
 						    'type' => 'POST',
 						    'datatype'=> 'json',
 						    'success' => "function( data )
 						                  {
 																 $('#projects-followups-form-create').show();
 																 $('#projects-followups-form').hide();
 						                     $('#follow').hide();
 						                     $('#followup').hide();
																 $('#comments').hide();
 						                  }",
 						  ),
 						  array( //htmlOptions
 						    'href' => Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
 						  )
 						);


		foreach ($followups as $key => $value) {
			echo CHtml::ajaxLink(
						  " ".date("d/m/Y", strtotime($followups[$key]->creation_date))." ",
						  Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
						  array( // ajaxOptions
						    'type' => 'POST',
						    'datatype'=> 'json',
						    'success' => "function( data )
						                  {
																$('#projects-followups-form').show();
																$('#follow').show();
																$('#followup').show();
																$('#comments').show();
						                     var data = JSON.parse(data);
																 $('#projects-followups-form-create').hide();
																 $('#projects-followups-form').show();
						                     $('#follow').html('<br><br>Reporte del Investigador <br><br>Seguimiento -'+ data['id'] + ' ' + data['date']+'<br><br>');

																 var dataIDP = data['id_project'];
						                     var dataIDF = data['id'];
																 var dataComments = data['comments'];

						                     $('#followup').html(data['followup']);

																 alert(dataComments);

						                     $('#createFollowup').unbind('onclick');
						                     $('#createFollowup').attr('onclick', 'send(\'projects-followups-form\', \'projectsReview/review\',\"'+dataIDP+'\" , \'none\', \"'+dataIDF+'\" )');
																 $('#comments').html('Comentarios:<br><br>'+dataComments);

						                  }",
						    'data' => array('id' => $followups[$key]->id,)
						  ),
						  array( //htmlOptions
						    'href' => Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
						  )
						);

		}
		echo "<div id='follow'></div>";
		echo "<div id='followup'></div>";

		$this->renderPartial('../projectsFollowups/_form', array('model'=>$modelFollowup));
		$this->renderPartial('../projectsReview/_form', array('model'=>$modelFollowup));

		echo "<div id='comments'></div>";
		echo "<br><br><br>";

?>
