<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">


	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'company-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

		
		
		<div class="col-lg-9 col-md-10"> 

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'company_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'company_code'); ?>
					<?php echo $form->textField($model,'company_code',array('class'=>'form-control')); ?>
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

			
			<div class="form-group" style="display:none;">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'owner'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'owner'); ?>
					<?php echo $form->textField($model,'owner',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'address'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'address'); ?>
					<?php echo $form->textArea($model,'address',array('class'=>'form-control')); ?>
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
					<?php echo $form->labelEx($model,'email_second'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'email_second'); ?>
					<?php echo $form->textField($model,'email_second',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'phone'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'phone'); ?>
					<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
				</div>
				
			</div> 


			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'phone_second'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'phone_second'); ?>
					<?php echo $form->textField($model,'phone_second',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'faximile'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'faximile'); ?>
					<?php echo $form->textField($model,'faximile',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'postal_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'postal_code'); ?>
					<?php echo $form->textField($model,'postal_code',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'province'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'province'); ?>
					<?php echo $form->textField($model,'province',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'city'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'city'); ?>
					<?php echo $form->textField($model,'city',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'category_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'category_id'); ?>
					<?php 
					echo $form->dropDownList($model, "category_id",
						CHtml::listData(Industry::model()->findall(array('condition'=>'status=1')),
							'id_industry', 'description'
							),
						array("empty"=>"-- Industri --", 'class'=>'select2 form-control')
						); 
						?> 
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