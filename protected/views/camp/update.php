<?php
/* @var $this CampController */
/* @var $model Camp */

$this->breadcrumbs=array(
	'Camps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Camp', 'url'=>array('index')),
	array('label'=>'Create Camp', 'url'=>array('create')),
	array('label'=>'View Camp', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Camp', 'url'=>array('admin')),
);
?>

<h1>Update Camp <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>