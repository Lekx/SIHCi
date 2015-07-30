<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Gestión',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Invitaciones', 'url'=>array('projects/sponsoredAdmin'),'itemOptions'=>array('class' => 'menuitem 2')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('projects/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'sub')),
	);

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
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar proyectos:</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php



$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->customSearch(),
	/*'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(), */
	'columns'=>array(
		//'id_curriculum',
		array(
			'name'=>'is_sponsored',
			'header'=>'',
			'type'=>'html','id'=>'is_sponsored','value'=>'CHtml::encode($data->is_sponsored)',
			'value'=>'$data->is_sponsored == "1" ? "<img src=\'".Yii::app()->request->baseUrl."/img/Acciones/patrocinio.svg\' class=\'sponsorTag\' title=\'Proyecto patrocinado\'>" : "<img src=\'".Yii::app()->request->baseUrl."/img/Acciones/patrocinio2.svg\' class=\'sponsorTag\' title=\'Proyecto no patrocinado\'>"','htmlOptions'=>array('style' => 'width: 30px;')
		),
		array('name'=>'Título','type'=>'html','id'=>'title','value'=>'substr($data->title,0,50)."..."','htmlOptions'=>array('style' => 'width: 500px;')),
		array(
			'name'=>'discipline',
			'type'=>'html','id'=>'discipline','value'=>'CHtml::encode($data->discipline)',
			'value'=>'$data->discipline == "-1" ? "" : $data->discipline',

			),
		array(
			'name'=>'develop_uh',
			'type'=>'html','id'=>'develop_uh','value'=>'CHtml::encode($data->develop_uh)',
			'value'=>'$data->develop_uh == "-1" ? "" : $data->develop_uh',
			),

		array(
			'name'=>'folio',
			'type'=>'html','id'=>'folio','value'=>'CHtml::encode($data->folio)',
			'value'=>'$data->folio == "-1" ? "" : $data->folio','htmlOptions'=>array('style' => 'width: 80px;')
			),
		array(
			'name'=>'registration_number',
			'type'=>'html','id'=>'registration_number','value'=>'CHtml::encode($data->registration_number)',
			'value'=>'$data->registration_number == "-1" ? "" : $data->registration_number','htmlOptions'=>array('style' => 'width: 80px;')
			),

		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)','cssClassExpression' => '"checkThisItem"','htmlOptions'=>array('style' => 'width: 80px;')),

			array(
				'class' => 'CButtonColumn', 'template' => '{view} {edit} {seguim} {delete}', 'header' => 'Acciones',
				'buttons' => array(
					'edit' => array(
						//'label' => '',
						'imageUrl' => Yii::app()->request->baseUrl.'/img/Acciones/editar.png',
						'visible'=>'($data->status == "BORRADOR" || $data->status == "MODIFICAR") ? TRUE : FALSE',
						'url'=> '"update/".$data->id',
						'options'=>array('class'=>'ttip','title'=>'Modificar',),
					),
					'seguim' => array(
						'imageUrl' => Yii::app()->request->baseUrl.'/img/Acciones/editar.png',
						'visible'=>'$data->status == "ACEPTADO" ? TRUE : FALSE',
						'url'=> 'CHtml::normalizeUrl(array("projectsFollowups/admin/".$data->id))',
						'options'=>array('class'=>'ttip','title'=>'Seguimineto'),
					),
					'delete' => array(
						'imageUrl' => Yii::app()->request->baseUrl.'/img/Acciones/eliminar.png',
						'visible'=>'$data->status == "BORRADOR" ? TRUE : FALSE',
						'url'=> '"update/".$data->id',
						'options'=>array('title'=>'Eliminar',),

					),
		),'htmlOptions'=>array('style' => 'width: 50px;')
	),),
)); ?>
