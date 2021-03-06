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
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($schedule, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($schedule,'testing_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php 
					echo $form->dropDownList($schedule, "testing_id",
						CHtml::encodeArray(CHtml::listData(RequestTesting::model()->findall(array('condition'=>'status=1 AND request_id='.$request_id.' AND testing_part='.YII::app()->user->record->division)), 'id_testing', 'request')),
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
									$("#RequestSchedule_testing_part").val(data.part_id);
									$("#testing_lab").val(data.testing_lab);
									$("#testing_type").val(data.testing_type);
									$("#testing_part").val(data.testing_part);
									$("#RequestSchedule_testing_number").val(data.testing_number);
									$("#testing_total").val(data.testing_total);
									$("#testing_cost").val(data.testing_cost);
									$("#RequestSchedule_cost").val(data.testing_price);
									$("#RequestSchedule_task").focus();
								}',),							
							)
						); 
						?> 
						<?php echo $form->error($schedule,'testing_id'); ?>
					</div>


				</div> 

				<div class="form-group" style="display:none;">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'testing_type'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" name="" id="testing_type" class="form-control" readonly="true">
						<?php echo $form->error($schedule,'testing_type'); ?>
						<div>
							<?php echo $form->textField($schedule,'testing_type',array('class'=>'form-control')); ?>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						Balai
					</div>   

					<div class="col-sm-8">
						<input type="text" name="" id="testing_part" class="form-control" readonly="true">
						<div  style="display:none;">
							<?php echo $form->textField($schedule,'testing_part',array('class'=>'form-control')); ?>
						</div>
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						Kategori
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


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'testing_number'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($schedule,'testing_number',array('class'=>'form-control','readonly'=>true)); ?>
						<?php echo $form->error($schedule,'testing_number'); ?>
						<?php 
						// echo $form->dropDownList($schedule,'testing_number',array(''=>'-- Pilih Sample Pengujian --','1'=>'Sample 1','2'=>'Sample 2','3'=>'Sample 3'),array('class'=>'select2 form-control')); 
						?>
					</div>

				</div>  				


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'task'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($schedule,'task',array('class'=>'form-control')); ?>
						<?php echo $form->error($schedule,'task'); ?>
					</div>

				</div> 


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'cost'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($schedule,'cost',array('class'=>'form-control')); ?>
						<?php echo $form->error($schedule,'cost'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'start_date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($schedule,'start_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($schedule,'start_date'); ?>
					</div>

				</div>  




				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'end_date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($schedule,'end_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($schedule,'end_date'); ?>
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'note'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textArea($schedule,'note',array('class'=>'form-control')); ?>
						<?php echo $form->error($schedule,'note'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($schedule,'file'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->fileField($schedule,'file',array('class'=>'btn btn-info')); ?>
						<?php echo $form->error($schedule,'file'); ?>
					</div>




					<div class="form-group">
						<div class="col-md-12">  
							<?php echo CHtml::submitButton($schedule->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
						</div>
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

				array(	
					'name'=>'testing_type',
					'value'=>'$data->Testing->name',
					),

				array(	
					'name'=>'testing_number',
					'value'=>'RequestSchedule::model()->testingNumber($data->testing_number)',
					),

				array(	
					'header'=>'Jadwal',
					'value'=>'Request::model()->date($data->start_date)." s/d ".Request::model()->date($data->end_date)',
					),

				// 'start_date',
				// 'end_date',
				'task',

				array(	
					'name'=>'cost',
					'value'=>'Request::model()->rupiah($data->cost)',
					),

				'note',

				// array(      
				// 	'class'=>'CLinkColumn',      
				// 	'header'=>'File RAB',      
				// 	'label'=>'Download',  
				// 	'visible'=>'$data->file!=NULL',
				// 	'urlExpression'=>'Yii::app()->request->baseUrl."/image/files/schedule/".$data["file"]',      
				// 	), 


				array(
					'header'=>'Download File RAB',      
					'class'=>'CButtonColumn',
					'template'=>'{RAB}',
					'htmlOptions'=>array('width'=>'75px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'RAB'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestschedule/downloadrab", array("id"=>$data->id_schedule))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/spk.png',
							'visible'=>'$data->file!=NULL',
							),
						),
					),		


				array(
					'header'=>'Upload',      
					'class'=>'CButtonColumn',
					'template'=>'{Upload}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Upload'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestschedule/upload", array("id"=>$data->id_schedule))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload.png',
							// 'visible'=>'$data->file!=NULL',
							),
						),
					),
				

				// 'description',
				// 'note',

				// array(	
				// 	'name'=>'status',
				// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
				// 	'value'=>'Users::model()->status($data->status)',
				// 	),

				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{update}{delete}',
					'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'view'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestschedule/view", array("id"=>$data->id_schedule))',
							),
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