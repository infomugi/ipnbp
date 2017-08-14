<?php
/* @var $this RequestScheduleController */
/* @var $schedule RequestSchedule */
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

		<?php echo $form->errorSummary($schedule, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-lg-7"> 


			<div class="form-group">

				<div class="col-sm-3 control-label">
					<?php echo $form->labelEx($schedule,'testing_id'); ?>
				</div>   

				<div class="col-sm-9">
					<?php echo $form->error($schedule,'testing_id'); ?>
					<?php 
					echo $form->dropDownList($schedule, "testing_id",
						CHtml::listData(RequestTesting::model()->findall(array('condition'=>'status=1 AND request_id='.$request_id)),
							'id_testing', 'testing_type'
							),
						array("empty"=>"-- Pilih Tahapan Pengujian --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div> 

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'testing_number'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'testing_number'); ?>
						<?php echo $form->dropDownList($schedule,'testing_number',array(''=>'-- Pilih Sample Pengujian --','1'=>'Sample 1','2'=>'Sample 2','3'=>'Sample 3'),array('class'=>'select2 form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'task'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'task'); ?>
						<?php echo $form->textField($schedule,'task',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'cost'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'cost'); ?>
						<?php echo $form->textField($schedule,'cost',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'start_date'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'start_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($schedule,'start_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  




				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'end_date'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'end_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($schedule,'end_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'description'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'description'); ?>
						<?php echo $form->textArea($schedule,'description',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'note'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'note'); ?>
						<?php echo $form->textArea($schedule,'note',array('class'=>'form-control')); ?>
					</div>

				</div>  







				<div class="form-group">
					<div class="col-md-12">  
						<?php echo CHtml::submitButton($schedule->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>



			</div>

			<div class="col-lg-5"> 

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($schedule,'file'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($schedule,'file'); ?>
						<?php echo $form->fileField($schedule,'file',array('class'=>'btn btn-info')); ?>
					</div>

				</div>  




				<?php $this->endWidget(); ?>

			</div>
		</div>
		<!-- form -->


		<h4>Data Penjadwalan Pengujian</h4>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'schedule-grid',
			'dataProvider'=>$dataSchedule,
				// 'filter'=>$model,	
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

					// array(
					// 	'header'=>'No',
					// 	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					// 	'htmlOptions'=>array('width'=>'10px', 
					// 		'style' => 'text-align: center;')),

				'start_date',
				'end_date',
				'description',
				'note',

				array(	
					'name'=>'status',
					'filter'=>array('0'=>'Disable','1'=>'Enable'),
					'value'=>'Users::model()->status($data->status)',
					),

				array(
					'class'=>'CButtonColumn',
					'template'=>'{update}{delete}',
					'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'update'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestschedule/update", array("id"=>$data->id_schedule))',
							),
						'delete'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestschedule/delete", array("id"=>$data->id_schedule))',
							),
						),
					),
				),
				)); ?>