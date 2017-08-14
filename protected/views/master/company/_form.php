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

			
			<div class="form-group">
				
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
					<?php echo $form->labelEx($model,'phone'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'phone'); ?>
					<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
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
					<?php echo $form->labelEx($model,'type'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'type'); ?>
					<?php echo $form->dropDownList($model,'type',array(''=>'-- Pilih Badan Usaha --','1'=>'PMDN','2'=>'Swasta Nasional','3'=>'Perseorangan','4'=>'PMA','5'=>'BUMN','6'=>'Kopeasi','7'=>'Join Vuture','8'=>'Join Venture','9'=>'Perorangan'),array('class'=>'select2 form-control')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'place'); ?>
				</div>   

				<div class="col-sm-8 be-radio">
					<?php echo $form->error($model,'place'); ?>
					<?php
					echo $form->radioButtonList($model,'place',
						array('1'=>'Pusat','2'=>'Cabang'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:5px'),

							)                              
						);
						?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'classification'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'classification'); ?>
						<?php echo $form->dropDownList($model,'classification',array(''=>'-- Pilih Klasifikasi --','1'=>'Besar','2'=>'Kecil','3'=>'Sedang','4'=>'Menengah','5'=>'< Kecil'),array('class'=>'select2 form-control')); ?>
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
										'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:5px'),

									)                              
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