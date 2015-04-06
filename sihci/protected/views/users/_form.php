<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div id="crateusers" class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
	)); ?>

	<div class="progreesbar">
		<ul id="progressbar">
			<li class="active">Paso 1</li>
			<li>Paso 2</li>
			<li>Paso 3</li>
		</ul>
	</div>

	<fieldset>
		<div class="row">
		<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-user"></i>
			<?php echo $form->textField($modelPersons,'names',array('placeholder'=>"Nombre/s completos.")); ?>
		</div>	
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-user"></i>
				<?php echo $form->textField($modelPersons,'last_name1',array('placeholder'=>"Apellido Paterno")); ?>
			</div>
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-user"></i>
				<?php echo $form->textField($modelPersons,'last_name2',array('placeholder'=>"Apelido Materno")); ?>
			</div>
		</div>

		<input type="button" name="next" class="next action-button" value="Listo.." />

	</fieldset>	

	<fieldset>

		<div class="emptycontent"></div>
		<div class="row">
				
		        <?php
		        $this->widget(
		            'yiiwheels.widgets.formhelpers.WhCountries',
		            array(
		                'name' => 'Persons[country]',
		                'id' => 'Persons_country',
		                'value' => 'MX',
		                'useHelperSelectBox' => true,
		                'pluginOptions' => array(
		                    'country' => 'MX',
		                    'language' => 'es_ES',
		                    'flags' => true,
		                   
		                )
		            )
		        );
		        ?>
	    </div>
	<div class="emptycontent"></div>

		<div class="row">
				<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-globe"></i>
			<?php echo $form->textField($modelPersons,'curp_passport',array('placeholder'=>"Pasaporte/Curp")); ?>
			</div>
		</div>
		<div class="emptycontent"></div>

		<input type="button" name="previous" class="previous action-button" value="Regresar.." />

		<input type="button" name="next" class="next action-button" value="Listo.." />
		
	</fieldset>

	<fieldset>	

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-envelope"></i>
				<?php echo $form->textField($model,'email',array('placeholder'=>"Email")); ?>
			</div>
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-envelope"></i>
			 	<input type="text" name="Users[email2]" id="Users_email2" placeholder="Verificación de Email" ></input>
			 </div>
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-lock"></i>
				<?php echo $form->passwordField($model,'password',array('placeholder'=>"Contraseña")); ?>
			</div>
		</div>

		<div class="row">
			<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-lock"></i>
				<input type="password" name="Users[password2]" id="Users_password2" placeholder="Verificación de Contraseña"></input>
			</div>
		</div>

	<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Generar Registro' : 'Guardar', array('class' => 'next')); ?>
		</div>


	</fieldset>

	
	<div class="countusers">
		Gracias a ti ahora somos:<br>
		<h2>2,456</h2>
	</div>

	

	<?php $this->endWidget(); ?>

</div><!-- form -->

