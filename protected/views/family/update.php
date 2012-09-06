<?php
/* @var $this FamilyController */
/* @var $model Family */

$this->breadcrumbs=array(
	'Families'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Family', 'url'=>array('index')),
	array('label'=>'Create Family', 'url'=>array('create')),
	array('label'=>'View Family', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Family', 'url'=>array('admin')),
);
?>

<h1>Update Family <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>