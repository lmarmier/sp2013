<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->title); ?></b> - du <?php echo CHtml::encode($data->startDate); ?> au <?php echo CHtml::encode($data->endDate); ?> - <?php echo ($data->night == 1)?"Camp (nuits comprises)":"Camps de jour"; ?> à <?php echo $data->camp['city']; ?><br />
	<?php echo CHtml::link('Modifier le formulaire', array('project/update', 'id'=>$data->id)); ?> - <?php echo CHtml::link('Liste des participant', array('participant/index', 'id'=>$data->id)); ?> - ...

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priceByDay')); ?>:</b>
	<?php echo CHtml::encode($data->priceByDay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priceByLunch')); ?>:</b>
	<?php echo CHtml::encode($data->priceByLunch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priceByDinner')); ?>:</b>
	<?php echo CHtml::encode($data->priceByDinner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('night')); ?>:</b>
	<?php echo CHtml::encode($data->night); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunch')); ?>:</b>
	<?php echo CHtml::encode($data->lunch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinner')); ?>:</b>
	<?php echo CHtml::encode($data->dinner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('daySelect')); ?>:</b>
	<?php echo CHtml::encode($data->daySelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nightSelect')); ?>:</b>
	<?php echo CHtml::encode($data->nightSelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunchSelect')); ?>:</b>
	<?php echo CHtml::encode($data->lunchSelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinnerSelect')); ?>:</b>
	<?php echo CHtml::encode($data->dinnerSelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('camp_id')); ?>:</b>
	<?php echo CHtml::encode($data->camp_id); ?>
	<br />

	*/ ?>

</div>