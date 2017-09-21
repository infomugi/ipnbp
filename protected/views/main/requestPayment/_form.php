<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */
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

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'code'); ?>
					<?php $this->widget('CMaskedTextField',array('model'=>$model,'attribute'=>'code','mask'=>'KU.99.99/KWT-PNBP/LP/999','htmlOptions'=>array('class'=>'form-control')));
					?>
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
					<?php echo $form->labelEx($model,'term'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'term'); ?>
					<?php echo $form->dropDownList($model,'term',array(''=>'-- Pilih Termin --','1'=>'Termin Ke-1','2'=>'Termin Ke-2','3'=>'Termin Ke-3','4'=>'Termin Ke-4','5'=>'Termin Ke-5'),array('class'=>'select2 form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'total'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'total'); ?>
					<?php echo $form->textField($model,'total',array('id'=>'nominal2','class'=>'form-control','onkeyup'=>'terbilang2();','readOnly'=>true)); ?>
				</div>

			</div>  


			<div class="form-group" id="terbilang_payment">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'terbilang'); ?>
				</div>   

				<div class="col-sm-8">
					<div id="terbilang2" class="alert alert-success"></div>
				</div>

			</div>  



			<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

	</div></div><!-- form -->
