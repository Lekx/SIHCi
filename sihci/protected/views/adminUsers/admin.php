<h1>Gestión de Usuarios</h1>
<script type="text/javascript">
	function changeStatus(id){
		//alert("entre mija");
		$.ajax({
   url: yii.urls.base+"/index.php/adminUsers/changeStatus",
     data: {id: id,value: $("#"+id).val()},
  dataType: 'json',
   method: "POST",
   success: function(data) {
      alert(data);
   },
   
});
	}

	function changeStatusCurriculum(id){
		$.ajax({
   url: yii.urls.base+"/index.php/adminUsers/changeStatusCurriculum",
     data: {idc: id,valuec: $("#"+id).val()},
  dataType: 'json',
   method: "POST",
   success: function(data) {
      alert(data);
   },
   
});
	}
</script> 


<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php echo CHtml::link('<span>Registrar<br>Usuario</span>', array('AdminUsers/CreateUser'));?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'users-grid',
	'dataProvider' => $model->search(),
	'filter'=>$model,
	'columns' => array(
		
		'email',
		'registration_date',
		'status',
		array(
			'header' => '<b>Nombre Completo</b>',
			'name'=>'names',
			'value' => array($this, 'usersFullNames'), 'type' => 'raw',
			'filter' => Chtml::activeTextField($model, 'names')
		),
		array(
			'header' => '<b>Rol</b>',
			'value' => '$data->idRoles->name',
		),
		array(
			'header' => '<b>Curp/Pasaporte</b>',
			'value' => array($this, 'usersCurpPassport'), 'type' => 'raw',
		),	
		 array(
		 	'type'=>'raw',
		 	'header' => 'Estatus Usuario',
          	'value'=>'CHtml::dropDownList("$data->id","$data->status",array("activo" => "Activo" , "inactivo" => "Inactivo"),array("onchange"=>"changeStatus($data->id)"))'),
		 array(
		 	'type'=>'raw',
		 	'header' => 'Estatus Curriculum',
          	'value'=>'!is_null(Curriculum::model()->findByPk($data->id)) ? CHtml::dropDownList(Curriculum::model()->findByPk($data->id)->id,Curriculum::model()->findByPk($data->id)->status,array(1 => "Activo" , 0 => "Inactivo"),array("onchange"=>\'changeStatusCurriculum(1)\')) : ""'),
			array(
				'class' => 'CButtonColumn', 'template' => '{view} {edit} {delete} {login}', 'header' => 'Acciones',
				'buttons' => array(
				'login' => array(
				'label' => 'Iniciar sesión como éste usuario.',
				'imageUrl' => Yii::app()->request->baseUrl . '/images/login.png',
				'url'=>'Yii::app()->createUrl("/adminUsers/doubleSession",array("id"=>$data->id))',


				),
				'edit' => array(
				'label' => 'Editar.',
				'url'=> '"AdminUsers/update?ide=".$data->id'),
				),
		),
	),
)); ?>
