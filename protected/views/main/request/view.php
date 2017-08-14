<?php
/* @var $this RequestController */
/* @var $model Request */
$this->widget('ext.yii-toastr.MugiToastr', array(
	'flashMessagesOnly' => true, 
	'options' => array(
		"closeButton" => true,
		"debug" => true,
		"progressBar"=> true,
		"positionClass" => "toast-bottom-right",
		"showDuration" => "600",
		"hideDuration" => "1000",
		"timeOut" => "15000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
		)
	));

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	$model->id_request,
	);

$this->pageTitle='Detail Permohonan Pengujian - '.$model->code;
?>




<div id="accordion1" class="panel-group accordion">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Permohonan <?php echo $model->Company->name; ?></a></h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">


				<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>


			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Penjadwalan Pengujian</a></h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">

				<table class="table table-responsive table-hover table-striped table-condensed table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kegiatan Pengujian</th>
							<th>Jadual Pengujian</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach($dataTesting->getData() as $key => $valueTesting) { ?>
							<tr class="clickable" data-toggle="collapse" id="row1" data-target=".<?php echo $valueTesting->id_testing; ?>">
								<td colspan="3"><H4><i class="icon mdi mdi-caret-right-circle"></i> <?php echo $valueTesting->Testing->name; ?></H4></td>
								<td>

									<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
										array('requesttesting/update', 'id'=>$valueTesting->id_testing,
											), array('class' => 'btn btn-success btn-flat', 'title'=>'Edit Tahapan Pengujian'));
									?>
									<?php 
											// echo CHtml::link('<i class="icon mdi mdi-close-circle"></i>', 
											// 	array('requesttesting/delete', 'id'=>$valueTesting->id_testing,
											// 		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Tahapan Pengujian'));
									?>

								</td>
							</tr>

							<?php 
							$detailSchedule=new CActiveDataProvider('RequestSchedule',array('criteria'=>array('condition'=>'request_id='.$valueTesting->request_id.' AND testing_id='.$valueTesting->id_testing)));
							foreach($detailSchedule->getData() as $key => $detailTesting) { ?>
								<tr class="collapse <?php echo $valueTesting->id_testing; ?>">
									<td><i class="icon mdi mdi-caret-right"></i> <?php echo RequestSchedule::model()->testingNumber($detailTesting->testing_number); ?></td>
									<td><?php echo $detailTesting->task; ?></td>
									<td><?php echo $detailTesting->start_date; ?> - <?php echo $detailTesting->end_date; ?></td>
									<td>

										<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
											array('requestschedule/update', 'id'=>$detailTesting->id_schedule,
												), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Penjadwalan'));
										?>
										<?php echo CHtml::link('<i class="icon mdi mdi-close-circle"></i>', 
											array('requestschedule/delete', 'id'=>$detailTesting->id_schedule,
												),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Penjadwalan'));
										?>

									</td>
								</tr>

								<?php } ?> 

								<?php } ?> 


							</tbody>
						</table>


					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" class=""><i class="icon mdi mdi-chevron-down"></i> Data Permohonan</a></h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
					<div class="panel-body">



						<!-- START TAB: 2 -->
						<div class="panel panel-border-color panel-border-color-primary">
							<div class="tab-container">
								<ul class="nav nav-tabs" id="myTab">
									<li><a href="#tanggapan" data-toggle="tab"><span class="icon mdi mdi-collection-text"></span><span class="hidden-xs">1. Tanggapan</span></a></li>
									<li><a href="#pengujian" data-toggle="tab"><span class="icon mdi mdi-case-check"></span><span class="hidden-xs">2. Pengujian</span></a></li>
									<li><a href="#jadwal" data-toggle="tab"><span class="icon mdi mdi-calendar"></span><span class="hidden-xs">3. Jadwal & RAB</span></a></li>
									<li><a href="#invoice" data-toggle="tab"><span class="icon mdi mdi-card"></span><span class="hidden-xs">4. Invoice & SPK</span></a></li>
									<li><a href="#pembayaran" data-toggle="tab"><span class="icon mdi mdi-money-box"></span><span class="hidden-xs">5. Pembayaran</span></a></li>
									<li><a href="#laporan" data-toggle="tab"><span class="icon mdi mdi-layers"></span><span class="hidden-xs">6. Laporan</span></a></li>
									<li><a href="#riwayat" data-toggle="tab"><span class="icon mdi mdi-filter-list"></span><span class="hidden-xs">7. Riwayat</span></a></li>
								</ul>
								<div class="tab-content">

									<div id="tanggapan" class="tab-pane active cont">
										<h4>Surat Tanggapan</h4>

										<?php echo $this->renderPartial('_form_response', 
											array(
												'response'=>$response,
												'dataResponse'=>$dataResponse,
												)); ?>

											</div>


											<div id="pengujian" class="tab-pane">
												<h4>Pengujian</h4>
												<?php echo $this->renderPartial('_form_testing', 
													array(
														'testing'=>$testing,
														'dataTesting'=>$dataTesting,
														)); ?>
													</div>

													<div id="jadwal" class="tab-pane">
														<h4>Jadwal</h4>
														<?php echo $this->renderPartial('_form_schedule', 
															array(
																'schedule'=>$schedule,
																'dataSchedule'=>$dataSchedule,
																'request_id'=>$model->id_request,
																)); ?>
															</div>

															<div id="invoice" class="tab-pane">
																<h4>Invoice & SPK</h4>
																<?php echo $this->renderPartial('_form_invoice', 
																	array(
																		'invoice'=>$invoice,
																		'dataInvoice'=>$dataInvoice,
																		)); ?>
																	</div>

																	<div id="pembayaran" class="tab-pane">
																		<h4>Pembayaran</h4>
																		<?php echo $this->renderPartial('_form_payment', 
																			array(
																				'payment'=>$payment,
																				'dataPayment'=>$dataPayment,
																				'request_id'=>$model->id_request,
																				)); ?>
																			</div>

																			<div id="laporan" class="tab-pane">
																				<h4>Laporan</h4>

																			</div>

																			<div id="riwayat" class="tab-pane">
																				<h4>Riwayat</h4>
																				<?php echo $this->renderPartial('_form_activity', 
																					array(
																						'activity'=>$activity,
																						)); ?>
																					</div>


																				</div>
																			</div>
																		</div>
																		<!-- START TAB: 2 -->


																	</div>
																</div>
															</div>


														</div>



														<STYLE>
															th{width:150px;}
														</STYLE>


