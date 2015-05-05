<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */

$this->breadcrumbs=array(
	'Documentos Oficiales'=>array('index'),
);

$this->menu=array(
	array('label'=>'List DocsIdentity', 'url'=>array('index')),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>
	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Currículum vitae electrónico</h1>
            <hr>
        </div>

<h4>Documentos Oficiales:</h4>

<?php $this->renderPartial('_form_docs', array('model'=>$model, 'getDocs'=> $getDocs, 'modelDocs' => $modelDocs)); ?>