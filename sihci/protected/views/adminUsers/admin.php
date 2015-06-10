<h1>Gestión de Usuarios</h1>
<!--<script type="text/javascript">
	function changeStatus(var element){
		alert ("mierda entramos");
		$.ajax({
   url: '',
   data: {
      format: 'json'
   },
   error: function() {
      $('#info').html('<p>An error has occurred</p>');
   },
   dataType: 'jsonp',
   success: function(data) {
      var $title = $('<h1>').text(data.talks[0].talk_title);
      var $description = $('<p>').text(data.talks[0].talk_description);
      $('#info')
         .append($title)
         .append($description);
   },
   type: 'GET'
});
		'ajax' => array(
        'data-url'=>$this->createUrl('serviceRegistration'),
        'url' => $this->createUrl('servicePackage'), // it is selected at MyHtml::ajax() which URL to use
        'type' => 'POST',
        'dataType' => 'json',
        'success' => 'function(data){
            if(data.registration){
                console.log("answer from registration");
            }else if(data.package){
                console.log("answer from package");
            }
        }',
        'data' => array('id' => 'js:this.value'),
	}
</script> -->

<?php echo CHtml::link('<span>Registrar<br>Usuario</span>', array('AdminUsers/CreateUser'));?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'users-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		
		'email',
		'registration_date',
		'status',
		array(
			'header' => '<b>Nombre Completo</b>',
			'value' => array($this, 'usersFullNames'), 'type' => 'raw',
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
		 	'name' => 'estatus',
          	'value'=>'CHtml::dropDownList("$data->id","$data->status",array("activo" => "Activo" , "inactivo" => "Inactivo"))'),
			array(
				'class' => 'CButtonColumn', 'template' => '{view} {edit} {delete} {login}', 'header' => 'Acciones',
				'buttons' => array(
				'login' => array(
				'label' => 'Iniciar sesión como éste usuario.',
				'imageUrl' => Yii::app()->request->baseUrl . '/images/login.png',

				),
				'edit' => array(
				'label' => 'Editar.',
				'url'=> '"AdminUsers/update?ide=".$data->id'),
				),
		),
	),
)); ?>
