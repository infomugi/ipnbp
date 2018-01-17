<?php
/* @var $this CompanyController */
/* @var $company Company */
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

		<?php echo $form->errorSummary($company, null, null, array('class' => 'alert alert-warning')); ?>

		
		<div class="col-md-12"> 


			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'name'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'name'); ?>
					<?php echo $form->textField($company,'name',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'address'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'address'); ?>
					<?php echo $form->textArea($company,'address',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'email'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'email'); ?>
					<?php echo $form->textField($company,'email',array('class'=>'form-control')); ?>
				</div>
				
			</div>  


			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'email_second'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'email_second'); ?>
					<?php echo $form->textField($company,'email_second',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'phone'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'phone'); ?>
					<?php echo $form->textField($company,'phone',array('class'=>'form-control')); ?>
				</div>
				
			</div> 


			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'phone_second'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'phone_second'); ?>
					<?php echo $form->textField($company,'phone_second',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'faximile'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'faximile'); ?>
					<?php echo $form->textField($company,'faximile',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'postal_code'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'postal_code'); ?>
					<?php echo $form->textField($company,'postal_code',array('class'=>'form-control')); ?>
				</div>
				
			</div>  

			<div class="form-group">

				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'province'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'province'); ?>
					<?php echo $form->textField($company,'province',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'city'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'city'); ?>
					<?php echo $form->textField($company,'city',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-md-3 control-label">
					<?php echo $form->labelEx($company,'category_id'); ?>
				</div>   

				<div class="col-md-9">
					<?php echo $form->error($company,'category_id'); ?>
					<?php 
					echo $form->dropDownList($company, "category_id",
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
					<?php echo CHtml::submitButton($company->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

</div></div><!-- form -->