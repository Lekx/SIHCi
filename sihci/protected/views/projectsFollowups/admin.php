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

?>

<h1>Seguimiento Proyecto</h1>

<?php 
// echo CHtml::link('Crear Nuevo','create');
echo CHtml::link('Crear Nuevo',array('create',
                                         'id'=>$idProject));
	if($followupCurrent != null){
		

		foreach ($followups as $key => $value) {

			// echo " ".date("d/m/Y H:i:s", strtotime($followups[$key]->creation_date))." ";
			//ajaxlink
			echo CHtml::ajaxLink(
						  " ".date("d/m/Y", strtotime($followups[$key]->creation_date))." ",
						  Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
						  array( // ajaxOptions
						    'type' => 'POST',
						    'datatype'=> 'json',
						    'success' => "function( data )
						                  {
						                     var data = JSON.parse(data);
						                     $('#follow').html('Seguimiento -'+ data['id'] + ' ' + data['date']);
						                     $('#followup').html(data['followup']);
						                     $('#createFollowup').attr('onclick', '');

						                   
						                  }",
						    'data' => array('id' => $followups[$key]->id,)
						  ),
						  array( //htmlOptions
						    'href' => Yii::app()->createUrl( 'projectsFollowups/followupToShow' ),
						  )
						);
			
		}

		echo "<br><br>";
		echo "<br><br>";

		echo "<div id='follow'>";
		echo 'Seguimiento -'.$followupCurrent->id.'  '.date("d/m/Y", strtotime($followupCurrent->creation_date)); 
		echo "</div>";

		echo "<br><br>";

		echo 'Reporte Investigador';

		echo "<br><br>";

		echo "<div id='followup'>";
		echo $followupCurrent->followup;
		echo "</div>";

		$this->renderPartial('../projectsReview/_form', array('model'=>$modelFollowup));
		// var_dump($comment);

		echo "Comentarios:";

		echo "<br><br><br>";
		foreach ($comments as $key => $value) {
			$user = Users::model()->findByAttributes(array('id'=>$comments[$key]->id_user));
			$rol = Roles::model()->findByAttributes(array('id'=>$user->id_roles));

			echo "Comentario - ".$rol->alias." ";
			echo $comments[$key]->url_doc != null ? CHtml::link('Ver archivo', Yii::app()->baseUrl.$comments[$key]->url_doc,array("target"=>"_blank")) : "";
			
			echo "<br><br>";
			
			echo $comments[$key]->followup;

			echo "<br><br>";
			
		}
	}else
		echo "<h2>No tiene ningun Proyecto a Seguir</h2>";
?>
