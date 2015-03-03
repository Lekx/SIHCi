OP03-Desplegar Organigrama

<section>
	<h1>Icono!</h1>
</section>



<section>
		<img src="<?php echo Yii::app()->request->baseUrl."/protected/views/organigrama/img/org1.png"; ?>">
	
		<p>Organigrama Dando clic en subdirección general e investigación
		Titular
		M.S.P. Víctor Manuel Ramírez Anguiano
		Subdirector General de Enseñanza e Investigación</p>
		 
		<p>Domicilio
		Hospital 278 Col. El Retiro
		Guadalajara, Jalisco</p>
		 
		<p>Teléfono
		36 58 63 51 y 36 14 65 01 Ext. 282 y 41009</p>
		 
		<p>Correo electrónico
		vmramirez@hcg.gob.mx</p>
		 

		<p>Objetivo, Funciones y Atribuciones</p> <br>
		<img src="<?php echo Yii::app()->request->baseUrl."/protected/views/organigrama/img/org2.png"; ?>">
		
</section>



<section>
	<?php Yii::app()->runController('FilesManager/DisplayFiles/section/Organigrama'); ?>
</section>
