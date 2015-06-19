
<div class="recoverypass">
		<div class="form">
		<?php $form = $this->beginWidget('CActiveForm',
			array(
				'id'=>'recovery-form',
				'enableAjaxValidation'=>true,
				'enableClientValidation' => true,
				'clientOptions' => array(
					'validateOnSubmit' => true,
					),
				));
		?>
			<div class="revoverytitle">
				<h2>¡No te preocupes!</h2>
				<hr>
			</div>
			<div id="recoveryinfo">
				Enviaremos un correo electronico, donde podrás cambiar tu contraseña.
			</div>
			<div class="inputlog">
				<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-envelope"></i>
					<?php echo $form->textField($model,'email', array('placeholder'=>"Email..",'title'=>'Favor de ingresar su correo de registro.')); ?>
					<?php //echo $form->error($model,'email'); ?>

				</div>
			</div>
			<div class="">
				<?php echo CHtml::ajaxButton ("Enviar Correo", CController::createUrl('site/recoveryPassword'), array(
					'type'=>'POST',
					'class' => uniqid(),
					'id'=> 'ajax-button'.uniqid(),
					'data'=> 'js:$("#recovery-form").serialize()+ "&ajax=recovery-form"',
					'success'=>'js:function(response){
								if(response == "404"){
											
											$(".errordiv").show();
					         			
								}
								else{

								$(".successdiv").show();

								}

					}',
					)); ?>
			</div>

		<?php $this->endWidget(); ?>

			<div class="closerecovery">
				No Recuperar Contraseña <i class="glyphicon glyphicon-remove"></i>
			</div>

		</div>
</div>