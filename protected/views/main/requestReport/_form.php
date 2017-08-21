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
	'errorMessageCssClass' => 'label label-danger',
	'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
	)); ?>

	<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


	<div class="col-lg-9 col-md-10"> 

		
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'created_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'created_date'); ?>
					<?php echo $form->textField($model,'created_date'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'created_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'created_id'); ?>
					<?php echo $form->textField($model,'created_id'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'update_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'update_date'); ?>
					<?php echo $form->textField($model,'update_date'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'update_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'update_id'); ?>
					<?php echo $form->textField($model,'update_id'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'upload_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'upload_date'); ?>
					<?php echo $form->textField($model,'upload_date'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'accept_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'accept_date'); ?>
					<?php echo $form->textField($model,'accept_date'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'description'); ?>
					<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'file'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'file'); ?>
					<?php echo $form->textField($model,'file',array('size'=>60,'maxlength'=>255)),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'request_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'request_id'); ?>
					<?php echo $form->textField($model,'request_id'),array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'status'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'status'); ?>
					<?php echo $form->textField($model,'status'),array('class'=>'form-control')); ?>
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