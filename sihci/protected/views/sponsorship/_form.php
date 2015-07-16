<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */
/* @var $form CActiveForm */

$researcher = "";
if(!$model->isNewRecord){
	$researcher = $model->idUserResearcher->persons[0];
	$researcher = $researcher['last_name1']." ".$researcher['last_name2'].", ".$researcher['names'];
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsorship-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<?php //echo $form->errorSummary($model); ?>
	<div class="row">

	<?php
		$this->widget('ext.MyAutoComplete', array(
		    'model'=>$model,
		    'attribute'=>'id_user_researcher',
		    'name'=>'Sponsorship[id_user_researcher]',
		    'id'=>'Sponsor',
		    'value'=>$researcher,
		    'source'=>$this->createUrl('/sponsorship/getResearchers'),
		    'options'=>array(
		        'minLength'=>'0',
		    ),
		));


	?>

		<?php echo $form->error($model,'id_user_researcher'); ?>
			</div>
			<div class="row">
				<?php echo $form->textField($model,'project_name',array('size'=>45,'maxlength'=>45,'placeholder'=>'Nombre del proyecto','title'=>'Nombre del proyecto')); ?>
				<?php echo $form->error($model,'project_name'); ?>
			</div>

			<div class="row">
				<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>150,'placeholder'=>'Descripción','title'=>'Descripción')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>

			<div class="row">
				<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>150,'placeholder'=>'Palabras clave','title'=>'Palabras clave')); ?>
				<?php echo $form->error($model,'keywords'); ?>
			</div>
	</div>

	<div class="row">
	<h5>Contrato con investigador:</h5>
		<?php echo $form->fileField($modelProjectsDocs, 'path', array('name' => 'Doc1'));?>
		<div id="SponsorshipDocs1_path_em_" class="errorMessage" style="display:none;"></div>

		<?php
			if(array_key_exists('Documento_que_acredite_la_creacion_de_la_empresa', $modelProjectsDocs))
				echo "<a href='".Yii::app()->request->baseUrl."/".$modelProjectsDocs['Documento_que_acredite_la_creacion_de_la_empresa'][1]."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$modelProjectsDocs['Documento_que_acredite_la_creacion_de_la_empresa'][1]."' style='width:75px;height:auto;'></a>";
		?>
	</div>


	<div class="row buttons">
	<?php echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'send("sponsorship-form", "sponsorship/create", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'", "")',
                'class'=>'savebutton',
            ));
    ?>
    <?php echo CHtml::Button('Cancelar',array('submit' => array('sponsorship'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
