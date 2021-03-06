<?php
/* @var $this RequestReportController */
/* @var $report RequestReport */
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

		<?php //echo $form->errorSummary($report, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'upload_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'upload_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'upload_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'accept_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'accept_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'accept_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'report_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'report_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'report_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'send_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'send_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'send_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'description'); ?>
					<?php echo $form->textArea($report,'description',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'description_email'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'description_email'); ?>
					<?php echo $form->textArea($report,'description_email',array('class'=>'form-control')); ?>
				</div>

			</div>  


			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'file'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'file'); ?>
					<?php echo $form->fileField($report,'file',array('class'=>'btn btn-info')); ?>
				</div>

			</div>  



			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($report->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div></div><!-- form -->


		<h4>Data Permohonan Pengujian</h4>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'report-grid',
			'dataProvider'=>$dataReport,
				// 'filter'=>$model,	
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				array(	
					'name'=>'upload_date',
					'value'=>'Request::model()->timeNull($data->upload_date)',
					),

				array(	
					'name'=>'accept_date',
					'value'=>'Request::model()->timeNull($data->accept_date)',
					),


				'description',

				array(	
					'name'=>'delivery',
					'value'=>'RequestReport::model()->delivery($data->delivery)',
					),

				array(
					'header'=>'Kirim Email (Konfirmasi)',      
					'class'=>'CButtonColumn',
					'template'=>'{Confirmation}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Confirmation'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/sendconfirmation", array("id"=>$data->id_report))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
							'options'=>array(
								'ajax'=>array(
									'type'=>'POST',
									'url'=>"js:$(this).attr('href')",
									'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
									),
								),
							),
						),
					),			

				array(
					'header'=>'Download Laporan',      
					'class'=>'CButtonColumn',
					'template'=>'{File}',
					'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'File'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/download", array("id"=>$data->id_report))', 
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
							'visible'=>'$data->file!=NULL',
							),

						),
					),

				array(
					'header'=>'Kirim Email (Laporan)',      
					'class'=>'CButtonColumn',
					'template'=>'{Send}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Send'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/send", array("id"=>$data->id_report))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
							),
						),
					),	

				array(
					'header'=>'Kirim Email (Kuesioner)',      
					'class'=>'CButtonColumn',
					'template'=>'{Quesioner}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Quesioner'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/sendquesioner", array("id"=>$data->id_report))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/kuesioner.png',
							),
						),
					),


				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{update}{delete}',
					'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'view'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/view", array("id"=>$data->id_report))',
							),
						'update'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/update", array("id"=>$data->id_report))',
							),
						'delete'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestreport/delete", array("id"=>$data->id_report))',
							),
						),
					),
				),
				)); ?>


				<div id="viewModal" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
					<div class="modal-dialog full-width">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
								<h3 class="modal-title">Kirim Email Konfirmasi</h3>
							</div>
							<div class="modal-body">
								<p>Loading...</p>
							</div>
						</div>
					</div>
				</div>


