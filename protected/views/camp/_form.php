<?php
/* @var $this CampController */
/* @var $model Camp */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'camp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec un<span class="required">*</span> sont obligatoire.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?> : 
		<?php echo $form->textField($model,'city',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
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
		    	'defaultDate'=>'2013-03-01',
		        'showAnim'=>'fold',
		        'dateFormat'=>'yy-mm-dd',
		        //'onClose'=>'function( selectedDate ) {$( "#Camp_startDate" ).datepicker( "option", "maxDate", selectedDate );}',
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
		    	'defaultDate'=>'2013-03-01',
		        'showAnim'=>'fold',
		        'dateFormat'=>'yy-mm-dd',
		        //'onClose'=>'function( selectedDate ) {$( "#Camp_startDate" ).datepicker( "option", "minDate", selectedDate );}',
		    ),
		    'htmlOptions'=>array(
		    ),
		)); ?>
		<?php //echo $form->textField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'priceByDay'); ?> : 
		<?php echo $form->textField($model,'priceByDay', array('size'=>2,'maxlength'=>5,'value'=>15)); ?> CHF <?php echo $form->checkBox($model,'daySelect'); ?> proposer la séléction des jours.
		<?php echo $form->error($model,'priceByDay'); ?>
	</div>
	
	<div id="optionsBlock">
		<h3>Options</h3>
		<?php echo $form->checkBox($model,'night'); ?> <?php echo $form->labelEx($model,'night'); ?> : <?php echo $form->textField($model,'priceByNight', array('size'=>2,'maxlength'=>5)); ?> CHF <?php echo $form->checkBox($model,'nightSelect'); ?> proposer la séléction des nuits.<br />
		<?php echo $form->checkBox($model,'lunch'); ?> <?php echo $form->labelEx($model,'lunch'); ?> : <?php echo $form->textField($model,'priceByLunch', array('size'=>2,'maxlength'=>5)); ?> CHF <?php echo $form->checkBox($model,'lunchSelect'); ?> proposer la séléction des dîner.<br />
		<?php echo $form->checkBox($model,'dinner'); ?> <?php echo $form->labelEx($model,'dinner'); ?> : <?php echo $form->textField($model,'priceByDinner', array('size'=>2,'maxlength'=>5)); ?> CHF <?php echo $form->checkBox($model,'dinnerSelect'); ?> proposer la séléction des souper.<br />
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->