<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>


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


		<div class="col-lg-9 col-md-10"> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'code'); ?>
					<?php echo $form->textField($model,'code',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'company_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'company_id'); ?>
					<?php 
					echo $form->dropDownList($model, "company_id",
						CHtml::listData(Company::model()->findall(array('condition'=>'status=1')),
							'id_company', 'name'
							),
						array("empty"=>"-- Perusahaan --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_address'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true" value="<?php echo $model->Company->address; ?>" id="address">
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_email'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true" value="<?php echo $model->Company->email; ?>" id="email">
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_contact'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" value="<?php echo $model->Company->phone; ?>" disabled="true" id="contact">
					</div>

				</div>  								


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'letter_date'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'letter_date'); ?>
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($model,'letter_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'letter_code'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'letter_code'); ?>
						<?php echo $form->textField($model,'letter_code',array('class'=>'form-control')); ?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'letter_subject'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'letter_subject'); ?>
						<?php echo $form->textField($model,'letter_subject',array('class'=>'form-control')); ?>
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
							<?php echo $form->labelEx($model,'color'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'color'); ?>
							<div id="cp2" class="input-group colorpicker-component"><?php echo $form->textField($model,'color',array('class'=>'form-control')); ?><span class="input-group-addon"><i class="fa fa-square"></i></span> 
							</div> 

							
						</div>

					</div>  


					<div class="form-group">
						<div class="col-sm-4">  
							
						</div>
						<div class="col-sm-8">  

							<?php echo CHtml::link('<i class="fa fa-edit"></i> Upload Permohonan', 
								array('update', 'id'=>$model->id_request,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Upload Permohonan'));
									?>

									<?php echo CHtml::link('<i class="fa fa-edit"></i> Upload Disposisi', 
										array('disposition', 'id'=>$model->id_request,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Upload Disposisi'));
											?>

											<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
										</div>
									</div>

									<?php $this->endWidget(); ?>

								</div>

							</div><!-- form -->
