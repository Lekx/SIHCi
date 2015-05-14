<?php
/* @var $this BooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books',
);

$this->menu=array(
	array('label'=>'Create Books', 'url'=>array('create')),
	array('label'=>'Manage Books', 'url'=>array('admin')),
);
?>

<h1>Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
