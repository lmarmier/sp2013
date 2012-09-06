<?php
/* @var $this CampController */
/* @var $data Camp */

?>

<div class="view">

	<?php $datetime = CDateTimeParser::parse($data->startDate,'yyyy-mm-dd'); ?>

	<b><?php //echo CHtml::encode($data->city); ?></b> - du <?php echo CHtml::encode(strtotime(CDateFormatter::formatDateTime($datetime))); ?>

	<?php /* echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('night')); ?>:</b>
	<?php echo CHtml::encode($data->night); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunch')); ?>:</b>
	<?php echo CHtml::encode($data->lunch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinner')); ?>:</b>
	<?php echo CHtml::encode($data->dinner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nightSelect')); ?>:</b>
	<?php echo CHtml::encode($data->nightSelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('daySelect')); ?>:</b>
	<?php echo CHtml::encode($data->daySelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunchSelect')); ?>:</b>
	<?php echo CHtml::encode($data->lunchSelect); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dinnerSelect')); ?>:</b>
	<?php echo CHtml::encode($data->dinnerSelect); ?>
	<br />

	*/ ?>

</div>