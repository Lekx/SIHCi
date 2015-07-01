<?php
Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script>
var flag=0;
$(document).ready(function (){

/*
if($('#directed-thesis-grid').not(':visible'))
	$("#directed-thesis-grid").show();
else
	$("#directed-thesis-grid").hide();


*/

/*
if(flag!=1)
	$("#directed-thesis-grid").hide();
else
	$("#directed-thesis-grid").show();


$("input[name='yt0']").click(function(){
	flag=1;
		$("#directed-thesis-grid").show();
		alert("entre");

});

*/
});
</script>

<?
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#directed-thesis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});

	return false;
});
");
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<fieldset>
      <legend>Buscar</legend>
       
       
		<?php echo $form->textField($model,'title',array('placeholder'=>'Nombre de la tesis')); ?>
		<input type="hidden" value="t" name="bus" id="bus">
       <?php echo CHtml::submitButton('Buscar');?>   
	</fieldset>


<?php $this->endWidget(); ?>

</div><!-- search-form -->

<div style="display:<?php echo isset($_GET["bus"]) ? 'block' : 'none' ;?>;">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peticiones-grid',
	'ajaxUpdate' => true,
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	//'summaryText'=>"Mostrando {end} de {count}",
	'columns'=>array(
				'id',

		array('id'=>'id','header'=>'title','value'=>'$data->id["title"]." ".$data->id["author"]."',
			),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>