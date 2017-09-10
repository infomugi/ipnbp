<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>


<div class="col-lg-9 col-md-10"> 
	<div class="form-normal form-horizontal clearfix">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'disposition_date'); ?>
				</div>   

				<div class="col-sm-8">
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'disposition_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
					<?php echo $form->error($model,'disposition_date'); ?>
				</div>

			</div>  



			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'disposition_to'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'disposition_to'); ?>
					<?php 
					echo $form->dropDownList($model, "disposition_to",
						CHtml::listData(Unit::model()->findall(array('condition'=>'type=1')),
							'id_unit', 'name'
							),
						array("empty"=>"-- Disposisi Ke --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div> 		


				
				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'disposition_letter'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'disposition_letter'); ?>
						<?php echo $form->fileField($model,'disposition_letter',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">
					<div class="col-sm-12">  

						<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>

			</div>
		</div>

