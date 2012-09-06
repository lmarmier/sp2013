<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startDate'); ?>
		<?php echo $form->textField($model,'startDate'); ?>
		<?php echo $form->error($model,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->textField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priceByDay'); ?>
		<?php echo $form->textField($model,'priceByDay'); ?>
		<?php echo $form->error($model,'priceByDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priceByLunch'); ?>
		<?php echo $form->textField($model,'priceByLunch'); ?>
		<?php echo $form->error($model,'priceByLunch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priceByDinner'); ?>
		<?php echo $form->textField($model,'priceByDinner'); ?>
		<?php echo $form->error($model,'priceByDinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'night'); ?>
		<?php echo $form->textField($model,'night'); ?>
		<?php echo $form->error($model,'night'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lunch'); ?>
		<?php echo $form->textField($model,'lunch'); ?>
		<?php echo $form->error($model,'lunch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dinner'); ?>
		<?php echo $form->textField($model,'dinner'); ?>
		<?php echo $form->error($model,'dinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'daySelect'); ?>
		<?php echo $form->textField($model,'daySelect'); ?>
		<?php echo $form->error($model,'daySelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nightSelect'); ?>
		<?php echo $form->textField($model,'nightSelect'); ?>
		<?php echo $form->error($model,'nightSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lunchSelect'); ?>
		<?php echo $form->textField($model,'lunchSelect'); ?>
		<?php echo $form->error($model,'lunchSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dinnerSelect'); ?>
		<?php echo $form->textField($model,'dinnerSelect'); ?>
		<?php echo $form->error($model,'dinnerSelect'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'camp_id'); ?>
		<?php echo $form->textField($model,'camp_id'); ?>
		<?php echo $form->error($model,'camp_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->