<?php 
	if(empty($results))
		echo "<h3> No se encontraron resultados para su busqueda:<b> \"".$keyword."\"</b> </h3>";
	else
		echo  "<h3> El resultado de la busqueda para <b>\"".$keyword."\"</b> fue:</h3><hr>";
		
	foreach($results as $index => $subarray)
		echo "<h2><a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["title"]."</a></h2>"."<a href='http://localhost/SIHCi/sihci/index.php/".$index."'>".$subarray["desc"]."</a><br><hr>";
 ?>
