<?php
/* @var $this QuesionerweightController */
/* @var $model QuesionerWeight */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'quesioner-weight-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'name'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'name'); ?>
					<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'weight'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'weight'); ?>
					<?php echo $form->textField($model,'weight',array('class'=>'form-control')); ?>
				</div>
				
			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'type'); ?>
				</div>   

				<div class="col-sm-8 be-radio">
					<?php echo $form->error($model,'type'); ?>
					<?php
					echo $form->radioButtonList($model,'type',
						array('1'=>'Pengujian','2'=>'Advis Teknis','3'=>'Sertifikasi'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'style'=>'padding-right:20px;margin-left:15px'),

							)                              
						);
						?>

					</div>
				</div>


				<div class="form-group">
					<div class="col-md-12">  
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>

</div></div><!-- form -->