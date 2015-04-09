<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Create BooksChapters', 'url'=>array('create')),
	array('label'=>'Update BooksChapters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BooksChapters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BooksChapters', 'url'=>array('admin')),
);
?>

<h1>View BooksChapters #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'chapter_title',
		'book_title',
		'publishing_year',
		'publishers',
		'editorial',
		'volume',
		'pages',
		'citations',
		'total_of_authors',
		'area',
		'discipline',
		'subdiscipline',
		//'creation_date',
		'url_doc',
	),
)); ?>
