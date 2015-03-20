<?php 
	if(empty($results))
		echo "No se encontraron resultados para su busqueda:\"".$keyword."\"";
	else
		echo  "El resultado de la busqueda para <b>\"".$keyword."\" fue:";
		
	foreach($results as $index => $subarray)
		echo "<a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["title"]."</a>"."<a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["desc"]."</a><hr>";
 ?>
