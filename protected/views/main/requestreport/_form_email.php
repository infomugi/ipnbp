<?php
/* @var $this RequestReportController */
/* @var $model RequestReport */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-report-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		
		<div class="form-group">

			<div class="col-sm-12">
				<?php echo $form->error($model,'description_email'); ?>
				<?php echo $form->textArea($model,'description_email',array('class'=>'form-control','placeholder'=>'Isi Pesan Email Konfirmasi')); ?>
			</div>

		</div>  


		<div class="form-group">
			<div class="col-md-12">  
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Kirim Email', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->

