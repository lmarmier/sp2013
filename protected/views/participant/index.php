<?php
/* @var $this ParticipantController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Participants',
);

$this->menu=array(
	array('label'=>'Create Participant', 'url'=>array('create')),
	array('label'=>'Manage Participant', 'url'=>array('admin')),
);
?>

<h1>Participants</h1>

<?php 
/*
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$model->search(),
));
 ?>
