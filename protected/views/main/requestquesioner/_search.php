<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_quesioner'); ?>
		<?php echo $form->textField($model,'id_quesioner'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_id'); ?>
		<?php echo $form->textField($model,'created_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'request_id'); ?>
		<?php echo $form->textField($model,'request_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'report_id'); ?>
		<?php echo $form->textField($model,'report_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_1'); ?>
		<?php echo $form->textField($model,'question_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_2'); ?>
		<?php echo $form->textField($model,'question_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_3'); ?>
		<?php echo $form->textField($model,'question_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_4'); ?>
		<?php echo $form->textField($model,'question_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_5'); ?>
		<?php echo $form->textField($model,'question_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_6'); ?>
		<?php echo $form->textField($model,'question_6'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_7'); ?>
		<?php echo $form->textField($model,'question_7'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_8'); ?>
		<?php echo $form->textField($model,'question_8'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_9'); ?>
		<?php echo $form->textField($model,'question_9'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_10'); ?>
		<?php echo $form->textField($model,'question_10'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_11'); ?>
		<?php echo $form->textField($model,'question_11'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_12'); ?>
		<?php echo $form->textField($model,'question_12'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_13'); ?>
		<?php echo $form->textField($model,'question_13'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_14'); ?>
		<?php echo $form->textField($model,'question_14'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_15'); ?>
		<?php echo $form->textField($model,'question_15'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_16'); ?>
		<?php echo $form->textField($model,'question_16'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_17'); ?>
		<?php echo $form->textField($model,'question_17'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_18'); ?>
		<?php echo $form->textField($model,'question_18'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_19'); ?>
		<?php echo $form->textField($model,'question_19'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_20'); ?>
		<?php echo $form->textField($model,'question_20'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_21'); ?>
		<?php echo $form->textField($model,'question_21'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_22'); ?>
		<?php echo $form->textField($model,'question_22'); ?>
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