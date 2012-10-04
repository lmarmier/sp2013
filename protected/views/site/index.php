<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenue sur le site de gestion des formulaire du <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>C'est ici que vous aurez pourrez gérer vos camps et vos formulaire afin de les intégrer sur le site de votre choix.</p>

<p>Pour commencer :</p>
<ul>
	<li><?php echo CHtml::link('Ajouter un camp', array('camp/create')); ?></li>
	<li><?php echo CHtml::link('Afficher la liste des camps', array('camp/index')); ?></li>
</ul>

<p>Si vous désirez d'autres information, vous pouvez me contactez à l'adresse suivante <?php echo CHtml::link('lionel.marmier@fabricantsdejoie.ch', 'mailto:lionel.marmier@fabricantsdejoie.ch'); ?></p>
