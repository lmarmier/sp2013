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

	<p class="note">Les champs avec un<span class="required">*</span> sont obligatoire.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?> : 
		<?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div id="dateBlock">
		<h3>Date</h3>
		Du 
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model,
		    'attribute'=>'startDate',
		    'language'=>'fr',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
		        'dateFormat'=>'yy-mm-dd',
		    ),
		    'htmlOptions'=>array(
		    ),
		)); ?>
		<?php //echo $form->textField($model,'startDate'); ?>
		<?php echo $form->error($model,'startDate'); ?>
		
		au 
		
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$model,
		    'attribute'=>'endDate',
		    'language'=>'fr',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
		        'dateFormat'=>'yy-mm-dd',
		    ),
		    'htmlOptions'=>array(
		    ),
		)); ?>
		<?php //echo $form->textField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>

	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'priceByDay'); ?> : 
		<?php echo $form->textField($model,'priceByDay', array('size'=>2,'maxlength'=>3)); ?> CHF <?php echo $form->checkBox($model,'daySelect'); ?> proposer la séléction des jours.
		<?php echo $form->error($model,'priceByDay'); ?>
	</div>
	
	<div id="optionsBlock">
		<h3>Options</h3>
		<?php if($campModel->night == 1): ?>
		<?php echo $form->checkBox($model,'night'); ?> <?php echo $form->labelEx($model,'night'); ?> : <?php echo $form->textField($model,'priceByNight', array('size'=>2,'maxlength'=>3)); ?> CHF <?php echo $form->checkBox($model,'nightSelect'); ?> proposer la séléction des nuits.<br />
		<?php else: ?>
		Il n'est pas possible de sélectionner des nuits, car le camp ne les propose pas.<br /><br />
		<?php endif; ?>
		
		<?php if($campModel->lunch == 1): ?>
		<?php echo $form->checkBox($model,'lunch'); ?> <?php echo $form->labelEx($model,'lunch'); ?> : <?php echo $form->textField($model,'priceByLunch', array('size'=>2,'maxlength'=>3)); ?> CHF <?php echo $form->checkBox($model,'lunchSelect'); ?> proposer la séléction des dîner.<br />
		<?php else: ?>
		Il n'est pas possible de sélectionner des dîner, car le camp ne les propose pas.<br /><br />
		<?php endif; ?>
		
		<?php if($campModel->dinner == 1): ?>
		<?php echo $form->checkBox($model,'dinner'); ?> <?php echo $form->labelEx($model,'dinner'); ?> : <?php echo $form->textField($model,'priceByDinner', array('size'=>2,'maxlength'=>3)); ?> CHF <?php echo $form->checkBox($model,'dinnerSelect'); ?> proposer la séléction des souper.<br />
		<?php else: ?>
		Il n'est pas possible de sélectionner des souper, car le camp ne les propose pas.<br /><br />
		<?php endif; ?>
	</div>

	
	<?php echo $form->hiddenField($model, 'camp_id', array('value'=>$_GET['id'])); ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->