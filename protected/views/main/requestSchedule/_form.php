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
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div style="display:none">
				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'testing_id'); ?>
						<?php 
						echo $form->dropDownList($model, "testing_id",
							CHtml::encodeArray(CHtml::listData(RequestTesting::model()->findall(array('condition'=>'status=1 AND request_id='.$model->request_id)), 'id_testing', 'request')),
							array(
								"empty"=>"- Pilih Jenis Pengujian -", 
								'class'=>'form-control select2',
								'ajax' => array(
									'type'=>'POST',
									'dataType'=>'json',
									'url'=>CController::createUrl('main/requestschedule/search'),
									'data' => "js:{data:$(this).val()}",
									'success'=>'function(data){
										$("#RequestSchedule_testing_id").val(data.id_testing);
										$("#RequestSchedule_testing_type").val(data.id_type);
										$("#testing_lab").val(data.testing_lab);
										$("#testing_type").val(data.testing_type);
										$("#testing_part").val(data.testing_part);
										$("#RequestSchedule_testing_number").val(data.testing_number);
										$("#testing_total").val(data.testing_total);
										$("#RequestSchedule_task").focus();
									}',),							
								)
							); 
							?> 
						</div>


					</div> 


					<div class="form-group" style="display:none;">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'testing_type'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'testing_type'); ?>
							<input type="text" name="" id="testing_type" class="form-control" readonly="true">
							<div>
								<?php echo $form->textField($model,'testing_type',array('class'=>'form-control')); ?>
							</div>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							Balai
						</div>   

						<div class="col-sm-8">
							<input type="text" name="" id="testing_part" class="form-control" readonly="true">
						</div>

					</div>  



					<div class="form-group">

						<div class="col-sm-4 control-label">
							Lab
						</div>   

						<div class="col-sm-8">
							<input type="text" name="" id="testing_lab" class="form-control" readonly="true">

						</div>  
					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							Total Sample
						</div>   

						<div class="col-sm-8">
							<input type="text" name="" id="testing_total" class="form-control" readonly="true">
						</div>

					</div>  
				</div>			


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_number'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'testing_number'); ?>
						<?php echo $form->textField($model,'testing_number',array('class'=>'form-control','readonly'=>true)); ?>
						<?php 
						// echo $form->dropDownList($model,'testing_number',array(''=>'-- Pilih Sample Pengujian --','1'=>'Sample 1','2'=>'Sample 2','3'=>'Sample 3'),array('class'=>'select2 form-control')); 
						?>
					</div>

				</div>  	


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'task'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'task'); ?>
						<?php echo $form->textField($model,'task',array('class'=>'form-control')); ?>
					</div>

				</div> 


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'cost'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'cost'); ?>
						<?php echo $form->textField($model,'cost',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'start_date'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'start_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'start_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  




				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'end_date'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'end_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'end_date',array('class'=>'form-control')); ?>
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
						<?php echo $form->labelEx($model,'note'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'note'); ?>
						<?php echo $form->textArea($model,'note',array('class'=>'form-control')); ?>
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

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'status'); ?>
					</div>   

					<div class="col-sm-8 be-radio">
						<?php echo $form->error($model,'status'); ?>
						<?php
						echo $form->radioButtonList($model,'status',
							array('1'=>'Start','2'=>'In Progress','3'=>'Close'),
							array(
								'template'=>'{input}{label}',
								'separator'=>'',
								'labelOptions'=>array(
									'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:5px'),

								)                              
							);
							?>
						</div>

					</div>  



					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'status_schedule'); ?>
						</div>   

						<div class="col-sm-8 be-radio">
							<?php echo $form->error($model,'status_schedule'); ?>
							<?php
							echo $form->radioButtonList($model,'status_schedule',
								array('1'=>'Revisi','2'=>'Fix'),
								array(
									'template'=>'{input}{label}',
									'separator'=>'',
									'labelOptions'=>array(
										'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:5px'),

									)                              
								);
								?>
							</div>

						</div>  




						<div class="form-group">
							<div class="col-md-12">  
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
							</div>
						</div>



					</div>





					<?php $this->endWidget(); ?>

				</div>
			</div>
			<!-- form -->

