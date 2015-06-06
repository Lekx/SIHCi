
<!-- AS02-Listarrespaldos de base de datos-->
<div class="row">Respaldos</div>
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
<input type="text" id="search" onchange="search()" placeholder="buscar"><br><br>

<div class="row">
	<table>
		<td>Archivos</td>		
		<tr> 
			<td>Fecha</td>
			<td>Hora</td>
			<td>Descarga</td>
		</tr>
		<?php 
            //$url=Yii::app()->baseUrl."/backups/dataBase/";
			$url= "../sihci/backups/files";
			$files= scandir($url,0);
			unset($files[0]);
			unset($files[1]);


			foreach ($files as $key => $backupsFiles) 
			{
				echo "<tr>";
					echo "<td>".substr($backupsFiles,0,10)."</td>";
					echo "<td>".substr($backupsFiles,-5,10)."</td>";
					echo "<td><a onclick='Zip'  href='backups/files/".$backupsFiles."' target='_blank'>Descargar ZIP</a></td>";
				echo "</tr>";
			}
		?>

	</table>	
</div>


<div class="row">

	<table>
		
		<td>Base de datos</td>		
		<tr> 
			<td>Fecha</td>
			<td>Hora</td>
			<td>Descarga</td>
		</tr>
		<?php 
            //$url=Yii::app()->baseUrl."/backups/dataBase/";
			//$url= "../sihci/backups/database/";
			$backUps= scandir("backups/database",0);
			unset($backUps[0]);
			unset($backUps[1]);



			foreach ($backUps as $key => $backupsDataBase) 
			{
				echo "<tr>";
					echo "<td>".substr($backupsDataBase,0,10)."</td>";
					echo "<td>".substr($backupsDataBase,-9,-4)."</td>";
					echo "<td><a href='backups/database/".$backupsDataBase."' target='_blank'>Descargar SQL</a></td>";
				echo "</tr>";

			}
		?>

	</table>	
</div>

