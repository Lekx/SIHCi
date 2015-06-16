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
<input type="text" id="search" onchange="search()" placeholder="Buscar"><br><br>
<?php echo CHtml::link('<span>Registrar<br>Proyecto</span>', array('projects/create'));?><br><br>
<?php echo CHtml::link('<span>Registrar<br>Patrocinio</span>', array('AdminProjects/CreateSponsorship'));?>
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
				'viewButtonUrl'=>'Yii::app()->createUrl("/adminProjects/view", array("id" => $data["id"], "folio" => @$data["folio"]))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("/adminProjects/deleteProject", array("id" => $data["id"], "folio" => @$data["folio"]))',
				'updateButtonUrl'=>'Yii::app()->createUrl("/adminProjects/update", array("id" => $data["id"], "folio" => @$data["folio"]))',
				),

	     
   	),
));
 ?>
