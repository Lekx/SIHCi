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
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
      <h1>Seguimientos del Proyecto </h1>
            <hr>
        </div>



<div class="projecttitle">
<h4><?php echo $project->title;?></h4>
</div>


<?php
// echo CHtml::link('Crear Nuevo','create');
			 echo CHtml::ajaxLink(
 						  "jesus de nazareth",
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
								'class'=> 'createFollowup',
 						  )
 						);

		echo "	<div class='customNavigation'>
	  <a class='btn prev'><i class='fa fa-arrow-left'></i></a> </div>";
		echo "<div id='owl-demo' class=''>";
		foreach ($followups as $key => $value) {
			echo CHtml::ajaxLink(
						  "".date("d/m/Y", strtotime($followups[$key]->creation_date))." ",
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
						                     $('#follow').html('<h5 class=followuph5>Seguimiento -'+ data['id'] + ' ' + data['date']+'</h5>');

																 var dataIDP = data['id_project'];
						                     var dataIDF = data['id'];
																 var dataComments = data['comments'];

						                     $('#followup').html('<h4>Reporte Investigador</h4>'+data['followup']);


						                     $('#createFollowup').unbind('onclick');
						                     $('#createFollowup').attr('onclick', 'send(\'projects-followups-form\', \'projectsReview/review\',\"'+dataIDP+'\" , \'none\', \"'+dataIDF+'\" )');
																 $('#comments').html('<h3>Comentarios:</h3>'+dataComments+'');

						                  }",
						    'data' => array('id' => $followups[$key]->id,)
						  ),
						  array( //htmlOptions
						    'href' => Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
								'class'=> 'item Followups '.$key,
								)
						);

		}
		echo "</div>";
		echo "	<div class='customNavigation'>
		<a class='btn next'><i class='fa fa-arrow-right'></i></a> </div>";
		echo "<div id='owl-demo' class=''>";
		echo "<div id='follow'></div>";
		echo "<div id='followup'></div>";
		?>

		<?php

		$this->renderPartial('../projectsFollowups/_form', array('model'=>$modelFollowup));
		$this->renderPartial('../projectsReview/_form', array('model'=>$modelFollowup));

		echo "<div id='comments'></div>";
		echo "<br>";

?>