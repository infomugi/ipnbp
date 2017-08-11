<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	$model->id_request,
	);

$this->pageTitle='Detail Permohonan Pengujian - '.$model->code;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Pengujian'));
		?>
<!-- 		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Permohonan Pengujian'));
			?> -->
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_request,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_request,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Pengujian'));
								?>
							<!-- 	<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Permohonan Pengujian'));
									?> -->
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_request,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_request,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
													?>

												</span>

												<HR>

													<div id="accordion1" class="panel-group accordion">

														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Detail Permohonan</a></h4>
															</div>
															<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
																<div class="panel-body">


																	<!-- START TAB: 1 -->
																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			// 'id_request',
																			// 'created_date',
																			// 'created_id',
																			// 'update_date',
																			// 'update_id',
																			'code',
																			'date',
																			array('name'=>'company_id','value'=>$model->Company->name),
																			array('label'=>'Alamat','value'=>$model->Company->address),
																			array('label'=>'Email','value'=>$model->Company->email),
																			array('label'=>'Kontak','value'=>$model->Company->phone),
																			'letter_date',
																			'letter_code',
																			'letter_subject',
																			'letter_attachment',

																			array('name'=>'status','value'=>Request::model()->status($model->status)),
																			),
																			)); ?>
																			<!-- END TAB: 1 -->


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
																					<ul class="nav nav-tabs">
																						<li class="active"><a href="#tanggapan" data-toggle="tab"><span class="icon mdi mdi-collection-text"></span><span class="hidden-xs">1. Tanggapan</span></a></li>
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
																																	)); ?>
																																</div>

																																<div id="laporan" class="tab-pane">
																																	<h4>Laporan</h4>

																																</div>

																																<div id="riwayat" class="tab-pane">
																																	<h4>Riwayat</h4>

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


