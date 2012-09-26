<?php
/* @var $this FamilyController */
/* @var $model Family */
/* @var $form CActiveForm */
?>

<style type="text/css">
	.column{
		width: 120px;
	}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'family-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<b>Adresse de la famille</b>

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
		<?php echo $form->labelEx($model,'zip'); ?> et <?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>4,'maxlength'=>6)); ?> <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'zip'); ?><?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'project'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'form_id'); ?>
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
	<br />
	
	<b>Participants</b><br /><br />
	<div id="participants">
		<span class="column"><?php echo $form->labelEx($modelParticipant,'gender'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'name'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'lastName'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'birthdate'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'mail'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'phone'); ?></span>
			<br />
		<div class="row">
<span class="column"><select name="Participant[0][gender]" id="Participant_gender">
	<option value="Monsieur">Monsieur</option>
	<option value="Madame">Madame</option>
</select>
</span>
<span class="column"><input name="Participant[0][name]" id="Participant_name" type="text" maxlength="45"></span><span class="column"><input name="Participant[0][lastName]" id="Participant_lastName" type="text" maxlength="45"></span><span class="column">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=>'fr',
			    'name'=>'Participant[0][birthdate]',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			    ),
			)); ?>
			</span>
			<span class="column"><input name="Participant[0][mail]" id="Participant_phone" type="text" maxlength="45"></span>
			<span class="column"><input name="Participant[0][phone]" id="Participant_phone" type="text" maxlength="45"></span>
			
		</div>
		
		<span id="statusId" style="visibility: hidden">2</span>
		
		<div id="newParticipant">
			<?php echo CHtml::ajaxLink("Ajouter", array('ajax'), array(
				"data"=>"'id='+$('#statusId').text()",
				"processData"=>false,
				"success"=>"function(msg){jQuery(msg).appendTo('#participants');$('#statusId').html(eval($('#statusId').text()) + 1)}",
			)); ?>
		</div>
	
	</div>
	
	<br /><b>Participations</b><br /><br />
	
	<?php if($modelProject->night || $modelProject->lunch || $modelProject->dinner): ?>
	
	<?php 
	//Calcule du nombre de jours
	$start = CDateTimeParser::parse($modelProject->startDate,'yyyy-MM-dd');
	$end = CDateTimeParser::parse($modelProject->endDate,'yyyy-MM-dd');
	//echo date('Y-m-d', $start). ' - '. date('Y-m-d', $end);
	
	$nbDaysTimestamp = $end - $start;
	//$nbDaysTimrstamp = abs($nbDaysTimestamp);
	$nbDays = abs(ceil($nbDaysTimestamp/86400));
	//echo $nbDays;
	 ?>
	
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<?php if($modelProject->daySelect): ?>
					<th>Jours</th>
					<?php endif; ?>
					<?php if($modelProject->nightSelect): ?>
					<th><?php echo $form->labelEx($modelProject,'night'); ?></th>
					<?php endif; ?>
					<?php if($modelProject->lunchSelect): ?>
					<th><?php echo $form->labelEx($modelProject,'lunch'); ?></th>
					<?php endif; ?>
					<?php if($modelProject->dinnerSelect): ?>
					<th><?php echo $form->labelEx($modelProject,'dinner'); ?></th>
					<?php endif; ?>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td></td>
				</tr>
			</tfoot>
			<tbody>
				<?php
				//Calcule de toutes les dates comprise entre le début et la fin du projet
				$ii = -1;
				//echo $start. ' - '. $end;
				$ii = $start;
				/*for($ii=0; $ii<=$nbDays; $ii++){
					//$date[$ii] = date("Y-m-d",$i);
					$date[$ii] = $i;

					$i+=86400;
					//echo $i;
				}
				//*/
				$timestamp = new CDateFormatter('fr');
				
				?>
			
				<?php for($i=0;$i<=$nbDays;$i++): ?>
				
				<?php 
					$date[$i] = date("Y-m-d",$ii);
				?>
				
				<tr>
					<td><?php echo $timestamp->formatDateTime($ii, 'full', false); ?></td>
					<?php if($modelProject->daySelect): ?>
					<td><input id="Participation_day" type="checkbox" name="Participation[<?php echo $date[$i]; ?>][day]" value="1"></td>
					<?php endif; ?>
					<?php if($modelProject->nightSelect): ?>
					<td><input id="Participation_night" type="checkbox" name="Participation[<?php echo $date[$i]; ?>][night]" value="1"></td>
					<?php endif; ?>
					<?php if($modelProject->lunchSelect): ?>
					<td><input id="Participation_lunch" type="checkbox" name="Participation[<?php echo $date[$i]; ?>][lunch]" value="1"></td>
					<?php endif; ?>
					<?php if($modelProject->dinnerSelect): ?>
					<td><input id="Participation_dinner" type="checkbox" name="Participation[<?php echo $date[$i]; ?>][dinner]" value="1"></td>
					<?php endif; ?>
				</tr>
				<?php $ii+=86400; ?>
				<?php endfor; ?>
			</tbody>
		</table>
	
	<?php endif; ?>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'S\'inscrire' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->