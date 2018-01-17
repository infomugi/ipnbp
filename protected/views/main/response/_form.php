<?php
/* @var $this ResponseController */
/* @var $model Response */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<div class="col-md-10">
		<form id="uploadForm-response" method="post">
			<div class="form-group">
				<div class="col-sm-4 control-label">
					File Surat Tanggapan
				</div>   
				<div class="col-sm-8">
					<input id="file-request" name="userImage" class="form-control xs-mb-15" type="file" class="inputFile" />
					<div id="show-request"></div>
				</div>
			</div>  
		</form>
	</div><!-- form -->


	<div class="col-md-10">
		<form id="uploadForm-confirmation" method="post">
			<div class="form-group">
				<div class="col-sm-4 control-label">
					File Lembar Konfirmasi
				</div>   
				<div class="col-sm-8">
					<input id="file-request" name="userImage" class="form-control xs-mb-15" type="file" class="inputFile" />
					<div id="show-request"></div>
				</div>
			</div>  
		</form>
	</div><!-- form -->


	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'response-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>



		<div class="col-md-10">

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
					<?php echo $form->labelEx($model,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'description'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'confirmation_status'); ?>
				</div>   

				<div class="col-sm-8 be-radio">
					<?php echo $form->error($model,'confirmation_status'); ?>
					<?php
					echo $form->radioButtonList($model,'confirmation_status',
						array('1'=>'Bersedia','2'=>'Tidak Bersedia'),
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
						<?php echo $form->labelEx($model,'status'); ?>
					</div>   

					<div class="col-sm-8 be-radio">
						<?php echo $form->error($model,'status'); ?>
						<?php
						echo $form->radioButtonList($model,'status',
							array('1'=>'Diterima','2'=>'Ditolak'),
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


					<div id="emailReject" style="display: none">

						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'description_reject'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->textArea($model,'description_reject',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'description_reject'); ?>
							</div>

						</div>  


						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'description_email'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->textArea($model,'description_email',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'description_email'); ?>
							</div>

						</div>  

					</div>



					<div class="form-group">
						<div class="col-md-12">  
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- form -->



			<script type="text/javascript">
				$(document).ready(function (e) {

					// Upload Surat Tanggapan
					$("#uploadForm-response").on('change',(function(e) {
						e.preventDefault();
						$.ajax({
							url: "<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/main/response/upload/id/".$model->id_response; ?>",
							type: "POST",
							data:  new FormData(this),
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$("#show-request").html(data);
								notification("Informasi","File Surat Tanggapan Berhasil di Perbaharui","primary")

							},
							error: function() 
							{
								notification("Informasi","File Surat Tanggapan Gagal di Perbaharui","warning")
							} 	        
						});
					}));


					// Upload Surat Lembar Konfirmasi
					$("#uploadForm-confirmation").on('change',(function(e) {
						e.preventDefault();
						$.ajax({
							url: "<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/main/response/uploadconfirmation/id/".$model->id_response; ?>",
							type: "POST",
							data:  new FormData(this),
							contentType: false,
							cache: false,
							processData:false,
							success: function(data)
							{
								$("#show-request").html(data);
								notification("Informasi","File Surat Lembar Konfirmasi Berhasil di Perbaharui","primary")

							},
							error: function() 
							{
								notification("Informasi","File Surat Lembar Konfirmasi Gagal di Perbaharui","warning")
							} 	        
						});
					}));


					// Notifikasi
					function notification(heading,data,color){
						$.extend(
							$.gritter.options, {
								position: "bottom-right"
							});
						$.gritter.add({
							title: heading,
							text: data,
							class_name: "color "+ color + ""
						});
					}


					// Show Hide Form
					$("input[name='Response[status]']").click(function () {
						if ($("#Response_status_1").is(":checked")) {
							$("#emailReject").show();
						} else {
							$("#emailReject").hide();
						}
					});


				});
			</script>




