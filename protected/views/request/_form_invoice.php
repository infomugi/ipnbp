<?php
/* @var $this RequestInvoiceController */
/* @var $invoice RequestInvoice */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-invoice-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($invoice, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'testing_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php 
					echo $form->dropDownList($invoice, "testing_id",
						CHtml::encodeArray(CHtml::listData(RequestTesting::model()->findall(array('condition'=>'status=1 AND request_id='.$request_id)), 'id_testing', 'request')),
						array(
							"empty"=>"- Pilih Jenis Pengujian -", 
							'class'=>'form-control select2',
							'ajax' => array(
								'type'=>'POST',
								'dataType'=>'json',
								'url'=>CController::createUrl('main/requestschedule/search'),
								'data' => "js:{data:$(this).val()}",
								'success'=>'function(data){
									$("#RequestInvoice_testing_id").val(data.id_testing);
									$("#RequestInvoice_description").val(data.testing_type);
									$("#part_id").val(data.part_id);

									if($("#part_id").val()==0){
										$("#RequestInvoice_spk_no").val("");
									}
									if($("#part_id").val()==8){
										jQuery("#RequestInvoice_spk_no").mask("99/KS/PNBP/AMPLP/LP/"+new Date().getFullYear() );
									}
									if($("#part_id").val()==9){
										jQuery("#RequestInvoice_spk_no").mask("99/KS/PNBP/LP/LP/"+new Date().getFullYear() );
									}
									if($("#part_id").val()==10){
										jQuery("#RequestInvoice_spk_no").mask("99/KS/PNBP/SAINS/LP/"+new Date().getFullYear() );
									}
									if($("#part_id").val()==11){
										jQuery("#RequestInvoice_spk_no").mask("99/KS/SKB/SKB/LP/"+new Date().getFullYear() );
									}
									$("#RequestInvoice_code").focus();
								}',),							
							)
						); 
						?> 
						<?php echo $form->error($invoice,'testing_id'); ?>
					</div>


				</div> 


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'code'); ?>
					</div>   

					<div class="col-sm-8">
						<?php $this->widget('CMaskedTextField',array('model'=>$invoice,'attribute'=>'code','mask'=>'KU.99.99/INV-PNBP/LP/999','htmlOptions'=>array('class'=>'form-control')));
						?>
						<?php echo $form->error($invoice,'code'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($invoice,'date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($invoice,'date'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'description'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textArea($invoice,'description',array('class'=>'form-control')); ?>
						<?php echo $form->error($invoice,'description'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'total'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($invoice,'total',array('id'=>'nominal1','class'=>'form-control','onkeyup'=>'terbilang1();')); ?>
						<?php echo $form->error($invoice,'total'); ?>
					</div>

				</div>  


				<div class="form-group" id="terbilang_invoice">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'terbilang'); ?>
					</div>   

					<div class="col-sm-8">
						<div id="terbilang1" class="alert alert-success"></div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'note'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textArea($invoice,'note',array('class'=>'form-control')); ?>
						<?php echo $form->error($invoice,'note'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'signature_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php 
						echo $form->dropDownList($invoice, "signature_id",
							CHtml::listData(Unit::model()->findall(array('condition'=>'id_unit=6 OR id_unit=1')),
								'id_unit', 'address'
								),
							array("empty"=>"-- Pilih Penandatangan --", 'class'=>'select2 form-control')
							); 
							?> 
							<?php echo $form->error($invoice,'signature_id'); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($invoice,'file_invoice'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->fileField($invoice,'file_invoice',array('class'=>'btn btn-info')); ?>
							<?php echo $form->error($invoice,'file_invoice'); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($invoice,'file_spk'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->fileField($invoice,'file_spk',array('class'=>'btn btn-info')); ?>
							<?php echo $form->error($invoice,'file_spk'); ?>
						</div>

					</div>  



					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($invoice,'spk_no'); ?>
						</div>   

						<div class="col-sm-8">
							<input type="text" style="display:none;" id="part_id" class="form-control" name="">

							<?php echo $form->textField($invoice,'spk_no',array('class'=>'form-control')); ?>
							<?php echo $form->error($invoice,'spk_no'); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($invoice,'spk_date'); ?>
						</div>   

						<div class="col-sm-8">
							<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
								<?php echo $form->textField($invoice,'spk_date',array('class'=>'form-control')); ?>
								<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
							</div>
							<?php echo $form->error($invoice,'spk_date'); ?>
						</div>

					</div>  



					<div class="form-group">
						<div class="col-md-12">  
						</br></br>
						<?php echo CHtml::submitButton($invoice->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>

			</div>
		</div><!-- form -->


		<h4>Data Invoice</h4>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'invoice-grid',
			'dataProvider'=>$dataInvoice,
			// 'filter'=>$model,	
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

					// array(
					// 	'header'=>'No',
					// 	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					// 	'htmlOptions'=>array('width'=>'10px', 
					// 		'style' => 'text-align: center;')),

				'code',
				'date',
				'description',

				array(	
					'name'=>'total',
					'value'=>'Request::model()->rupiah($data->total)',
					),


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
							'url'=>'Yii::app()->createUrl("main/requestinvoice/print", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/print.png',
							),
						),
					),

				array(
					'header'=>'Kirim Email (Invoice)',      
					'class'=>'CButtonColumn',
					'template'=>'{Send}',
					'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Send'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/send", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
							),
						),
					),	



				array(
					'header'=>'Download',      
					'class'=>'CButtonColumn',
					'template'=>'{Invoice}{SPK}',
					'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Invoice'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/downloadinvoice", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
							'visible'=>'$data->file_invoice!=NULL',
							),
						'SPK'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/downloadspk", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/spk.png',
							'visible'=>'$data->file_spk!=NULL',
							),
						),
					),





				array(
					'header'=>'Upload',      
					'class'=>'CButtonColumn',
					'template'=>'{Upload Invoice}{Upload SPK}',
					'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'Upload Invoice'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/uploadinvoice", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload.png',
							'visible'=>'$data->print_by!=NULL',
							),
						'Upload SPK'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/uploadspk", array("id"=>$data->id_invoice))',
							'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload_file.png',
							'visible'=>'$data->print_by!=NULL',
							),
						),
					),

				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{update}{delete}',
					'htmlOptions'=>array('width'=>'250px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'view'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/view", array("id"=>$data->id_invoice))',
							),
						'update'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/update", array("id"=>$data->id_invoice))',
							),
						'delete'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requestinvoice/delete", array("id"=>$data->id_invoice))',
							),
						),
					),
				),
				)); ?>
