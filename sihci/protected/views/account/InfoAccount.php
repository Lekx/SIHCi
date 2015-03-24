
	<h3>Cuenta</h3>

	<h4><p>Datos de Cuenta:</p></h4>

	<p>Correo:</p>
<?php
	echo $details->email."</br>";
	echo CHtml::link('Modificar',array('account/updateEmail'));
?>

	<p>Contraseña:</p>
<?php
	echo "**************</br>";
	echo CHtml::link('Modificar',array('account/updatePassword'));
?>