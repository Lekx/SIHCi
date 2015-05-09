<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs=array(
	'Datos Laborales'=>array('jobs'),
);

$this->menu=array(
	array('label'=>'Datos Personales', 'url'=>array('curriculumVitae/personalData')),
	array('label'=>'Documentos oficiales', 'url'=>array('curriculumVitae/docsIdentity')),
	array('label'=>'Datos de dirección actual', 'url'=>array('curriculumVitae/addresses')),
	array('label'=>'Datos laborales', 'url'=>array('curriculumVitae/jobs')),
	array('label'=>'Líneas de investigación', 'url'=>array('curriculumVitae/researchAreas')),
	array('label'=>'Datos de contacto', 'url'=>array('curriculumVitae/phones')),
	array('label'=>'Formación académica', 'url'=>array('curriculumVitae/grades')),
	array('label'=>'Nombramientos', 'url'=>array('curriculumVitae/commission')),

);
?>
	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Currículum vitae electrónico</h1>
            <hr>
        </div>

<h4>Datos laborales:</h4>

<?php $this->renderPartial('_form_jobs', array('model'=>$model)); ?>