<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-quesioner-form',
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
							<?php echo $form->labelEx($model,'created_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'created_id'); ?>
							<?php echo $form->textField($model,'created_id'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'created_date'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'created_date'); ?>
							<?php echo $form->textField($model,'created_date'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'company_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'company_id'); ?>
							<?php echo $form->textField($model,'company_id'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'request_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'request_id'); ?>
							<?php echo $form->textField($model,'request_id'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'report_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'report_id'); ?>
							<?php echo $form->textField($model,'report_id'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'unit'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'unit'); ?>
							<?php echo $form->textField($model,'unit',array('size'=>60,'maxlength'=>255)),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_1'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_1'); ?>
							<?php echo $form->textField($model,'question_1'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_2'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_2'); ?>
							<?php echo $form->textField($model,'question_2'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_3'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_3'); ?>
							<?php echo $form->textField($model,'question_3'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_4'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_4'); ?>
							<?php echo $form->textField($model,'question_4'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_5'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_5'); ?>
							<?php echo $form->textField($model,'question_5'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_6'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_6'); ?>
							<?php echo $form->textField($model,'question_6'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_7'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_7'); ?>
							<?php echo $form->textField($model,'question_7'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_8'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_8'); ?>
							<?php echo $form->textField($model,'question_8'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_9'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_9'); ?>
							<?php echo $form->textField($model,'question_9'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_10'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_10'); ?>
							<?php echo $form->textField($model,'question_10'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_11'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_11'); ?>
							<?php echo $form->textField($model,'question_11'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_12'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_12'); ?>
							<?php echo $form->textField($model,'question_12'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_13'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_13'); ?>
							<?php echo $form->textField($model,'question_13'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_14'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_14'); ?>
							<?php echo $form->textField($model,'question_14'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_15'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_15'); ?>
							<?php echo $form->textField($model,'question_15'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_16'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_16'); ?>
							<?php echo $form->textField($model,'question_16'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_17'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_17'); ?>
							<?php echo $form->textField($model,'question_17'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_18'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_18'); ?>
							<?php echo $form->textField($model,'question_18'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_19'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_19'); ?>
							<?php echo $form->textField($model,'question_19'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_20'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_20'); ?>
							<?php echo $form->textField($model,'question_20'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_21'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_21'); ?>
							<?php echo $form->textField($model,'question_21'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'question_22'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'question_22'); ?>
							<?php echo $form->textField($model,'question_22'),array('class'=>'form-control')); ?>
						</div>
		
				</div>  

				
				<div class="form-group">
	
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'status'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'status'); ?>
							<?php echo $form->textField($model,'status'),array('class'=>'form-control')); ?>
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