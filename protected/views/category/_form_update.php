<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'category-form',
			'enableAjaxValidation' => false,
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
					<?php echo $form->textField($model,'name',array('class'=>'form-control','placeHolder'=>'Category Name')); ?>
				</div>
				
			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'description'); ?>
					<?php echo $form->textArea($model,'description',array('class'=>'form-control','placeHolder'=>'Description')); ?>
				</div>

			</div>  


			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'icon'); ?>
				</div>   

				<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-btn">
							<a href="<?php echo Yii::app()->baseUrl; ?>/site/icon"  class="btn waves-effect waves-light btn-primary"/><i class="fa fa-search"></i></a>
							</span>
							<?php echo $form->error($model,'icon'); ?>
							<?php echo $form->textField($model,'icon',array('class'=>'form-control','placeholder'=>'Icon ')); ?>
						</div>
					</div>	
				
			</div>  


			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'status'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'status'); ?>
					<?php
					echo $form->radioButtonList($model,'status',
						array('1'=>'Enable','0'=>'Disable'),
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

			</div>
		</div><!-- form -->

		<div class="panel-footer text-right">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			<BR><BR>
			</div>

			<?php $this->endWidget(); ?>
