<?php
/* @var $this TestingController */
/* @var $testingcreate Testing */
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

		<?php echo $form->errorSummary($testingcreate, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-12"> 

			
			<div class="form-group">

				<div class="col-sm-3 control-label">
					<?php echo $form->labelEx($testingcreate,'code'); ?>
				</div>   

				<div class="col-sm-9">
					<?php echo $form->error($testingcreate,'code'); ?>
					<?php echo $form->textField($testingcreate,'code',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-3 control-label">
					<?php echo $form->labelEx($testingcreate,'name'); ?>
				</div>   

				<div class="col-sm-9">
					<?php echo $form->error($testingcreate,'name'); ?>
					<?php echo $form->textField($testingcreate,'name',array('class'=>'form-control')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-3 control-label">
					<?php echo $form->labelEx($testingcreate,'part_id'); ?>
				</div>   

				<div class="col-sm-9">
					<?php echo $form->error($testingcreate,'part_id'); ?>
					<?php 
					echo $form->dropDownList($testingcreate, "part_id",
						CHtml::listData(Unit::model()->findall(array('condition'=>'type=1')),
							'id_unit', 'name'
							),
						array("empty"=>"-- Pilih Balai --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($testingcreate,'category_id'); ?>
					</div>   

					<div class="col-sm-9">
						<?php echo $form->error($testingcreate,'category_id'); ?>
						<?php 
						echo $form->dropDownList($testingcreate, "category_id",
							CHtml::listData(Category::model()->findall(array('condition'=>'status=1')),
								'id_category', 'name'
								),
							array("empty"=>"-- Pilih Kategori --", 'class'=>'select2 form-control')
							); 
							?> 
						</div>

					</div>  		
					
					

					<div class="form-group">

						<div class="col-sm-3 control-label">
							<?php echo $form->labelEx($testingcreate,'time'); ?>
						</div>   

						<div class="col-sm-9">
							<?php echo $form->error($testingcreate,'time'); ?>
							<?php echo $form->textField($testingcreate,'time',array('class'=>'form-control')); ?>
						</div>

					</div>  



					<div class="form-group">

						<div class="col-sm-3 control-label">
							<?php echo $form->labelEx($testingcreate,'price'); ?>
						</div>   

						<div class="col-sm-9">
							<?php echo $form->error($testingcreate,'price'); ?>
							<?php echo $form->textField($testingcreate,'price',array('class'=>'form-control')); ?>
						</div>

					</div> 

					<div class="form-group">

						<div class="col-sm-3 control-label">
							<?php echo $form->labelEx($testingcreate,'method'); ?>
						</div>   

						<div class="col-sm-9">
							<?php echo $form->error($testingcreate,'method'); ?>
							<?php echo $form->textField($testingcreate,'method',array('class'=>'form-control')); ?>
						</div>

					</div>  

					<div class="form-group">

						<div class="col-sm-3 control-label">
							<?php echo $form->labelEx($testingcreate,'type'); ?>
						</div>   

						<div class="col-sm-9 be-radio">
							<?php echo $form->error($testingcreate,'type'); ?>
							<?php
							echo $form->radioButtonList($testingcreate,'type',
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

						<?php if(!$testingcreate->isNewRecord){ ?>
							<div class="form-group">

								<div class="col-sm-3 control-label">
									<?php echo $form->labelEx($testingcreate,'status'); ?>
								</div>   

								<div class="col-sm-9 be-radio">
									<?php echo $form->error($testingcreate,'status'); ?>
									<?php
									echo $form->radioButtonList($testingcreate,'status',
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
									<?php echo CHtml::submitButton($testingcreate->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
								</div>
							</div>

							<?php $this->endWidget(); ?>

</div></div><!-- form -->