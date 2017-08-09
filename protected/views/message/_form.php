<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'message-form',
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
					<?php echo $form->labelEx($model,'title'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'title'); ?>
					<?php echo $form->textField($model,'title',array('class'=>'form-control')); ?>
				</div>

			</div>  


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
					<?php echo $form->labelEx($model,'email'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'message'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'message'); ?>
					<?php echo $form->textArea($model,'message',array('class'=>'form-control')); ?>
				</div>
			</div>  

			<div class="form-group">
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'captcha'); ?>
				</div>
				<div class="col-sm-8">
					<?php 
					$this->widget('CCaptcha', array('captchaAction'=>'site/index/captcha'));
					?>
					<?php echo $form->error($model,'captcha'); ?>
					<?php echo $form->textField($model,'captcha'); ?>
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