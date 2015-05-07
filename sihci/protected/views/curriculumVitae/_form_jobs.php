<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/protected/views/curriculumVitae/script/script.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->dropDownList($model,'hospital_unit',array('NA'=>'NA','Hospital Civil Dr. Juan I. Menchaca'=>'Hospital Civil Dr. Juan I. Menchaca',
																	'Hospital Civil Fray Antonio Alcalde'=>'Hospital Civil Fray Antonio Alcalde'), 
		                                                       array('id'=>'unitHospital', 'prompt'=>'Unidad Hospitalaria','title'=>'Unidad Hospitalaria','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hospital_unit'); ?>

	</div>
	
	<div class="row">
		
		<?php 
		if ($model->hospital_unit == "NA" || $model->hospital_unit == "" ) {

			echo $form->textField($model,'organization',array('id'=>'organization', 'title'=>'Organización','size'=>60,'maxlength'=>100, 'placeholder'=>'Organización')); 
			 echo $form->error($model,'organization'); 
		}

		?>

	</div>

	<div class="row">
	
		
		<?php echo $form->textField($model,'area',array( 'title'=>'Área','size'=>45,'maxlength'=>45, 'placeholder'=>'Área')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'title',array( 'title'=>'Título o Puesto','size'=>45,'maxlength'=>45, 'placeholder'=>'Título o Puesto')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'start_day',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16',
																'17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21',
																'22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26',
																'27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'), 
			                                                     array( 'title'=>'Día de Inicio','prompt'=>'Dia de Inicio Laboral','options' => array(''=>array('selected'=>true))), 
		    	                                                 array('size'=>10,'maxlength'=>10),
		                                                         array('placeholder'=>'Día de Inicio')); ?>
		

		<?php echo $form->error($model,'start_day'); ?>
	</div>

	<div class="row">

		<?php echo $form->dropDownList($model,'start_month',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',
																'6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11',
																'12'=>'12'), 
		                                                       array( 'prompt'=>'Mes de Inicio','title'=>'Mes de Inicio Laboral','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                       array('placeholder'=>'Mes de Inicio')); ?>
	
		<?php echo $form->error($model,'start_month'); ?>
	</div>

	<div class="row">

		<?php echo $form->dropDownList($model,'start_year',array('1930'=>'1930','1931'=>'1931','1932'=>'1932','1933'=>'1933','1934'=>'1934',
																 '1935'=>'1935','1936'=>'1936','1937'=>'1937','1938'=>'1938','1939'=>'1939',
																 '1940'=>'1940','1941'=>'1941','1942'=>'1942','1943'=>'1943','1944'=>'1944',
																 '1945'=>'1945','1946'=>'1946','1947'=>'1947','1948'=>'1948','1949'=>'1949',
																 '1950'=>'1950','1951'=>'1951','1952'=>'1952','1953'=>'1953','1954'=>'1954',
																 '1955'=>'1955','1956'=>'1956','1957'=>'1957','1958'=>'1958','1959'=>'1959',
																 '1960'=>'1960','1961'=>'1961','1962'=>'1962','1963'=>'1963','1964'=>'1964',
																 '1965'=>'1965','1966'=>'1966','1967'=>'1967','1968'=>'1968','1969'=>'1969',
																 '1970'=>'1970','1971'=>'1971','1972'=>'1972','1973'=>'1973','1974'=>'1974',
																 '1975'=>'1975','1976'=>'1976','1977'=>'1977','1978'=>'1978','1979'=>'1979',
																 '1980'=>'1980','1981'=>'1981','1982'=>'1982','1983'=>'1983','1984'=>'1984',
																 '1985'=>'1985','1986'=>'1986','1987'=>'1987','1988'=>'1988','1989'=>'1989',
																 '1990'=>'1990','1991'=>'1991','1992'=>'1992','1993'=>'1993','1994'=>'1994',
																 '1996'=>'1996','1996'=>'1996','1997'=>'1997','1998'=>'1998','1999'=>'1999',
																 '2000'=>'2000','2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004',
																 '2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009',
																 '2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014',
																 '2015'=>'2015'), 
		                                                       array( 'prompt'=>'Año de Inicio','title'=>'Año de Inicio Laboral','options' => array(''=>array('selected'=>true))), 
		                                                       array('size'=>10,'maxlength'=>10),
		                                                       array('placeholder'=>'Año de Inicio')); ?>

	
		<?php echo $form->error($model,'start_year'); ?>
	</div>


	<div class="row">

		<?php if ($model->hospital_unit!="NA") {
			echo $form->textField($model,'rud',array('id'=>'rud', 'title'=>'RUD', 'size'=>50,'maxlength'=>50, 'placeholder'=>'RUD'));
			}
		  ?>
		<?php echo $form->error($model,'rud'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'schedule',array( 'title'=>'Horario de Trabajo','size'=>45,'maxlength'=>45, 'placeholder'=>'Horario de Trabajo')); ?>
		<?php echo $form->error($model,'schedule'); ?>
	</div>

	<div class="row buttons">
		 <?php echo CHtml::ajaxButton ('Guardar',CController::createUrl('curriculumVitae/jobs'), 
        				array(
							'dataType'=>'json',
                     		'type'=>'post',
                     		'success'=>'function(data) 
                     		 {
		                                      
		                         if(data.status=="200")
		                         {
				                       $(".successdiv").show();
		                         }		                         
		                         else
		                         {
			                     	$(".errordiv").show(); 
			                     }       
		                  	}',                    
		                    
                      ), array('class'=>'savebutton'));  
        ?>
		<input class="cleanbutton" type="button" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('curriculumVitae/index'),'confirm'=>'¿Seguro que desea Cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->