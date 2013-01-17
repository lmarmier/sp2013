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
	'enableAjaxValidation'=>true,
)); ?>

		<div><h2 class="toonish inline">Adresse de la famille</h2>(Inscrivez votre famille puis ajoutez chaque membre dans la partie "Participants")</div>

	<div id="familleblock">
	<?php echo $form->errorSummary($model,'Les erreurs suivantes doivent êtres corrigées :'); ?>
	
	<div class="row">
		<span class="fblock"> <?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>35,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'name'); ?></span><span class="fblock">	
	<?php echo $form->labelEx($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>45,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'adresse'); ?>
	</span>
</div>
	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?> et <?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>4,'maxlength'=>6)); ?> <?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php // echo $form->error($model,'zip'); ?><?php //echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'project'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'form_id'); ?>
	</div>

	<div class="row">
	<span>	<?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php // echo $form->error($model,'mail'); ?>		</span><span>	<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?php //echo $form->error($model,'phone'); ?>
		<br /><?php echo $form->labelEx($model,'comment'); ?> <?php echo $form->textField($model,'comment'); ?></span>
	</div>
	</div>
	
		
	<br />
	
	<div><h2 class="toonish inline">Participants</h2>(Cliquez sur "ajouter" pour ajouter un participant) <?php echo CHtml::ajaxButton("Ajouter", array('ajax'), array(
			"data"=>"'id='+$('#statusId').text()",
			"processData"=>false,
			"success"=>"function(msg){jQuery(msg).appendTo('#participants');$('#statusId').html(eval($('#statusId').text()) + 1)}",
		)); ?>	</div>
	<div id="participants">
		<span class="column" style="width:90px"><?php echo $form->labelEx($modelParticipant,'gender'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'name'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'lastName'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'birthdate'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'mail'); ?></span><span class="column"><?php echo $form->labelEx($modelParticipant,'phone'); ?></span>
			<br />
		<div class="row">
<span class="gender" ><select name="Participant[0][gender]" id="Participant_gender">
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
			        'changeMonth'=>true,
			        'changeYear'=>true,
			        'yearRange'=>'c-90'
			    ),
			    'htmlOptions'=>array(
			    ),
			)); ?>
			</span>
			<span class="column"><input name="Participant[0][mail]" id="Participant_phone" type="text" maxlength="45"></span>
			<span class="column"><input name="Participant[0][phone]" id="Participant_phone" type="text" maxlength="45"></span>
		
						
		</div>		<span id="statusId" style="visibility: hidden">2</span>
				
		
			</div>
	
	<h2 class="toonish">Participations</h2>
	<div id="participations">
	
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
			<thead >
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

	</div>
		<div class="oneline">
	<p class="note_bt">Les champs marqués d'une <span class="required">*</span> sont obligatoires.</p>
	<div class="row_bt buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'S\'inscrire' : 'Save'); ?>
	</div></div>

<?php $this->endWidget(); ?>

</div><!-- form -->