

<?php
	if($result == "success")
	 
echo "<div class='selecttype'>
    <div class='typecontent2'>
        <div class='typeicons'>
        <h1>¡Cuenta verificada con éxito!, ya puedes iniciar sesión.</h1>
		<div class='backhome'><h4>Regresar a la pagina principal</h4></div>
        	</div>
        </div>
    </div>
</div>";
	else
		echo  "<div class='selecttype'>
    <div class='typecontent2'>
        <div class='typeicons'>
        <h1>¡Error al verificar la cuenta contactar al administrador del sistema!</h1>
		<div class='backhome'><h4>Regresar a la pagina principal</h4></div>
        	</div>
        </div>
    </div>
</div>";
?>

