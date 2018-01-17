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
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php //echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

	<!-- 		<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'testing_type'); ?>
				</div>   

				<div class="col-sm-8">
					<?php 
					echo $form->dropDownList($model, "testing_type",
						CHtml::listData(Testing::model()->findall(array('condition'=>'status=1 AND part_id='.YII::app()->user->record->division)),
							'id_testing', 'showTesting'
							),
						// array(),
						array(
							"empty"=>"- Pilih Jenis Pengujian -", 
							'class'=>'form-control select2',
							'ajax' => array(
								'type'=>'POST',
								'dataType'=>'json',
								'url'=>CController::createUrl('main/requesttesting/search'),
								'data' => "js:{data:$(this).val()}",
								'success'=>'function(data){
									$("#name").val(data.name);
									$("#part").val(data.part);
									$("#category").val(data.category);
									$("#time").val(data.time);
									$("#price").val(data.price);
									$("#RequestTesting_testing_type").val(data.id_testing);
									$("#RequestTesting_testing_part").val(data.part_id);
									$("#RequestTesting_testing_lab").val(data.category_id);
									$("#RequestTesting_testing_total").focus();
								}',),							
							)
						); 
						?> 
						<?php echo $form->error($model,'testing_type'); ?>
					</div>

				</div>

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_part'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" id="part" disabled="true">
						<?php echo $form->error($model,'testing_part'); ?>
						<div style="display:none;">
							<?php echo $form->textField($model,'testing_part',array('class'=>'form-control','hidden'=>true)); ?>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_lab'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" id="category" disabled="true">
						<?php echo $form->error($model,'testing_lab'); ?>
						<div style="display:none;">
							<?php echo $form->textField($model,'testing_lab',array('class'=>'form-control','hidden'=>true)); ?>
						</div>
					</div>

				</div> 

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'time'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" id="time" disabled="true">

					</div> 
				</div> 

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'price'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" id="price" disabled="true">
						<?php echo $form->error($model,'price'); ?>

					</div>

				</div> 		
			-->

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'price'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'price'); ?>
					</div>

				</div>  		


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'testing_total'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->textField($model,'testing_total',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'testing_total'); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
					</div>   

					<div class="col-sm-8">

						<?php
						$memberFormConfig = array(
							'elements'=>array(
								'name'=>array(
									'type'=>'text',
									'class'=>'form-control',
									),
								'price'=>array(
									'type'=>'text',
									'class'=>'form-control',
									),
								));

						$this->widget('ext.multimodelform.MultiModelForm',array(
							'id' => 'id_testing', 
							'formConfig' => $memberFormConfig, 
							'model' => $member, 

							'validatedItems' => $validatedMembers,

							'sortAttribute' => 'name',
							'hideCopyTemplate'=>true,
							'clearInputs'=>false,
							'tableView' => true, 
							'addItemAsButton' => false,
							'showAddItemOnError' => false, 

							'fieldsetWrapper' => array('tag' => 'div',
								'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
								),

							'addItemText' => '<div class="btn btn-success"><i class="mdi mdi-plus"></i> Tambah Biaya</div>',
							'removeText' => '<div class="btn btn-lg btn-danger"><i class="mdi mdi-close"></i> Hapus</div>',

							'data' => $member->findAll('request_testing_id=:request_testing_id', array(':request_testing_id'=>$model->id_testing)),
							));
							?>

						</div>

					</div>  

					<div class="form-group">
						<div class="col-md-12">  
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

				</div>
			</div><!-- form -->
