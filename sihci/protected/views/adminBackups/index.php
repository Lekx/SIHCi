
<!-- AS02-Listar respaldos de base de datos <?php //include ("logoutTime.php"); ?>  -->
<?php 


$this->menu=array(
    //array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
    //array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
    array('label'=>'Manejador de Archivos ', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
        array('label'=>'Gestionar', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'sub1')),
        array('label'=>'Crear', 'url'=>array('postdegreeGraduates/create'),'itemOptions'=>array('class' => 'sub1')),

//postdegreeGraduates
    array('label'=>'Gestión de usuarios ', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'menuitem 2')),
        array('label'=>'Gestionar', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'sub2')),
        array('label'=>'Crear', 'url'=>array('AdminUsers/CreateUser'),'itemOptions'=>array('class' => 'sub2')),
//knowledgeApplication
    array('label'=>'Gestión de proyectos', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
        array('label'=>'Gestionar', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'sub3')),
        array('label'=>'Crear', 'url'=>array('knowledgeApplication/create'),'itemOptions'=>array('class' => 'sub3')),
//patent        
    array('label'=>'Respaldos', 'url'=>array('adminBackups/'),'itemOptions'=>array('class' => 'menuitem 4 now')),
//copyrights    
    array('label'=>'Áreas de especialidad', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'menuitem 5')),
            array('label'=>'Gestionar', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'sub5')),
            array('label'=>'Crear', 'url'=>array('adminSpecialtyAreas/create'),'itemOptions'=>array('class' => 'sub5')),
//copyrights    
    array('label'=>'Lineas de investigación', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'menuitem 6')),
            array('label'=>'Gestionar', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'sub6')),
            array('label'=>'Crear', 'url'=>array('adminResearchAreas/create'),'itemOptions'=>array('class' => 'sub6')),
//articlesGuides                

    //array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
    
    ); 




    ?>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Respaldos</h1>
            <hr>
        </div>

        <h4>Gestionar:</h4>



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
<div class="row">
<input type="text" id="search" onchange="search()" placeholder="Buscar.." class="searchadmin">
<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>
</div>


<div class="col-xs-6">
	<div class="tableheader">
		<h4>Archivos</h4>
	</div>
	<table class="table Backup">	
		<tr> 
			<th>Fecha</th>
			<th>Hora</th>
			<th>Descarga</th>
			<th></th>
		</tr>
		<?php 
			
            $url= "../sihci/backups/files";
			$files= scandir($url,0);
			unset($files[0]);
			unset($files[1]);

		    
		    foreach ($files as $key => $backupsFiles) 
			{
				echo "<tr>";
					echo "<td>".date("Y/m/d")."</td>";
					echo "<td>".'3:00'."</td>";
					echo "<td> <a href='../backups/compressZip.php' target='_self'> Descargar ZIP </a></td>";
					echo '<td><a href="../backups/compressZip.php" target="_self"><img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/descargar.png alt="home" ></a>';
					echo "</td>";



			}
		?>

	</table>	
</div>

<div class="col-xs-6">
	<div class="tableheader">
		<h4>Base de datos</h4>
	</div>
	<table class="table Backup">	
		<tr> 
			<th>Fecha</th>
			<th>Hora</th>
			<th>Descarga</th>
			<th></th>
		</tr>
		<?php 
            //$url=Yii::app()->baseUrl."/backups/dataBase/";
			//$url= "../sihci/backups/database/";
			$backUps= scandir("backups/dataBase",0);
			unset($backUps[0]);
			unset($backUps[1]);

			foreach ($backUps as $key => $backupsDataBase) 
			{
				echo "<tr>";
				$url = Yii::app()->request->baseUrl."/img/Icons/descargar.png>";
					echo "<td>".substr($backupsDataBase,0,10)."</td>";
					echo "<td>".substr($backupsDataBase,-9,-4)."</td>";
					echo "<td><a href='../backups/dataBase/".$backupsDataBase."' target='_self'>Descargar SQL</a></td>";
					echo '<td><img id="" src=' . Yii::app()->request->baseUrl . '/img/icons/descargar.png alt="home" >';
					echo "</td>";

				echo "</tr>";

			}
		?>

	</table>	
</div>

