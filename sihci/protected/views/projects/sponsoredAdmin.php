<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Proyectos'=>array('sponsoredAdmin'),
	'Gestión',
);

/*

echo "<pre>";
print_r($model->findByPk(1));
echo "</pre>";
echo "<hr><pre>";
print_r($model->search());
echo "</pre>"; */
?>

<h1>Gestión de proyectos patrocinados</h1>

<?php
$mod = $model->findByAttributes(array("id_user_researcher"=>Yii::app()->user->id))->search();
//var_dump($mod->idUserSponsorer);

?>
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
			'name'=>'Nombre empresa'/*'id_user_sponsorer'*/,
			'value'=>'$data->idUserSponsorer->sponsors[0]["sponsor_name"]',
			),
		/*array(
			'name'=>'Nombre empresa'/*'id_user_researcher',
			'value'=>'$data->idUserSponsorer->persons[0]["last_name1"]." ".$data->idUserSponsorer->persons[0]["last_name2"].", ".$data->idUserSponsorer->persons[0]["names"]',
			), */
		array('name'=>'Nombre del proyecto','type'=>'html','id'=>'project_name','value'=>'CHtml::encode($data->project_name)'),
		//'project_name',
		//'description',
		//'keywords',
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)'),
		//'status',
			array(
			'class'=>'CButtonColumn','template'=>'{view} {accept} {reject}','header'=>'Acciones','buttons'=>array(
					'view'=>array(
						'label'=>'Detalles',
						//'imageUrl'=>Yii::app()->request->baseUrl.'/img/accept.png',
						'url'=>'Yii::app()->createUrl("/projects/view",array("id"=>$data->id))',
					),
					'accept'=>array(
							'label'=>'Aceptar',
							'imageUrl'=>Yii::app()->request->baseUrl.'/img/accept.png',
							'url'=>'Yii::app()->createUrl("/projects/acceptSponsorship",array("id"=>$data->id))',
						),
					'reject'=>array(
							'label'=>'Rechazar',
							'imageUrl'=>Yii::app()->request->baseUrl.'/img/reject.png',
							'url'=>'Yii::app()->createUrl("/projects/rejectSponsorship",array("id"=>$data->id))',
						)
				)
		),
	),
)); ?>
