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
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>


		<div class="col-lg-9 col-md-10"> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($model,'code',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'code'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'date'); ?>
				</div>   

				<div class="col-sm-8">
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
					<?php echo $form->error($model,'date'); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'company_id'); ?>
				</div>   

				<div class="col-sm-8">

					<div class="input-group">
						<?php 
						echo $form->dropDownList($model, "company_id",
							CHtml::listData(Company::model()->findall(array('condition'=>'status=1')),
								'id_company', 'name'
								),
							array("empty"=>"-- Perusahaan --", 'class'=>'select2 form-control')
							); 
							?> 
							<span data-toggle="modal" data-target="#md-fullWidth" class="input-group-addon btn btn-lg btn-primary"><i class="icon-th mdi mdi-plus"></i></span>
						</div>
						<?php echo $form->error($model,'company_id'); ?>
					</div>

				</div>  
<!--
				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'category_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php 
						echo $form->dropDownList($model, "category_id",
							CHtml::listData(Category::model()->findall(array('condition'=>'status=1')),
								'id_category', 'description'
								),
							array("empty"=>"-- Kategori Pengujian --", 'class'=>'select2 form-control')
							); 
							?> 
							<?php echo $form->error($model,'category_id'); ?>
						</div>

					</div>  

 				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_address'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true" id="address">
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_email'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true" id="email">
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'company_contact'); ?>
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled="true" id="contact">
					</div>

				</div>  								
			-->

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_date'); ?>
				</div>   

				<div class="col-sm-8">
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($model,'letter_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
					<?php echo $form->error($model,'letter_date'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($model,'letter_code',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'letter_code'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_subject'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($model,'letter_subject',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'letter_subject'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'letter_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->fileField($model,'letter_attachment',array('class'=>'btn btn-info')); ?>
					<?php echo $form->error($model,'letter_attachment'); ?>
				</div>

			</div>  


			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'category_id'); ?>
				</div>   

				<div class="col-sm-8 be-radio">
					<?php echo $form->error($model,'category_id'); ?>
					<?php
					echo $form->radioButtonList($model,'category_id',
						array('1'=>'Pengujian','2'=>'Sertifikasi','3'=>'Advis Teknis','4'=>'Inspeksi SLF'),
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

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'color'); ?>
					</div>   

					<div class="col-sm-8">
						<div id="cp2" class="input-group colorpicker-component"><?php echo $form->textField($model,'color',array('class'=>'form-control')); ?><span class="input-group-addon"><i class="fa fa-square"></i></span> 
						</div> 
						<?php echo $form->error($model,'color'); ?>


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



	<!--Form Modals-->
	<div id="md-fullWidth" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
		<div class="modal-dialog custom-width">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
					<h3 class="modal-title">Tambah Instansi / Perusahaan Baru</h3>
				</div>
				<div class="modal-body">
					
					<?php echo $this->renderPartial('_form_company', array('company'=>$company)); ?>

				</div>
			</div>
		</div>
	</div>