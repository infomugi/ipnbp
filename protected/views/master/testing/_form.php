<?php
/* @var $this TestingController */
/* @var $model Testing */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'testing-form',
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
					<?php echo $form->labelEx($model,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'code'); ?>
					<?php echo $form->textField($model,'code',array('class'=>'form-control')); ?>
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
					<?php echo $form->labelEx($model,'part_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'part_id'); ?>
					<?php 
					echo $form->dropDownList($model, "part_id",
						CHtml::listData(Unit::model()->findall(array('condition'=>'type=1')),
							'id_unit', 'name'
							),
						array("empty"=>"-- Pilih Balai --", 'class'=>'select2 form-control')
						); 
						?> 
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
							CHtml::listData(Category::model()->findall(array('condition'=>'status=1')),
								'id_category', 'name'
								),
							array("empty"=>"-- Pilih Kategori --", 'class'=>'select2 form-control')
							); 
							?> 
						</div>

					</div>  		
					
					

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'time'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'time'); ?>
							<?php echo $form->textField($model,'time',array('class'=>'form-control')); ?>
						</div>

					</div>  



					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'price'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'price'); ?>
							<?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
						</div>

					</div> 

					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'method'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'method'); ?>
							<?php echo $form->textField($model,'method',array('class'=>'form-control')); ?>
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
								array('1'=>'Fix','2'=>'Custom'),
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

						<?php if(!$model->isNewRecord){ ?>
							<div class="form-group">

								<div class="col-sm-4 control-label">
									<?php echo $form->labelEx($model,'status'); ?>
								</div>   

								<div class="col-sm-8 be-radio">
									<?php echo $form->error($model,'status'); ?>
									<?php
									echo $form->radioButtonList($model,'status',
										array('1'=>'Aktif','0'=>'Tidak Aktif'),
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
							<?php } ?>


							<div class="form-group">
								<div class="col-md-12">  
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
								</div>
							</div>

							<?php $this->endWidget(); ?>

</div></div><!-- form -->