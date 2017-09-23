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
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Permohonan - <?php echo $model->code; ?> - <?php echo $model->Company->name; ?></a></h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">


				<?php 

				if($model->letter_attachment!=""){
					echo CHtml::link('<i class="icon mdi mdi-download"></i> Surat Permohonan',
						array('downloadrequest', 'id'=>$model->id_request),
						array('class' => 'btn btn-primary btn-md'));
				}else{
					echo "<button class='btn btn-warning btn-disabled'>Surat Permohonan belum di Upload</button>";
				}

				if($model->disposition_letter!=""){
					echo CHtml::link('<i class="icon mdi mdi-download"></i>  Surat Disposisi',
						array('downloaddisposition', 'id'=>$model->id_request),
						array('class' => 'btn btn-primary pull-right btn-md'));
				}else{
					echo "<div class='pull-right label label-warning'>Surat Disposisi belum di Upload</div>";
				}



				echo "<hr>";

				if(YII::app()->user->record->level==1){

					echo $this->renderPartial('_form_update', array('model'=>$model));

					if($model->disposition_letter!=""){

						echo $this->renderPartial('_form_upload_disposition', 
							array(
								'disposition'=>$disposition,
								'dataDisposition'=>$dataDisposition
								));


					}else{
						// echo "<div class='pull-right label label-warning'>Surat Disposisi belum di Upload</div>";
					}
					
				}else{

					
					$this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array("class"=>"table"),
						'attributes'=>array(
							'code',
							'date',
							array('name'=>'company_id','value'=>$model->Company->name),
							array('name'=>'company_id','value'=>$model->Company->address),
							array('name'=>'company_id','value'=>$model->Company->email),
							'letter_date',
							'letter_code',
							'letter_subject',
							'letter_attachment',
							'disposition_letter',
							// 'color',
							// 'disposition_to',
							// 'disposition_date',
							// 'status',
							),
						)); 

				}

				?>


			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Detail Pengujian</a></h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">

				<?php echo $this->renderPartial('detail', array('model'=>$model,'dataTesting'=>$dataTesting)); ?>


			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" class=""><i class="icon mdi mdi-chevron-down"></i> Tindak Lanjut Permohonan</a></h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
			<div class="panel-body">



				<!-- START TAB: 2 -->
				<div class="panel panel-border-color panel-border-color-primary">
					<div class="tab-container">
						<ul class="nav nav-tabs" id="myTab">
							<li><a href="#pengujian" data-toggle="tab"><span class="icon mdi mdi-case-check"></span><span class="hidden-xs">1. Pengujian</span></a></li>
							<li><a href="#jadwal" data-toggle="tab"><span class="icon mdi mdi-calendar"></span><span class="hidden-xs">2. Jadwal & RAB</span></a></li>
							<li><a href="#tanggapan" data-toggle="tab"><span class="icon mdi mdi-collection-text"></span><span class="hidden-xs">3. Tanggapan</span></a></li>
							<li><a href="#invoice" data-toggle="tab"><span class="icon mdi mdi-card"></span><span class="hidden-xs">4. Invoice & SPK</span></a></li>
							<li><a href="#pembayaran" data-toggle="tab"><span class="icon mdi mdi-money-box"></span><span class="hidden-xs">5. Pembayaran</span></a></li>
							<li><a href="#laporan" data-toggle="tab"><span class="icon mdi mdi-layers"></span><span class="hidden-xs">6. Laporan</span></a></li>
							<li><a href="#riwayat" data-toggle="tab"><span class="icon mdi mdi-filter-list"></span><span class="hidden-xs">7. Riwayat</span></a></li>
						</ul>
						<div class="tab-content">

							<!-- <div id="tanggapan" class="tab-pane active cont"> -->
							<div id="tanggapan" class="tab-pane">
								<h4>Tambah Surat Tanggapan</h4>
								<?php echo $this->renderPartial('_form_response', 
									array(
										'response'=>$response,
										'dataResponse'=>$dataResponse,
										)); ?>

									</div>


									<div id="pengujian" class="tab-pane">
										<h4>Tambah Pengujian</h4>
										<?php echo $this->renderPartial('_form_testing', 
											array(
												'testing'=>$testing,
												'dataTesting'=>$dataTesting,
												)); ?>
											</div>

											<div id="jadwal" class="tab-pane">
												<h4>Tambah Jadwal</h4>
												<?php echo $this->renderPartial('_form_schedule', 
													array(
														'schedule'=>$schedule,
														'dataSchedule'=>$dataSchedule,
														'request_id'=>$model->id_request,
														)); ?>
													</div>

													<div id="invoice" class="tab-pane">
														<h4>Tambah Invoice & SPK</h4>
														<?php echo $this->renderPartial('_form_invoice', 
															array(
																'model'=>$model,
																'invoice'=>$invoice,
																'dataInvoice'=>$dataInvoice,
																'request_id'=>$model->id_request,
																)); ?>
															</div>

															<div id="pembayaran" class="tab-pane">
																<h4>Tambah Pembayaran</h4>
																<?php echo $this->renderPartial('_form_payment', 
																	array(
																		'payment'=>$payment,
																		'dataPayment'=>$dataPayment,
																		'request_id'=>$model->id_request,
																		)); ?>
																	</div>

																	<div id="laporan" class="tab-pane">
																		<h4>Tambah Laporan</h4>
																		<?php echo $this->renderPartial('_form_report', 
																			array(
																				'report'=>$report,
																				'dataReport'=>$dataReport,
																				)); ?>

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


