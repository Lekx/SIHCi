<h1>Gestión de Proyectos</h1>
<script type="text/javascript">
	function search(){
 	valueSearch = $("#search").val();
 	$('tbody > tr').show();

 	if (valueSearch == '') {
 		$('tbody > tr').show();
 	}else{
 		$('tbody > tr:not(:contains('+valueSearch+'))').hide();
 	}
 }
</script>
<input type="text" id="search" onchange="search()" placeholder="Buscar"><br><br>
<?php echo CHtml::link('<span>Registrar<br>Proyecto</span>', array('AdminUsers/CreateUser'));?><br><br>
<?php echo CHtml::link('<span>Registrar<br>Patrocinio</span>', array('AdminUsers/CreateUser'));?>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'books-grid',
	'dataProvider'=>$dataProvider,
	 'ajaxUpdate' => true,
	 // 'filter' => $dataProvider,
	 'template'=>"{items}",
	'columns'=>array(
		array('header'=>'Tipo',
		 		'value'=>'@$data["id_user_sponsorer"] ? "Patrocinio" : "Proyecto"',
                ),
		array('header'=>'Nombre del Proyecto',
		 		'name' => 'project_name'
                ),
		array('header'=>'Es Patrocinado',
		 		'value'=>'@$data["is_sponsored"] == null || @$data["is_sponsored"] == 1 ? "Patrocinado" : "No Patrocinado"',
                ),
		array('header'=>'Folio',
		 		'name'=>'folio',
                ),
		array('header'=>'Número de Registro',
		 		'name'=>'registration_number',
                ),
		array('header'=>'Encargado',
		 		'name'=>'names',
	            ),
	     array('type'=>'raw',
		 		'name' => 'Estatus',
		 		'value'=>'@$data["id_user_sponsorer"] ?CHtml::dropDownList($data["id"],$data["status"],array("0" => "Patrocinio Status" , "1" => "st")) : CHtml::dropDownList($data["id"],$data["status"],array("En proceso" => "En proceso" , "dictaminado" => "dictaminado"))'
	            ),
	     array('header'=>'Fecha de Creación',
	     	    'type'=>'raw',
		 		'name'=>'creation_date',
                ),
		  array('header'=>'Acciones',
				'class'=>'CButtonColumn',
				'viewButtonUrl'=>'Yii::app()->createUrl("/AdminProjectsController/view", array("id" => $data["id"]))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("/controllername/delete", array("id" => $data["id"]))',
				'updateButtonUrl'=>'Yii::app()->createUrl("/controllername/update", array("id" => $data["id"]))',
				),

	     
   	),
));
 ?>
