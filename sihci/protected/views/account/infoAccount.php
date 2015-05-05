	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Cuenta</h1>
            <hr>
        </div>

<div class="infoAccount">
	<h4>Datos de Cuenta:</h4>

<h5>Correo:</h5>
<?php
	echo "<p>".$details->email."</p>";
	echo CHtml::link('Modificar',array('account/updateEmail'));
?>

	<h5>Contraseña:</h5>
<?php
	echo "<p> ************** <p> ";
	echo CHtml::link('Modificar',array('account/updatePassword'));
?>
</div>