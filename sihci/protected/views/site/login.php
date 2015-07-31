<?php
if(strpos(Yii::app()->request->url,'site/login'))
	$this->redirect('index');
?>

	<div class="loginback">
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		));
	?>

				<div class="row">
					<div class="inputlog">
						<div class="inner-addon right-addon">
							<i class="glyphicon glyphicon-envelope"></i>
							<?php echo $form->textField($model,'username', array('placeholder'=>"Correo electronico.",'title'=>'Favor de ingresar su correo de registro')); ?>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="inputlog">
						<div class="inner-addon right-addon">
							<i class="glyphicon glyphicon-lock"></i>
							<?php echo $form->passwordField($model,'password', array('placeholder'=>"Contraseña.",'title'=>'Favor de ingresar su contraseña.')); ?>
						</div>
					</div>
				</div>

				<!-- <div class="row">
		<a href="<?php //echo Yii::app()->createUrl('/site/recoverypassword');?>">¿Olvidó su Contraseña?</a>
		</div> -->

				<?php echo CHtml::ajaxButton ("Ingresar a mi Cuenta", CController::createUrl('site/login'), array(
						'type'=>'POST',
                        'data'=> 'js:$("#login-form").serialize()+ "&ajax=login-form"',
                        'success'=>'js:function(response){
		                        		if(response == "302"){

		                        			 $(".tooltipster-base").css("background-color","#F20862 !important");

		                        			 $(".tooltipster-base").css("border","1px solid #F20862");
																	 $(".tooltipster-arrow-border").css("border-color","#F20862 !important");
		                        			 $("div.tooltipster-base.tooltipster-default.tooltipster-fade.tooltipster-fade-show").css("border-color","#F20862");
		                        			 $("#yt0").css("background-color", "#F20862 !important");
		                        			 $("#yt0").css("font-size", "12px");
											  				 	 $("#yt0").css("text-align", "center");
		                        			 $("#yt0").val("Su cuenta no ha sido activada aún, revise su correo registrado.");
		                        			 $(".infodialog").removeClass("infodialog").addClass("infodialogerror");
		                        			 $(".glyphicon").css("color","#F20862 ");
		                        			 $(".infodialogerror").css("visibility", "visible");
		                        			 $(".infodialog1").removeClass("infodialog1").addClass("infodialog1error");
		                        			 $(".infodialog1error").css("visibility", "visible");
		                        			 $("#LoginForm_username").css("background-color", "#F20862 !important");
		                        			 $("#LoginForm_username").css("background-color", "#F20862 !important");
		                        		  $(".inner-addon").effect( "shake" , {times:3}, 20);
									    					 	$(".tooltipster-base").remove();
																	$(".tooltipster-base").hide();
																	$(".tooltipster-arrow-right.tooltipster-arrow span").css("border-color","#F20862 !important");

		                        		}
		                        		else if(response == "200"){

											 location.reload();
											 $(".loginHome").hide();
		                        			 $(".infodialogerror").removeClass("infodialogerror").addClass("infodialog");
		                        			 $(".infodialog").css("visibility", "hidden");
		                        			 $(".infodialog1error").removeClass("infodialog1error").addClass("infodialog1");
		                        			 $(".infodialog").css("visibility", "hidden");
																	 $(".tooltipster-base").hide();
											 window.open("'.Yii::app()->createUrl('/account/firstLogin').'","_blank ");


		                        		}
		                        		else
		                        		{
		                        			 $(".tooltipster-base").css("background-color","#F20862 !important");
		                        			 $(".tooltipster-base").css("border","1px solid #F20862");
		                        			 $(".tooltipster-base").css("border-color","#F20862 !important");
																	 $(".tooltipster-arrow-border").css("border-color","#F20862 !important");
																	 $(".tooltipster-arrow-right.tooltipster-arrow span").css("border-color","#F20862 !important");
		                        			 $("div.tooltipster-base.tooltipster-default.tooltipster-fade.tooltipster-fade-show").css("border-color","#F20862 !important");
		                        			 $("#yt0").css("background-color", "#F20862 !important");
		                        			 $("#yt0").val("Listo... Ingresar a mi cuenta");
		                        			 $(".infodialog").removeClass("infodialog").addClass("infodialogerror");
		                        			 $(".glyphicon").css("color","#F20862 ");
		                        			 $(".infodialogerror").css("visibility", "visible");
		                        			 $(".infodialog1").removeClass("infodialog1").addClass("infodialog1error");
		                        			 $(".infodialog1error").css("visibility", "visible");
		                        			 $("#LoginForm_username").css("background-color", "#F20862 !important");
		                        			 $("#LoginForm_username").css("background-color", "#F20862 !important");
		                        		     $(".inner-addon").effect( "shake" , {times:3}, 20);

		                        		}

                        			}'
                        			)); ?>

					<div class="">
						<?php echo CHtml::Button('Recuperar Contraseña', array('id'=>'recoveryHome')); ?>
					</div>
					<?php $this->endWidget(); ?>

						<div class="closelogin">
							No deseo Ingresar <i class="glyphicon glyphicon-remove"></i>
						</div>
		</div>
		<!-- form -->
	</div>
