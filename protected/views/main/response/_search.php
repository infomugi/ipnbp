<?php
/* @var $this ResponseController */
/* @var $model Response */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_response'); ?>
		<?php echo $form->textField($model,'id_response'); ?>
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
		<?php echo $form->label($model,'letter_date'); ?>
		<?php echo $form->textField($model,'letter_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'letter_code'); ?>
		<?php echo $form->textField($model,'letter_code',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'letter_attachment'); ?>
		<?php echo $form->textField($model,'letter_attachment',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_send'); ?>
		<?php echo $form->textField($model,'date_send'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_feedback'); ?>
		<?php echo $form->textField($model,'date_feedback'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
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