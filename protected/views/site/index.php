<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div id="accueilcont">
<div id="accueil">
<h1>Bienvenue sur le site de gestion des formulaire du <?php echo CHtml::encode(Yii::app()->name); ?></h1>

<p>C'est ici que vous aurez pourrez gérer vos camps et vos formulaire afin de les intégrer sur le site de votre choix.</p>
<?php echo CHtml::image('./images/commencer.png', '', array(
)); ?></div>
<div class="homebtn">
	<div class="ajoutercamp"><?php echo CHtml::link('Ajouter <br/> un camp', array('camp/create')); ?></div>
	<div class="oubien"><?php echo CHtml::image('./images/oubien.png', '', array(
	)); ?></div>
	<div class="affichercamp"><?php echo CHtml::link('Afficher <br/> la liste des camps', array('camp/index')); ?></div>
	</div>
</div>

