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


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'upload_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'upload_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'upload_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'accept_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'accept_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'accept_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'report_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'report_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'report_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'send_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'send_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'send_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
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
					<?php echo $form->labelEx($model,'description_email'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'description_email'); ?>
					<?php echo $form->textArea($model,'description_email',array('class'=>'form-control')); ?>
				</div>

			</div>  


			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'file'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'file'); ?>
					<?php echo $form->fileField($model,'file',array('class'=>'btn btn-info')); ?>
				</div>

			</div>  



			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div></div><!-- form -->

