
		<div class="row">
			<span class="column"><select name="Participant[<?php echo $id; ?>][gender]" id="Participant_gender">
				<option value="Monsieur">Monsieur</option>
				<option value="Madame">Madame</option>
			</select>
</span><span class="column"><input name="Participant[<?php echo $id; ?>][name]" id="Participant_name" type="text" maxlength="45"></span><span class="column"><input name="Participant[<?php echo $id; ?>][lastName]" id="Participant_lastName" type="text" maxlength="45"></span><span class="column">
		<?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'language'=>'fr',
			    'name'=>'Participant['. $id. '][birthdate]',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			    ),
			));?>
			</span>
			<span class="column"><input name="Participant[<?php echo $id; ?>][mail]" id="Participant_phone" type="text" maxlength="45"></span>
			<span class="column"><input name="Participant[<?php echo $id; ?>][phone]" id="Participant_phone" type="text" maxlength="45"></span>
		</div><br /><br />