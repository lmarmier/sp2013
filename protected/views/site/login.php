<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
/*$this->breadcrumbs=array(
	'Login',
);*/
?>
<div id="login">
<img src="../images/logosp.png">
<!-- <p>Please fill out the following form with your login credentials:</p> -->

<div class="formlogin">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('placeholder'=>'Utilisateur')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'Mot de passe')); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('connexion'); ?>
	</div>
<div class="row rememberMe">
	<?php echo $form->checkBox($model,'rememberMe'); ?>
	<?php echo $form->label($model,'rememberMe'); ?>
	<?php echo $form->error($model,'rememberMe'); ?>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>