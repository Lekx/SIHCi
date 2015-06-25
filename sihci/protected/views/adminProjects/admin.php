<div class="admintitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Manejador de proyectos</h1>
            <hr>
        </div>
         <h4 style="margin-left:100px">Gestionar</h4>
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
 <?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl. '/js/admin.js');
?>

 function updateStatusSponsorship(id){
 	var request = $.ajax({
	  url: yii.urls.base+"/index.php/adminProjects/updateStatusSponsorship",
	  method: "POST",
	  data: { id : id, status : $("#"+id).val()},
	  dataType: "json"
	});
 }
 function updateStatusProject(id){
 	var request = $.ajax({
	  url: yii.urls.base+"/index.php/adminProjects/updateStatusProject",
	  method: "POST",
	  data: { id : id, status : $("#"+id).val()},
	  dataType: "json"
	});
 }
</script>

<input type="text" id="search" onchange="search()" placeholder="Búsqueda por columna"><br><br>
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
		 		'value'=>'@$data["id_user_sponsorer"] 
		 				? 
		 				CHtml::dropDownList($data["id"],$data["status"],array("0" => "Patrocinio Status" , "1" => "Otro mas"),array("onchange"=>"updateStatusSponsorship($data[id])"))
		 				:
		 				CHtml::dropDownList($data["id"],$data["status"],array("En proceso" => "En proceso" , "dictaminado" => "dictaminado", "borrador"=>"borrador", "DIVUH"=>"revisión divuh", "SEUH"=>"revisión seuh", "COMETI"=>"revisión c. ética", "COMBIO"=>"revisión c. Bio.", "COMINV"=>"revisión c. inv.", "DUH"=>"revisión duh", "SGEI"=>"revisión sgei", "DG"=>"revisión dg", "JIOPD"=>"revisión J.Inv. opd"),array("onchange"=>"updateStatusProject($data[id])"))'
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
