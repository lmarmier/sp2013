<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Project'=>array('index'),
	'Page de confirmation',
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>
<p>
	Le projet "<?php echo $model->title; ?>" à correctement été ajouté sur le site. Il vous reste encore quelques étape avant que votre formulaire soit visible sur le site. Veuillez suivre cette marche à suivre :
	<fieldset>
		<h2>Marche à suivre pour ajouter un formulaire sur le site</h2>
		<p>
			Voici le liens vers le formulaire : <?php echo Yii::app()->request->getBaseUrl(true). '/form/'. $model->id; ?><br /><br />
			Olivier, je te laisse modifier cette page qui va correspondre à la page qui s'affichera après avoir créer un nouveau projet et elle doit expliquer à Loïse comment le mettre sur le site. C'est plus simple plutôt qu'elle doivent aller chercher une marche à suivre je ne sais pas où.
		</p>
	</fieldset>
</p>
