<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startDate'); ?>
		<?php echo $form->textField($model,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endDate'); ?>
		<?php echo $form->textField($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priceByDay'); ?>
		<?php echo $form->textField($model,'priceByDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priceByLunch'); ?>
		<?php echo $form->textField($model,'priceByLunch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priceByDinner'); ?>
		<?php echo $form->textField($model,'priceByDinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'night'); ?>
		<?php echo $form->textField($model,'night'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lunch'); ?>
		<?php echo $form->textField($model,'lunch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dinner'); ?>
		<?php echo $form->textField($model,'dinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'daySelect'); ?>
		<?php echo $form->textField($model,'daySelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nightSelect'); ?>
		<?php echo $form->textField($model,'nightSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lunchSelect'); ?>
		<?php echo $form->textField($model,'lunchSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dinnerSelect'); ?>
		<?php echo $form->textField($model,'dinnerSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'camp_id'); ?>
		<?php echo $form->textField($model,'camp_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->