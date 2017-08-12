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
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php echo $form->errorSummary($invoice, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-lg-9 col-md-10"> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'code'); ?>
					<?php echo $form->textField($invoice,'code',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($invoice,'date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'description'); ?>
					<?php echo $form->textArea($invoice,'description',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'total'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'total'); ?>
					<?php echo $form->textField($invoice,'total',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'terbilang'); ?>
				</div>   

				<div class="col-sm-8">
					<input type="text" class="form-control" disabled="true">
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'note'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'note'); ?>
					<?php echo $form->textArea($invoice,'note',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($invoice,'signature_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($invoice,'signature_id'); ?>
					<?php 
					echo $form->dropDownList($invoice, "signature_id",
						CHtml::listData(Users::model()->findall(array('condition'=>'status=1')),
							'id_user', 'first_name'
							),
						array("empty"=>"-- Pilih Penandatangan --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'file_invoice'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($invoice,'file_invoice'); ?>
						<?php echo $form->fileField($invoice,'file_invoice',array('class'=>'btn btn-info')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($invoice,'file_spk'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($invoice,'file_spk'); ?>
						<?php echo $form->fileField($invoice,'file_spk',array('class'=>'btn btn-info')); ?>
					</div>

				</div>  


				<div class="form-group">
					<div class="col-md-12">  
					</br></br>
					<?php echo CHtml::submitButton($invoice->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div></div><!-- form -->


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
				'total',
				// 'note',
				
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
							'url'=>'Yii::app()->createUrl("requestinvoice/update", array("id"=>$data->id_invoice))',
							),
						'delete'=>
						array(
							'url'=>'Yii::app()->createUrl("requestinvoice/delete", array("id"=>$data->id_invoice))',
							),
						),
					),
				),
				)); ?>