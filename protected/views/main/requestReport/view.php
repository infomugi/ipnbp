<?php
/* @var $this LaporanController */
/* @var $model Laporan */

$this->breadcrumbs=array(
	'Request Reports'=>array('admin'),
	$model->id_report,
	);

$this->pageTitle='Detail Laporan';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('main/requestreport/update', 'id'=>$model->id_report,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Laporan'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('main/requestreport/delete', 'id'=>$model->id_report,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Laporan'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('main/requestreport/update', 'id'=>$model->id_report,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Laporan'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('main/requestreport/delete', 'id'=>$model->id_report,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Laporan'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															// 'id_report',
															// 'created_date',
															// 'created_id',
															// 'update_date',
															// 'update_id',
															// 'request_id',
															// 'status',
															'upload_date',
															'accept_date',
															'report_date',
															'description',
															'file',
															),
															)); ?>

															<h3><i class="mdi mdi-file-text"></i> Laporan di Kirim (Email)</h3>
															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	array('name'=>'send_id','value'=>$model->send_id==0 ? "-" : $model->SendBy->first_name),
																	array('name'=>'send_date','value'=>$model->send_id==0 ? "-" : $model->send_date),
																	),
																	)); ?>

																	<h3><i class="mdi mdi-file-text"></i> Kuesioner</h3>
																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			array('name'=>'quesioner_id','value'=>$model->quesioner_id==0 ? "-" : $model->QuesionerBy->first_name),
																			array('name'=>'quesioner_date','value'=>$model->quesioner_id==0 ? "-" : $model->quesioner_date),
																			array('name'=>'token','value'=>$model->quesioner_id==0 ? "-" : $model->token),
																			),
																			)); ?>



																			<h3><i class="mdi mdi-dns"></i> Log Data</h3>
																			<?php $this->widget('zii.widgets.CDetailView', array(
																				'data'=>$model,
																				'htmlOptions'=>array("class"=>"table"),
																				'attributes'=>array(
																					array('name'=>'created_id','value'=>$model->created_id==0 ? "-" : $model->CreatedBy->first_name),
																					array('name'=>'created_date','value'=>$model->created_id==0 ? "-" : $model->created_date),
																					array('name'=>'update_id','value'=>$model->update_id==0 ? "-" : $model->UpdateBy->first_name),
																					array('name'=>'update_date','value'=>$model->update_id==0 ? "-" : $model->update_date),
																					),
																					)); ?>

																			<STYLE>
																				th{width:150px;}
																			</STYLE>

