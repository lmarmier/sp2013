<?php
/* @var $this CampController */
/* @var $model Camp */

$this->breadcrumbs=array(
	'Camps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Camp', 'url'=>array('index')),
	array('label'=>'Manage Camp', 'url'=>array('admin')),
);
?>

<h1>Ajouter un camp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>