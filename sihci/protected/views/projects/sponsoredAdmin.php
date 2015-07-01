	<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Proyectos'=>array('sponsoredAdmin'),
	'Gestión',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Invitaciones', 'url'=>array('projects/sponsoredAdmin'),'itemOptions'=>array('class' => 'menuitem 2 now')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
		array('label'=>'Crear', 'url'=>array('projects/create'),'itemOptions'=>array('class' => 'sub1')),
		array('label'=>'Gestionar', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'sub1')),


	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

	);

/*

echo "<pre>";
print_r($model->findByPk(1));
echo "</pre>";
echo "<hr><pre>";
print_r($model->search());
echo "</pre>"; */
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar proyectos de invitación:</h3>

<?php
$mod = $model->findByAttributes(array("id_user_researcher"=>Yii::app()->user->id))->search();
//var_dump($mod->idUserSponsorer);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sponsorship-grid',
	'dataProvider'=>$mod,
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
	/*	array(
			'name'=>'id_user_sponsorer',
			'value'=>'$data->idUserSponsorer->sponsors[0]["sponsor_name"]',
			),*/
		array(
			'name'=>'id_user_researcher',
			'header'=>'Nombre de quien invita',
			'value'=>'$data->idUserSponsorer->persons[0]["last_name1"]." ".$data->idUserSponsorer->persons[0]["last_name2"].", ".$data->idUserSponsorer->persons[0]["names"]',
			),
		array(
			'name'=>'id_user_researcher',
			'header'=>'Empresa que patrocina',
			'value'=>'Sponsors::model()->findByAttributes(array("id_user"=>$data->id_user_sponsorer))->sponsor_name',
			),
		array(
			'name'=>'status',
			'header'=>'Título del proyecto',
			'value'=>'$data->status == 1 ? "aceptado" : "rechazado"',
			),

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
							'visible'=>'true'
						),
					'reject'=>array(
							'label'=>'Rechazar',
							'imageUrl'=>Yii::app()->request->baseUrl.'/img/reject.png',
							'url'=>'Yii::app()->createUrl("/projects/rejectSponsorship",array("id"=>$data->id))',
							'visible'=>'true'
						)
				)
		),
	),
)); ?>
