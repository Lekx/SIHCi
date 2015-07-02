<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Sponsorships'=>array('index'),
	'Manage',
);
?>
	<div class="cvtitle">
        <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
        <h1>Proyectos</h1>
        <hr>
    </div>
<?php if($checkAuth){ ?>
<?php
$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Patrocinios', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('sponsorship/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'sub')),


	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
	);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sponsorship-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<h3>Gestionar Patrocinios.</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'sponsorship-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
		array(
			'name'=>'id_user_researcher',
			'value'=>'$data->idUserResearcher->persons[0]["last_name1"]." ".$data->idUserResearcher->persons[0]["last_name2"].", ".$data->idUserResearcher->persons[0]["names"]',
			),
		array('name'=>'Nombre del proyecto','type'=>'html','id'=>'project_name','value'=>'CHtml::encode($data->project_name)'),
		//'project_name',
		array('name'=>'Descripción','type'=>'html','id'=>'description','value'=>'CHtml::encode($data->description)'),
		//'description',
		array('name'=>'Palabras clave','type'=>'html','id'=>'keywords','value'=>'CHtml::encode($data->keywords)'),
		//'keywords',
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)'),
		//'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
}else{
?>


<br><br>
<h3>Por favor llene primero su perfil de empresa para poder crear patrocinios.</h3>



<?php } ?>
