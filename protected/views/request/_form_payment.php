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
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($payment, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($payment,'invoice_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($payment,'invoice_id'); ?>
					<?php 
					echo $form->dropDownList($payment, "invoice_id",
						CHtml::listData(RequestInvoice::model()->findall(array('condition'=>'status=1 AND request_id='.$request_id)),
							'id_invoice', 'code'
							),
						array("empty"=>"-- Pilih Nomor Invoice --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div> 			



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'code'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($payment,'code'); ?>
						<?php echo $form->textField($payment,'code',array('class'=>'form-control')); ?>
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'date'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($payment,'date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($payment,'date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'term'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($payment,'term'); ?>
						<?php echo $form->dropDownList($payment,'term',array(''=>'-- Pilih Termin --','1'=>'Termin Ke-1','2'=>'Termin Ke-2','3'=>'Termin Ke-3'),array('class'=>'select2 form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'total'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($payment,'total'); ?>
						<?php echo $form->textField($payment,'total',array('class'=>'form-control')); ?>
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'terbilang'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true">
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($payment,'file'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($payment,'file'); ?>
						<?php echo $form->fileField($payment,'file',array('class'=>'btn btn-info')); ?>
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
					'header'=>'No Revisi',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				'code',
				'date',
				array('name'=>'term','value'=>'RequestPayment::model()->term($data->term)'),
				'total',

				array(      
					'class'=>'CLinkColumn',      
					'header'=>'Bukti Pembayaran',      
					'label'=>'Download',  
					'urlExpression'=>'Yii::app()->request->baseUrl."/image/files/payment/".$data["file"]',      
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