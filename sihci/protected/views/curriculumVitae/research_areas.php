<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Líneas de Investigación'=>array('research_areas'),
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>
	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Currículum vitae electrónico</h1>
            <hr>
        </div>

<h4>Líneas de Investigación:</h4>

<?php $this->renderPartial('_form_research_areas', array('model'=>$model, 'getResearch'=>$getResearch)); ?>