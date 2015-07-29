<?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl. '/js/admin.js');
?>


<script type="text/javascript">
	function changeStatus(id){
		$.ajax({
   url: yii.urls.base+"/index.php/adminUsers/changeStatus",
     data: {id: id,value: $("#status"+id).val()},
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


	function changeRol(id){
		$.ajax({
		url: yii.urls.base+"/index.php/adminUsers/changeRol",
    data: {id: id,idRol: $("#rol"+id).val()},
  	dataType: 'json',
   	type: "POST",
   	success: function(data) {
			var data = JSON.parse(data);
      	alert(data);
   },

});
	}
</script>
<?php
$roles = Roles::model()->FindAll();
$rolesList="array(";
foreach ($roles as $key => $value) {
	$rolesList.= "\"".$value['id']."\"=>\"".$value["name"]."\",";
}
$rolesList.= ")";


?>

<div class="admintitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión de usuarios</h1>
            <hr>
        </div>


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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'users-grid',
	'dataProvider' => $model->search(),
	//'filter'=>$model,
	'columns' => array(
		array(
			'header' => '<b>Nombre Completo</b>',
			'name'=>'names',
			'value' => array($this, 'usersFullNames'), 'type' => 'raw',
			'filter' => Chtml::activeTextField($model, 'names')
		),
		'email',
		array(
			'header' => '<b>Curp/Pasaporte</b>',
			'value' => array($this, 'usersCurpPassport'), 'type' => 'raw',
		),

		'registration_date',

		 array(
		 	'type'=>'raw',
		 	'header' => 'Rol',
      'value'=>'CHtml::dropDownList($data->id,$data->id_roles,'.$rolesList.',array("onchange"=>"send(\"\",\"AdminUsers/changeRol\",$data->id,\"none\",\"$data->id,\"+this.value)","id"=>"id_roles".$data->id))'),
		array(
			'type'=>'raw',
			'header' => 'Estatus Usuario',
			'value'=>'CHtml::dropDownList("$data->id","$data->status",array("activo" => "Activo" , "inactivo" => "Inactivo"),array("onchange"=>"send(\"\",\"AdminUsers/changeStatus\",$data->id,\"none\",\"$data->id,\"+this.value)","id"=>"status".$data->id))'),
			array(
		 	'type'=>'raw',
		 	'header' => 'Estatus Curriculum',
          	'value'=>'!is_null(Curriculum::model()->findByAttributes(array("id_user" => $data->id))) ? CHtml::dropDownList(Curriculum::model()->findByPk($data->id)->id,Curriculum::model()->findByPk($data->id)->status,array("1" => "Activo" , "0" => "Inactivo"),array("onchange"=>"send(\"\",\"AdminUsers/changeStatusCurriculum\",$data->id,\"none\",\"$data->id,\"+this.value)","id"=>"curriculum".$data->id)) : ($data->type == "fisico" ? "curriculum sin llenar" : "Usuario Moral")'),
			array(
				'class' => 'CButtonColumn', 'template' => '{view} {edit} {delete} {login}', 'header' => 'Acciones',
				'buttons' => array(
									'login' => array('label' => '','imageUrl' => Yii::app()->request->baseUrl . '/img/Acciones/sesion.png',
									'url'=>'Yii::app()->createUrl("/adminUsers/doubleSession",array("id"=>$data->id))',
									),
								'edit' => array(
								'label' => '',
								'imageUrl'=> Yii::app()->request->baseUrl . '/img/Acciones/editar.png',
								'url'=> '"AdminUsers/update?ide=".$data->id'),
								'delete' => array(
								'label' => 'Eliminar.',
								'url'=> 'Yii::app()->createUrl("/adminUsers/deleteUser",array("id"=>$data->id))'),



				),
		),
	),
)); ?>
