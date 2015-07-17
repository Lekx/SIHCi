<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>
<style type="text/css">
		#btnCreateEmail{
				background-color: #00b973 !important;
			}
		#btnCreatePhone{
				background-color: #00b973 !important;
			}
         .errors{
            -webkit-boxshadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            margin-top: -50px;
            margin-left: 455px;
            position: absolute;
			border-radius: 5px;
			border: 2px solid #F20862;
			background: #F20862;
			color: #fff;
			width: 190px !important;
			font-family: 'Caviar_Dreams_Bold' !important;
			font-size: 12px;
			line-height: 16px;
			padding: 8px 10px;
			text-align:  center;
        }
        .emails{
            display: none;
        }
        .phone{
            display: none;
        }

    </style>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.

	'enableAjaxValidation' => true,
));?>



<!-- <input id="showFormEmail" type="button" value="Agregar Nuevo Correo Electrónico"> -->


	<?php
	echo "<div class='row'>";
	echo "<h5>Nuevo correo electrónico:</h5>";
	echo " <span class='plain-select'>";
	echo $form->dropDownList($email,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial',
												'Particular'=>'Particular',
																								'Campus'=>'Campus', 'otro'=>'otro'),
																										 array('title'=>'Tipo de correo electrónico','prompt'=>'Tipo de correo electrónico'));
	echo "</span>";
	echo $form->error($email,'type');
	echo "</div>";
	echo "<div class='row'>";

	echo $form->textField($email,'email',array('title'=>'Email','placeholder'=>'Email'));
	echo $form->error($email, 'email');
	echo "</div>";

	 ?>

	</div>


		<?php
		//print_r($getEmails);
		$countEmail = 1;
		foreach($getEmails as $key => $value){

				echo "<div class='row'>";
				echo "<h5>Correo electrónico:</h5>";
				echo " <span class='plain-select'>";
				echo $form->dropDownList($email,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial',
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'),
		                                                       array('title'=>'Tipo de correo electrónico','prompt'=>'Tipo de correo electrónico','name'=>'getTypeEmail[]','options' => array(''.$getEmails[$key]->type.''=>array('selected'=>true))));
				echo "</span>";
				echo "</div>";
				echo "<div class='row'>";
				echo $form->error($email,'type');
			 	echo $form->textField($email,'email',array('title'=>'Email','name'=>'getEmail[]','value'=>''.$getEmails[$key]->email.'','placeholder'=>'Email'));
			 	echo $form->error($email, 'email');
			 	echo "</div>";

				echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deleteEmail', 'id'=>$getEmails[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?' , 'class'=>'deleteSomething'));
			 	$countEmail ++;
			 	echo "<hr>";
		}
		?>

		<br>


	<!-- <input type="button" id="showFormPhone" value="Agregar Nuevo Teléfono"> -->

<!-- <div class="phone"> -->
<div class="row">
	<h5>Nuevo teléfono:</h5>
 <span class="plain-select">
<?php	 echo $form->dropDownList($phone,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial',
														 'Particular'=>'Particular',
																										 'Campus'=>'Campus', 'otro'=>'otro'),
																													array('title'=>'Tipo de Teléfono','prompt'=>'Tipo de Teléfono')); ?>
	</span>
	<?php echo $form->error($phone,'type'); ?>
	</div>

			<div class="phoneinput">
				<div class="row">
				<?php
				 echo $form->textField($phone,'country_code',array('class'=>'phones country numericOnly','required'=>true,'placeholder'=>'[52]', 'title'=>'Lada Nacional'));
		 		 echo $form->error($phone,'country_code');

		 		 echo $form->textField($phone,'local_area_code',array('class'=>'phones state numericOnly','required'=>'true','placeholder'=>'[33]', 'title'=>'Lada Local'));
		 		 echo $form->error($phone,'local_area_code');

		 		 echo $form->textField($phone,'phone_number',array('class'=>'phones phonew numericOnly','required'=>'true','placeholder'=>'[000-000-00-00]', 'title'=>'Número de Teléfono'));
		 		 echo $form->error($phone,'phone_number');

		 		 echo $form->textField($phone,'extension',array('class'=>'phones extension numericOnly','placeholder'=>'[Ext]', 'title'=>'Extensión'));
		 		 echo $form->error($phone,'extension');
				?>
				</div>
			</div>

<!-- </div> FORM Phone -->
<hr>

		<?php
		foreach ($getPhones as $key => $value) {
	 	echo "<div class='row'>";
      	echo "<h5>Teléfono:</h5>";
     	echo " <span class='plain-select'>";
		echo $form->dropDownList($phone,'type',array('Trabajo'=>'Trabajo','Residencial'=>'Residencial',
															'Particular'=>'Particular',
			                                                'Campus'=>'Campus', 'otro'=>'otro'),
		                                                       array('title'=>'Tipo de Teléfono','prompt'=>'Tipo de Teléfono','name'=>'getTypesPhones[]','options' => array($getPhones[$key]->type=>array('selected'=>true))));
		 echo "</span>";
		 echo $form->error($phone,'type');
		 echo "</div>";
		 echo "<div class='phoneinput'>";
		 echo "<div class='row'>";
		 echo $form->textField($phone,'country_code',array('class'=>'phones country numericOnly','name'=>'getCountryCode[]','value'=>$getPhones[$key]->country_code,'placeholder'=>'[52]', 'title'=>'Lada Nacional'));
		 echo $form->error($phone,'country_code');

		 echo $form->textField($phone,'local_area_code',array('class'=>'phones state numericOnly','name'=>'getLocalAreaCode[]','value'=>$getPhones[$key]->local_area_code,'placeholder'=>'[33]', 'title'=>'Lada Local'));
		 echo $form->error($phone,'local_area_code');

		 echo $form->textField($phone,'phone_number',array('class'=>'phones phonew numericOnly','name'=>'getPhoneNumber[]','value'=>$getPhones[$key]->phone_number,'placeholder'=>'[000-000-00-00]', 'title'=>'Número de Teléfono'));
		 echo $form->error($phone,'phone_number');

		 echo $form->textField($phone,'extension',array('class'=>'phones extension numericOnly','name'=>'getExtension[]','value'=>$getPhones[$key]->extension,'placeholder'=>'[Ext]', 'title'=>'Extensión'));
		 echo $form->error($phone,'extension');
		 echo "<br>";
		 echo "<br>";

		echo "Marcar como primario ";
     echo $form->radioButton($phone,'is_primary',array('name'=>'getIsPrimary[]', 'uncheckValue'=>'0', 'checked'=>$getPhones[$key]->is_primary));
      echo $form->error($phone,'is_primary');
      echo "</div>";
		 echo CHtml::button('Elminar',array('submit' => array('curriculumVitae/deletePhone', 'id'=>$getPhones[$key]->id),'confirm'=>'¿Seguro que desea eliminarlo?','class'=>'deleteSomething'));
		 echo "</div>";
		  echo "<hr>";


		}
		 ?>


	<div class="row buttons">
		<?php echo CHtml::htmlButton('Guardar',array(
							 'onclick'=>'send("phones-form", "curriculumVitae/phones", "'.$phone->id.'","curriculumVitae/phones","");',
								//'id'=> 'post-submit-btn',
							 'class'=>'savebutton',
					 ));
			 ?>
<?php echo CHtml::link('Cancelar',array('curriculumVitae/phones'),array('confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>
<hr>
<?php $this->endWidget(); ?>


</div><!-- form -->
