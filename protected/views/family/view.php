<?php
/* @var $this FamilyController */
/* @var $model Family */
//Création de l'objet date
$timestamp = new CDateFormatter('fr');

$this->breadcrumbs=array(
	'Families'=>array('index'),
	$model->name,
);

/*
$this->menu=array(
	array('label'=>'List Family', 'url'=>array('index')),
	array('label'=>'Create Family', 'url'=>array('create')),
	array('label'=>'Update Family', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Family', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Family', 'url'=>array('admin')),
);
*/

$reduction = 0;

?>

<h1>[SP2013 <?php echo $model->form->camp->city; ?>] - Confirmation d'inscription pour la famille <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'adresse',
		'zip',
		'city',
		'form.title',
		'form_id',
		'mail',
		'phone',
	),
)); 

echo '<br /> Commentaire : '.$model->comment.'<br /><br />';

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

?>


<h2>Participants</h2>
<?php 
	$payant=0;
	$gratuit=0;

	foreach($model->participants as $p){
		
		//Déterminons l'age du particiapant
		$age = age($p->birthdate);
		
		//Calcule du nombre de participants gratuit et payant
		if($age >= 6){
			$payant++;
		}
		else{
			$gratuit++;
		}

		echo '- '. $p->gender. ' '. $p->name. ' '. $p->lastName. ' - né le '. $timestamp->formatDateTime($p->birthdate, 'medium', false). ' - '. $p->phone. ' Age : '. $age. ' ans<br />';
	}

?>
<br />
<h2>Participations</h2>
<p>Ici, vous trouverez la liste des jours et moments de participation pour tous les participants inscrits ci-dessus.</p>

<table>
	<caption></caption>
	<thead>
		<tr>
			<th>Date</th>
			<?php if($model->form->daySelect): ?>
			<th>Jours</th>
			<?php endif; ?>
			<?php if($model->form->nightSelect): ?>
			<th>Nuits</th>
			<?php endif; ?>
			<?php if($model->form->lunchSelect): ?>
			<th>Dîner</th>
			<?php endif; ?>
			<?php if($model->form->dinnerSelect): ?>
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
	foreach($model->participations as $p):
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
			<?php if($model->form->daySelect): ?>
			<td><?php echo ($p->day)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->form->nightSelect): ?>
			<td><?php echo ($p->night)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->form->lunchSelect): ?>
			<td><?php echo ($p->lunch)?'X':''; ?></td>
			<?php endif; ?>
			<?php if($model->form->dinnerSelect): ?>
			<td><?php echo ($p->dinner)?'X':'' ?></td>
			<?php endif; ?>
		</tr>
	<?php endforeach; ?>
	<!--
	<?php
		$priceDays = $nbDays*$model->form->priceByDay;
		$priceNights = $nbNights*$model->form->priceByNight;
		$priceLunchs = $nbLunchs*$model->form->priceByLunch;
		$priceDinners = $nbDinners*$model->form->priceByDinner;
	?>
	-->
	</tbody>
	<!--
		<tfoot>
		<tr>
			<td>Prix</td>
			<?php if($model->form->daySelect): ?>
			<td><?php echo $priceDays. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->form->nightSelect): ?>
			<td><?php echo $priceNights. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->form->lunchSelect): ?>
			<td><?php echo $priceLunchs. ' CHF'; ?></td>
			<?php endif; ?>
			<?php if($model->form->dinnerSelect): ?>
			<td><?php echo $priceDinners. ' CHF'; ?></td>
			<?php endif; ?>
		</tr>
	</tfoot>
	-->
</table>
<!--
<?php 
	if($model->form->daySelect == false){
		$priceDays = $nb*$model->form->priceByDay;
		echo 'Les participants participent à toutes les journées Prix : '.$priceDays.' CHF<br />';
	}
	if($model->form->nightSelect == false && $model->form->night == true){
		$priceNights = $nb*$model->form->priceByNight;
		echo 'Les participants participent à toutes les nuits Prix : '.$priceNights.' CHF<br />';
	}
	if($model->form->lunchSelect == false && $model->form->lunch == true){
		$priceLunchs = $nb*$model->form->priceByLunch;
		echo 'Les participants participent à tous les dîners Prix : '.$priceLunchs.' CHF<br />';	
	}
	if($model->form->dinnerSelect == false && $model->form->dinner == true){
		$priceDinners = $nb*$model->form->priceByDinner;
		echo 'Les participants participent à tous les soupers - Prix : '.$priceDinners.' CHF<br />';
	}
		
?>
<br />

<p>
	Prix total (par participant payant) : <?php echo $prixTotal = $priceNights+$priceDays+$priceLunchs+$priceDinners; ?> CHF
</p>
<p>
	Prix avant réduction : <?php echo $prixTotal*$payant; ?> CHF<br />
	<?php if($payant == 3 || $payant == 4){
		$reduction = $prixTotal*$payant*0.15;
	} ?>
	<?php if($payant >= 5){
		$reduction = $prixTotal*$payant*0.25;
	} ?>
	Calcule des réductions : <?php echo $reduction; ?> CHF
</p>
<p>
	Prix pour la famille (<?php echo $payant ?> participant(s) payant(s) et <?php echo $gratuit ?> participant(s) gratuit(s)) : <?php echo ($prixTotal*$payant)-$reduction; ?> CHF
</p>
-->
<p>Meilleures salutations</p>