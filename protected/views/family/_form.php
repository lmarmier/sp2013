<?php
/* @var $this FamilyController */
/* @var $model Family */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'family-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'adresse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subscribeDate'); ?>
		<?php echo $form->textField($model,'subscribeDate'); ?>
		<?php echo $form->error($model,'subscribeDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project'); ?>
		<?php echo $form->textField($model,'project',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'project'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'form_id'); ?>
		<?php echo $form->textField($model,'form_id'); ?>
		<?php echo $form->error($model,'form_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->