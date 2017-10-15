<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */
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
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'code'); ?>
					<?php echo $form->textField($model,'code',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'date',array('class'=>'form-control')); ?>
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
					<?php echo $form->labelEx($model,'total'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'total'); ?>
					<?php echo $form->textField($model,'total',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'terbilang'); ?>
				</div>   

				<div class="col-sm-8">
					<input type="text" class="form-control" disabled="true">
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
					<?php echo $form->labelEx($model,'signature_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'signature_id'); ?>
					<?php 
					echo $form->dropDownList($model, "signature_id",
						CHtml::listData(Unit::model()->findall(array('condition'=>'id_unit=6 OR id_unit=1')),
							'id_unit', 'address'
							),
						array("empty"=>"-- Pilih Penandatangan --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  



				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'spk_no'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($model,'spk_no',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'spk_no'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'spk_date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'spk_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($model,'spk_date'); ?>
					</div>

				</div>  



				<div class="form-group">
					<div class="col-md-12">  
					</br></br>
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div>
	</div><!-- form -->

