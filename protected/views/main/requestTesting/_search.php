<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_testing'); ?>
		<?php echo $form->textField($model,'id_testing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_id'); ?>
		<?php echo $form->textField($model,'created_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_id'); ?>
		<?php echo $form->textField($model,'update_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testing_type'); ?>
		<?php echo $form->textField($model,'testing_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testing_lab'); ?>
		<?php echo $form->textField($model,'testing_lab'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'testing_part'); ?>
		<?php echo $form->textField($model,'testing_part'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'request_id'); ?>
		<?php echo $form->textField($model,'request_id'); ?>
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