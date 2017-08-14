<?php
/* @var $this RequestScheduleController */
/* @var $model RequestSchedule */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-schedule-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-lg-7"> 


			<div class="form-group">

				<div class="col-sm-3 control-label">
					<?php echo $form->labelEx($model,'testing_id'); ?>
				</div>   

				<div class="col-sm-9">
					<?php echo $form->error($model,'testing_id'); ?>
					<?php 
					echo $form->dropDownList($model, "testing_id",
						CHtml::listData(RequestTesting::model()->findall(array('condition'=>'status=1 AND request_id='.$model->request_id)),
							'id_testing', 'testing_type'
							),
						array("empty"=>"-- Pilih Tahapan Pengujian --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div> 

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'testing_number'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'testing_number'); ?>
						<?php echo $form->dropDownList($model,'testing_number',array(''=>'-- Pilih Sample Pengujian --','1'=>'Sample 1','2'=>'Sample 2','3'=>'Sample 3'),array('class'=>'select2 form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'task'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'task'); ?>
						<?php echo $form->textField($model,'task',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'cost'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'cost'); ?>
						<?php echo $form->textField($model,'cost',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'start_date'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'start_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'start_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  




				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'end_date'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'end_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'end_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'description'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'description'); ?>
						<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'note'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'note'); ?>
						<?php echo $form->textArea($model,'note',array('class'=>'form-control')); ?>
					</div>

				</div>  







				<div class="form-group">
					<div class="col-md-12">  
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>



			</div>

			<div class="col-lg-5"> 

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'file'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($model,'file'); ?>
						<?php echo $form->fileField($model,'file',array('class'=>'btn btn-info')); ?>
					</div>

				</div>  




				<?php $this->endWidget(); ?>

			</div>
		</div>
		<!-- form -->

