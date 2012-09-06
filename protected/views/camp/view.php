<?php
/* @var $this CampController */
/* @var $model Camp */

$this->breadcrumbs=array(
	'Camps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Camp', 'url'=>array('index')),
	array('label'=>'Create Camp', 'url'=>array('create')),
	array('label'=>'Update Camp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Camp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Camp', 'url'=>array('admin')),
);
?>

<h1>View Camp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city',
		'startDate',
		'endDate',
		'priceByDay',
		'priceByLunch',
		'priceByDinner',
		'night',
		'lunch',
		'dinner',
		'nightSelect',
		'daySelect',
		'lunchSelect',
		'dinnerSelect',
	),
)); ?>
