<?php
/* @var $this ParticipantController */
/* @var $model Participant */

$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Participant', 'url'=>array('index')),
	array('label'=>'Create Participant', 'url'=>array('create')),
	array('label'=>'Update Participant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Participant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Participant', 'url'=>array('admin')),
);
?>

<h1>View Participant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gender',
		'lastName',
		'name',
		'birthdate',
		'phone',
		'family.adresse',
		'family.zip',
		'family.city',
		'mail',
		'comment'
	),
)); ?>

<?php 
//Caclule de l'age du participants

function age($naiss)  {
  list($annee, $mois, $jour) = preg_split('[-]', $naiss);
  $today['mois'] = date('n');
  $today['jour'] = date('j');
  $today['annee'] = date('Y');
  $annees = $today['annee'] - $annee;
  if ($today['mois'] <= $mois) {
    if ($mois == $today['mois']) {
      if ($jour > $today['jour'])
        $annees--;
      }
    else
      $annees--;
    }
  return $annees;
}
  
$age = age($model->birthdate);

echo 'Age du participants : '. $age;

 ?>

<table>
	<caption></caption>
	<thead>
		<tr>
			<th>Date</th>
			<?php if($model->family->form->daySelect): ?>
			<th>Jours</th>
			<?php endif; ?>
			<?php if($model->family->form->nightSelect): ?>
			<th>Nuits</th>
			<?php endif; ?>
			<?php if($model->family->form->lunchSelect): ?>
			<th>Dîner</th>
			<?php endif; ?>
			<?php if($model->family->form->dinnerSelect): ?>
			<th>Souper</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
<?php 
		$nbDays = 0;
		$nbNights = 0;
		$nbLunchs = 0;
		$nbDinners = 0;
		$nb = 0;

	$date = new CDateFormatter('fr');
	foreach($model->family->participations as $p):
		//Calcule du prix
		if($p->day)
			$nbDays++;
		if($p->night)
			$nbNights++;
		if($p->lunch)
			$nbLunchs++;
		if($p->dinner)
			$nbDinners++;
		$nb++;
		?>
		<tr>
			<td><?php echo $date->formatDateTime($p->date, 'full', false) ?></td>
			<?php if($model->family->form->daySelect): ?>
			<td><?php echo ($p->day)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->nightSelect): ?>
			<td><?php echo ($p->night)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->lunchSelect): ?>
			<td><?php echo ($p->lunch)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->dinnerSelect): ?>
			<td><?php echo ($p->dinner)?'X':'' ?></td>
			<?php endif; ?>
		</tr>
	<?php endforeach; ?>
	<?php
		$priceDays = $nbDays*$model->family->form->priceByDay;
		$priceNights = $nbNights*$model->family->form->priceByNight;
		$priceLunchs = $nbLunchs*$model->family->form->priceByLunch;
		$priceDinners = $nbDinners*$model->family->form->priceByDinner;
	?>
	</tbody>
	<?php if($age > 6): ?>
		<tfoot>
		<tr>
			<td>Prix</td>
			<?php if($model->family->form->daySelect): ?>
			<td><?php echo $priceDays. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->nightSelect): ?>
			<td><?php echo $priceNights. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->lunchSelect): ?>
			<td><?php echo $priceLunchs. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->family->form->dinnerSelect): ?>
			<td><?php echo $priceDinners. ' CHF'; ?></td>
			<?php endif; ?>
		</tr>
	</tfoot>
	<?php endif; ?>
</table>

<?php if($age > 6): ?>
<p>Prix total : <?php echo $priceDays+$priceNights+$priceLunchs+$priceDinners; ?> CHF</p>
<?php else: ?>
<p>Les participants de moins de 6 ans, ne payent pas.</p>
<?php endif; ?>

<?php echo CHtml::link('Voir la famille', array('/family/view', 'id'=>$model->family->id)); ?>
