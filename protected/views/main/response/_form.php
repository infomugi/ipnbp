<?php
/* @var $this ResponseController */
/* @var $model Response */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'response-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>



		<div class="col-lg-9 col-md-10"> 


			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'letter_date'); ?>
					<?php echo $form->textField($model,'letter_date',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'letter_code'); ?>
					<?php echo $form->textField($model,'letter_code',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'letter_attachment'); ?>
					<?php echo $form->textField($model,'letter_attachment',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'date_send'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'date_send'); ?>
					<?php echo $form->textField($model,'date_send',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'date_feedback'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'date_feedback'); ?>
					<?php echo $form->textField($model,'date_feedback',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'description'); ?>
					<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'request_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'request_id'); ?>
					<?php echo $form->textField($model,'request_id',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

</div></div><!-- form -->