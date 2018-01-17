<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>




<div class="form-normal form-horizontal clearfix">
	<div class="col-md-12"> 

		<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'question-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array(
				'class' => 'form-horizontal', 'role' => 'form')
				)); ?>

				<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

				<div class="form-group">

					<div class="col-sm-3 control-label">
						<?php echo $form->labelEx($model,'sub_id'); ?>
					</div>   

					<div class="col-sm-9 be-radio">
						<?php echo $form->error($model,'sub_id'); ?>
						<?php
						echo $form->radioButtonList($model,'sub_id',
							array('1'=>'Pengujian','2'=>'Advis Teknis','3'=>'Sertifikasi'),
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


					<div class="form-group">

						<div class="col-sm-3 control-label">
							<?php echo $form->labelEx($model,'category_id'); ?>
						</div>   

						<div class="col-sm-9 be-radio">
							<?php echo $form->error($model,'category_id'); ?>
							<?php
							echo $form->radioButtonList($model,'category_id',
								array('1'=>'Kualitas Pelayanan','2'=>'Kualitas Produk'),
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


						<div class="form-group">

							<div class="col-sm-3 control-label">
								<?php echo $form->labelEx($model,'question_sort'); ?>
							</div>   

							<div class="col-sm-9">
								<?php echo $form->error($model,'question_sort'); ?>
								<?php echo $form->textField($model,'question_sort',array('class'=>'form-control')); ?>
							</div>

						</div>  


						<div class="form-group">

							<div class="col-sm-3 control-label">
								<?php echo $form->labelEx($model,'question'); ?>
							</div>   

							<div class="col-sm-9">
								<?php echo $form->error($model,'question'); ?>
								<?php echo $form->textArea($model,'question',array('class'=>'form-control')); ?>
							</div>

						</div>  		


						<div class="form-group">

							<div class="col-sm-3 control-label">
								<?php echo $form->labelEx($model,'point'); ?>
							</div>   

							<div class="col-sm-9">
								<?php echo $form->error($model,'point'); ?>
								<?php echo $form->textField($model,'point',array('class'=>'form-control')); ?>
							</div>

						</div>  

						<div class="form-group">
							<div class="col-md-4">
							</div>  
							<div class="col-md-8">  


								<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan Pertanyaan' : 'Edit Pertanyaan', array('class' => 'btn btn-info btn-flat pull-right')); ?>
							</div>
						</div>

						<?php $this->endWidget(); ?>


						<?php //echo $this->renderPartial('_form_add', array('model'=>$model)); ?>


					</div><!-- form -->

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>


		<style type="text/css">

			.table-responsive tbody > tr > td {
				width: 100%;
			}

		</style>