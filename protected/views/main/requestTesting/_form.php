<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-testing-form',
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
					<?php echo $form->labelEx($model,'testing_part'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'testing_part'); ?>
					<?php 
					echo $form->dropDownList($model, "testing_part",
						CHtml::listData(Unit::model()->findall(array('condition'=>'status=1 AND type=1')),
							'id_unit', 'name'
							),
						array("empty"=>"-- Pilih Balai --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_type'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'testing_type'); ?>
						<?php 
						echo $form->dropDownList($model, "testing_type",
							CHtml::listData(Testing::model()->findall(array('condition'=>'status=1')),
								'id_testing', 'name'
								),
							array("empty"=>"-- Pilih Jenis Pengujian --", 'class'=>'select2 form-control')
							); 
							?> 
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'testing_lab'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'testing_lab'); ?>
							<?php 
							echo $form->dropDownList($model, "testing_lab",
								CHtml::listData(Unit::model()->findall(array('condition'=>'status=1 AND type=2')),
									'id_unit', 'name'
									),
								array("empty"=>"-- Pilih Lab Pengujian --", 'class'=>'select2 form-control')
								); 
								?> 
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