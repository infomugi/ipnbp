<?php
/* @var $this RequestPaymentController */
/* @var $payment RequestPayment */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-payment-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($payment, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($payment,'invoice_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php 
					echo $form->dropDownList($payment, "invoice_id",
						CHtml::encodeArray(CHtml::listData(RequestInvoice::model()->findall(array('condition'=>'balance!=0 AND status=1 AND request_id='.$request_id)), 'id_invoice', 'code')),
						array(
							"empty"=>"- Pilih Nomor Invoice -", 
							'class'=>'form-control select2',
							'ajax' => array(
								'type'=>'POST',
								'dataType'=>'json',
								'url'=>CController::createUrl('main/requestpayment/search'),
								'data' => "js:{data:$(this).val()}",
								'success'=>'function(data){
									$("#RequestPayment_invoice_id").val(data.id_invoice);
									$("#code").val(data.code);
									$("#balance").val(data.balance);
									$("#total").val(data.total);
									$("#RequestSchedule_task").focus();
								}',),							
							)
						); 
						?> 
						<?php echo $form->error($payment,'invoice_id'); ?>
					</div>

				</div> 			



				<div class="form-group">

					<div class="col-sm-4 control-label">
						No. Invoice
					</div>   

					<div class="col-sm-8">
						<input type="text" name="" id="code" class="form-control" readonly="true">
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						Total Pembayaran
					</div>   

					<div class="col-sm-8">
						<input type="text" name="" id="total" class="form-control" readonly="true">
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						Sisa Pembayaran
					</div>   

					<div class="col-sm-8">
						<input type="text" name="" id="balance" class="form-control" readonly="true">
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'code'); ?>
					</div>   

					<div class="col-sm-8">
						<?php $this->widget('CMaskedTextField',array('model'=>$payment,'attribute'=>'code','mask'=>'KU.99.99/KWT-PNBP/LP/999','htmlOptions'=>array('class'=>'form-control')));
						?>
						<?php echo $form->error($payment,'code'); ?>
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($payment,'date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($payment,'date'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'term'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->dropDownList($payment,'term',array(''=>'-- Pilih Termin --','6'=>'Lunas','1'=>'Termin Ke-1','2'=>'Termin Ke-2','3'=>'Termin Ke-3','4'=>'Termin Ke-4','5'=>'Termin Ke-5'),array('class'=>'select2 form-control')); ?>
						<?php echo $form->error($payment,'term'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'total'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($payment,'total',array('id'=>'nominal2','class'=>'form-control','onkeyup'=>'terbilang2();')); ?>
						<?php echo $form->error($payment,'total'); ?>
					</div>

				</div>  


				<div class="form-group" id="terbilang_payment">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'terbilang'); ?>
					</div>   

					<div class="col-sm-8">
						<div id="terbilang2" class="alert alert-success"></div>
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'file'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->fileField($payment,'file',array('class'=>'btn btn-info')); ?>
						<?php echo $form->error($payment,'file'); ?>
					</div>

				</div>   


				<div class="form-group">
					<div class="col-md-12">  
					</br></br>
					<?php echo CHtml::submitButton($payment->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div></div><!-- form -->

		<h4>Data Pembayaran</h4>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'payment-grid',
			'dataProvider'=>$dataPayment,
		// 'filter'=>$model,
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				'code',
				'date',
				array('name'=>'term','value'=>'RequestPayment::model()->term($data->term)'),



				array(	
					'name'=>'total',
					'value'=>'Request::model()->rupiah($data->total)',
					),

				// 'balance',

				array(	
					'name'=>'balance',
					'value'=>'Request::model()->rupiah($data->balance)',
					),	

				array(
					'header'=>'Print',      
					'class'=>'CButtonColumn',
					'template'=>'{Print}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Print'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/print", array("id"=>$data->id_payment))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/print.png',
							),
						),
					),			

				array(
					'header'=>'Kirim Email (Kwintansi)',      
					'class'=>'CButtonColumn',
					'template'=>'{Send}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Send'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/send", array("id"=>$data->id_payment))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
							),
						),
					),						

				array(
					'header'=>'Download',      
					'class'=>'CButtonColumn',
					'template'=>'{File Kwintansi}{Bukti Pembayaran}',
					'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'File Kwintansi'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/downloadpayment", array("id"=>$data->id_payment))', 
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
							'visible'=>'$data->file_payment!=NULL',
							),
						'Bukti Pembayaran'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/download", array("id"=>$data->id_payment))', 
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/spk.png',
							'visible'=>'$data->file!=NULL',
							),

						),
					),


				array(
					'header'=>'Upload',      
					'class'=>'CButtonColumn',
					'template'=>'{Upload Kuitansi}{Upload Bukti Pembayaran}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Upload Kuitansi'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/uploadpayment", array("id"=>$data->id_payment))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload.png',
							'visible'=>'$data->print_by!=NULL',
							),
						'Upload Bukti Pembayaran'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/upload", array("id"=>$data->id_payment))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload_file.png',
							'visible'=>'$data->print_by!=NULL',
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
							'url'=>'Yii::app()->createUrl("main/requestpayment/view", array("id"=>$data->id_payment))',
							),
						'update'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/update", array("id"=>$data->id_payment))',
							),
						'delete'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestpayment/delete", array("id"=>$data->id_payment))',
							),
						),
					),
				),
				)); ?>