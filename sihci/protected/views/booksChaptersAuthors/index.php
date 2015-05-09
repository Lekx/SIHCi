<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Chapters Authors',
);

$this->menu=array(
	array('label'=>'Create BooksChaptersAuthors', 'url'=>array('create')),
	array('label'=>'Manage BooksChaptersAuthors', 'url'=>array('admin')),
);
?>

<h1>Books Chapters Authors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
