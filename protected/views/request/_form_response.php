<?php
/* @var $this ResponseController */
/* @var $response Response */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

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

		<?php //echo $form->errorSummary($response, null, null, array('class' => 'alert alert-warning')); ?>



		<div class="col-md-10">

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_date'); ?>
				</div>   

				<div class="col-sm-8">
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($response,'letter_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
					<?php echo $form->error($response,'letter_date'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($response,'letter_code',array('class'=>'form-control')); ?>
					<?php echo $form->error($response,'letter_code'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->fileField($response,'letter_attachment',array('class'=>'btn btn-info')); ?>
					<?php echo $form->error($response,'letter_attachment'); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'confirmation_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->fileField($response,'confirmation_attachment',array('class'=>'btn btn-info')); ?>
					<?php echo $form->error($response,'confirmation_attachment'); ?>
				</div>

			</div> 


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textArea($response,'description',array('class'=>'form-control')); ?>
					<?php echo $form->error($response,'description'); ?>
				</div>

			</div>  
			
			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'status'); ?>
				</div>   

				<div class="col-sm-8 be-radio">
					<?php echo $form->error($response,'status'); ?>
					<?php
					echo $form->radioButtonList($response,'status',
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


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($response,'confirmation_status'); ?>
					</div>   

					<div class="col-sm-8 be-radio">
						<?php echo $form->error($response,'confirmation_status'); ?>
						<?php
						echo $form->radioButtonList($response,'confirmation_status',
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



					<div id="emailReject" style="display: none">

						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($response,'description_reject'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->textArea($response,'description_reject',array('class'=>'form-control')); ?>
								<?php echo $form->error($response,'description_reject'); ?>
							</div>

						</div>  


						<div class="form-group">

							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($response,'description_email'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->textArea($response,'description_email',array('class'=>'form-control')); ?>
								<?php echo $form->error($response,'description_email'); ?>
							</div>

						</div>  

					</div>


					<div class="form-group">
						<div class="col-md-12">  
							<?php echo CHtml::submitButton($response->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

				</div><!-- form -->
			</div><!-- form -->

			<h4>Data Surat Tanggapan</h4>

			<div class="table-responsive">
				<table class="table table-responsive table-hover table-striped">
					<thead>
						<tr>
							<th>No. Surat</th>
							<th>Tanggal Surat</th>
							<th>Catatan</th>
							<th>Surat Tanggapan</th>
							<th>Lembar Konfirmasi</th>
							<th>Kirim Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

						<?php foreach($dataResponse->getData() as $key => $valueTesting) { ?>

							<tr class="clickable" data-toggle="collapse" id="row1" data-target=".<?php echo $valueTesting->id_response; ?>">
								<td>
									<H4><i class="icon mdi mdi-caret-right-circle"></i> <?php echo $valueTesting->letter_code; ?></H4></td>
									<td><H4><?php echo $valueTesting->letter_date; ?></H4></td>
									<td><H4><?php echo $valueTesting->description; ?></H4></td>

									<td>
										<?php echo CHtml::link('<i class="icon mdi mdi-download"></i>', 
											array('main/response/download', 'id'=>$valueTesting->id_response,
												), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Download Surat Tanggapan'));
										?>

									</td>


									<td>
										<?php echo CHtml::link('<i class="icon mdi mdi-download"></i>', 
											array('main/response/downloadconfirmation', 'id'=>$valueTesting->id_response,
												), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Download Lembar Konfirmasi'));
										?>

									</td>

									<td>
										<?php 
										if($valueTesting->status==1){

											echo CHtml::link('<i class="icon mdi mdi-email"></i> Kirim', 
												array('main/response/send', 'id'=>$valueTesting->id_response,
													), array('class' => 'btn btn-sm btn-primary btn-flat', 'title'=>'Kirim Surat Tanggapan'));

										}else{

											echo CHtml::link('<i class="icon mdi mdi-email"></i> Kirim', 
												array('main/response/sendreject', 'id'=>$valueTesting->id_response,
													), array('class' => 'btn btn-sm btn-warning btn-flat', 'title'=>'Kirim Surat Tanggapan (Penolakan)'));
										}

										?>

									</td>

									<td>

										<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>', 
											array('main/responsedetail/create', 'request'=>$valueTesting->request_id, 'response'=>$valueTesting->id_response,
												), array('class' => 'btn btn-sm btn-primary btn-flat', 'title'=>'Tambah Lampiran untuk No. Surat '.$valueTesting->letter_code));
										?>

										<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
											array('main/response/update', 'id'=>$valueTesting->id_response,
												), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Edit Tanggapan'));
										?>


										<?php echo CHtml::link('<i class="icon mdi mdi-close"></i>', 
											array('main/response/delete', 'id'=>$valueTesting->id_response,'requestid'=>$valueTesting->request_id,
												), array('class' => 'btn btn-sm btn-danger btn-flat', 'title'=>'Hapus Tanggapan'));
										?>

									</td>
								</tr>

								<?php 
								$detailResponse=new CActiveDataProvider('ResponseDetail',array('criteria'=>array('condition'=>'request_id='.$valueTesting->request_id.' AND response_id='.$valueTesting->id_response)));
								foreach($detailResponse->getData() as $key => $detail) { 
									?>

									<tr class="collapse <?php echo $valueTesting->id_response; ?>">

										<td></td>
										<td><?php echo Request::model()->date($detail->created_date); ?></td>
										<td><?php echo $detail->description; ?></td>
										<td colspan="2">
											<?php echo CHtml::link('<i class="icon mdi mdi-download"></i>', 
												array('main/responsedetail/download', 'id'=>$detail->id_response_detail,
													), array('class' => 'btn btn-sm btn-warning btn-flat', 'title'=>'Download Lampiran Surat Tanggapan'));
											?>

										</td>


										<td>

											<?php 
											echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
												array('main/responsedetail/update', 'id'=>$detail->id_response_detail,
													), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Update Tanggapan'));
											?>


											<?php
											echo CHtml::link('<i class="icon mdi mdi-close"></i>', 
												array('main/responsedetail/delete', 'id'=>$detail->id_response_detail,'requestid'=>$detail->request_id,
													), array('class' => 'btn btn-sm btn-danger btn-flat', 'title'=>'Hapus Lampiran'));
											?>

										</td>

									</tr>

									<?php } ?> 

									<?php } ?> 

								</tbody>
							</table>
						</div>

						<script type="text/javascript">
							$(function () {
								$("input[name='Response[status]']").click(function () {
									if ($("#Response_status_1").is(":checked")) {
										$("#emailReject").show();
									} else {
										$("#emailReject").hide();
									}
								});
							});
						</script>

