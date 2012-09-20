<?php
/* @var $this ParticipantController */
/* @var $model Participant */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'participant-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<b>Adresse de la famille</b>
	
	<div class="row">
		<?php echo $form->labelEx($modelFamily,'name'); ?>
		<?php echo $form->textField($modelFamily,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelFamily,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($modelFamily,'adresse'); ?>
		<?php echo $form->textField($modelFamily,'adresse',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelFamily,'adresse'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($modelFamily,'zip'); ?> + <?php echo $form->labelEx($modelFamily,'city'); ?>
		<?php echo $form->textField($modelFamily,'zip',array('size'=>4,'maxlength'=>6)); ?> <?php echo $form->textField($modelFamily,'city',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelFamily,'city'); ?> <?php echo $form->error($modelFamily,'zip'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($modelFamily,'phone'); ?>
		<?php echo $form->textField($modelFamily,'phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelFamily,'phone'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($modelFamily,'mail'); ?>
		<?php echo $form->textField($modelFamily,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelFamily,'mail'); ?>
	</div>
	
	<br />
	<b>Participants</b>

	<div class="row">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->