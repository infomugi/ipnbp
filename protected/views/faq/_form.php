<?php
/* @var $this FaqController */
/* @var $model Faq */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'faq-form',
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
							<?php echo $form->labelEx($model,'created_date'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'created_date'); ?>
							<?php echo $form->textField($model,'created_date',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'update_date'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'update_date'); ?>
							<?php echo $form->textField($model,'update_date',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question'); ?>
							<?php echo $form->textArea($model,'question',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'answer'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'answer'); ?>
							<?php echo $form->textArea($model,'answer',array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'category_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'category_id'); ?>
							<?php echo $form->textField($model,'category_id',array('class'=>'form-control')); ?>
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