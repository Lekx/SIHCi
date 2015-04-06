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


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sponsorship-grid',
	'dataProvider'=>$model->findByAttributes(array("id_user_researcher"=>Yii::app()->user->id))->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
		array(
			'name'=>'id_user_sponsorer',
			'value'=>'$data->idUserSponsorer->sponsors[0]["sponsor_name"]',
			),
		/*array(
			'name'=>'id_user_researcher',
			'value'=>'$data->idUserResearcher->persons[0]["last_name1"]." ".$data->idUserResearcher->persons[0]["last_name2"].", ".$data->idUserResearcher->persons[0]["names"]',
			), */

		'project_name',
		//'description',
		//'keywords',
		
		'status',
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
