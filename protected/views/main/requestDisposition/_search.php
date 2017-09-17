<?php
/* @var $this RequestDispositionController */
/* @var $model RequestDisposition */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_disposition'); ?>
		<?php echo $form->textField($model,'id_disposition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'request_id'); ?>
		<?php echo $form->textField($model,'request_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disposition_date'); ?>
		<?php echo $form->textField($model,'disposition_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disposition_to'); ?>
		<?php echo $form->textField($model,'disposition_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_view'); ?>
		<?php echo $form->textField($model,'last_view'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->