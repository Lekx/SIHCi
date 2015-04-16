

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div id="sidebar" style="width:15%;float:left;">
	<?php

	$action = Yii::app()->getController()->getAction()->controller->action->id;
	$controller = Yii::app()->getController()->getAction()->controller->id;

	if($controller == "sponsorship"){
		echo "<hr>".CHtml::link("Gestionar patrocinios",array('admin'));
		echo "<hr>".CHtml::link("Crear patrocinio",array('create'));
	}else{
		echo "<hr>".CHtml::link("Invitaciones de proyectos patrocinados",array('sponsoredAdmin'));
		echo "<hr>".CHtml::link("Gestionar proyectos",array('admin'));
		echo "<hr>".CHtml::link("Crear proyecto no patrocinado",array('create'));

	}


	/*
		$this->beg
		inWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		*/
	?>
	</div><!-- sidebar -->
<div style="width:85%;float:left;">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">

</div>
<?php $this->endContent(); ?>