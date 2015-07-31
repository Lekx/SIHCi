	<div class="cvtitle">
        <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
        <h1>Patrocinios</h1>
        <hr>
    </div>
<script type="text/javascript">

function change(){
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueYear=='total'){
		$('tbody > tr').show();
		totalVisibles = parseInt($('tbody >tr').length);
		$('#totalToShow').html(totalVisibles);
	  $('.pager').remove();
	  $('table.items').each(function() {
		var currentPage = 0;
		var numPerPage = 10;
		var $table = $(this);
		$table.bind('repaginate', function() {
				$table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
		});

		$table.trigger('repaginate');
		var numRows = $table.find('tbody tr').length;
		var numPages = Math.ceil(numRows / numPerPage);
		var $pager = $('<div class="pager"></div>');
		for (var page = 0; page < numPages; page++) {
				$('<span class="page-number"></span>').text(page + 1).bind('click', {
						newPage: page
				}, function(event) {
						currentPage = event.data['newPage'];
						$table.trigger('repaginate');
						$(this).addClass('active').siblings().removeClass('active');
				}).appendTo($pager).addClass('clickable');
		}
		$pager.insertAfter($table).find('span.page-number:first').addClass('active');
	});
	}else if(valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else{
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}
}//function
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


<?php if($checkAuth){ ?>
<?php
$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Patrocinios', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
	array('label'=>'Crear', 'url'=>array('sponsorship/create'),'itemOptions'=>array('class' => 'sub')),
	array('label'=>'Gestionar', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'sub')),
	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
	); /*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sponsorship-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/
//$sponsorId = Sponsors::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
//echo $sponsorId;
?>




<h3>Gestionar Patrocinios.</h3>
<!-- <h3>en construcción . . .</h3> -->
<input type="text" id="search" onKeyPress="search()" placeholder="Búsqueda por columna" title="La barra de búsqueda es sensible a las mayúsculas" class="searchcrud">
<?php echo CHtml::Button('',array('class'=>'adminbut')); ?>

<br><br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'sponsorship-grid',
	'dataProvider'=>$model->customSearchSponsorship(),
	'filterPosition'=>'header',
    'selectableRows'=>0,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	//'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'id_user_sponsorer',
		array(
			'name'=>'id_user_researcher',
			'value'=>'$data->idUserResearcher->persons[0]["last_name1"]." ".$data->idUserResearcher->persons[0]["last_name2"].", ".$data->idUserResearcher->persons[0]["names"]'
			,'htmlOptions'=>array('style' => 'width: 150px;')),
		array('name'=>'Nombre del proyecto','type'=>'html','id'=>'project_name','value'=>'substr(CHtml::encode($data->project_name),0,100)."..."'),
		//'project_name',
		array('name'=>'Descripción','type'=>'html','id'=>'description','value'=>'substr(CHtml::encode($data->description),0,100)."..."'),
		//'description',
		//array('name'=>'Palabras clave','type'=>'html','id'=>'keywords','value'=>'CHtml::encode($data->keywords)'),
		//'keywords',
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)','htmlOptions'=>array('style' => 'width: 50px;')),
		//'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
}else{
?>


<br><br>
<h3>Por favor llene primero su perfil de empresa para poder crear patrocinios.</h3>



<?php } ?>
