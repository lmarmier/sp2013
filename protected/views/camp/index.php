<?php
/* @var $this CampController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Camps',
);

$this->menu=array(
	array('label'=>'Create Camp', 'url'=>array('create')),
	array('label'=>'Manage Camp', 'url'=>array('admin')),
);
?>

<h1>Camps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
