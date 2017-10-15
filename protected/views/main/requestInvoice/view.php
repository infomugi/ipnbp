<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Request Invoices'=>array('admin'),
	$model->id_invoice,
	);

$this->pageTitle='Detail Invoice - '.$model->code;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_invoice,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Invoice'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_invoice,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Invoice'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_invoice,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Invoice'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_invoice,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Invoice'));
													?>

												</span>

												<HR>


													<h4>Data Invoice</h4>
													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															// 'id_invoice',
															'code',
															'date',
															'description',
															'total',
															'note',
															array('name'=>'signature_id','value'=>$model->signature_id==0 ? "-" : $model->Signature->address),
															// 'file_invoice',
															// 'file_spk',
															// 'testing_id',
															'spk_no',
															'spk_date',
															// 'request_id',
															// 'status',
															),
															)); ?>

															
															<div class="no-padding">
																<div class="col-md-6">
																	<h4><i class="mdi mdi-calendar"></i> Log Invoice</h4>
																	<?php $this->widget('zii.widgets.CDetailView', array(
																		'data'=>$model,
																		'htmlOptions'=>array("class"=>"table"),
																		'attributes'=>array(
																			array('name'=>'print_by','value'=>$model->print_by==0 ? "-" : $model->PrintBy->first_name),
																			array('name'=>'print_date','value'=>$model->print_by==0 ? "-" : $model->print_date),
																			array('name'=>'print_click','value'=>$model->print_by==0 ? "-" : $model->print_click),
																			),
																			)); ?>
																		</div>

																		<div class="col-md-6">
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
																				</div>

																			</div>

																			<STYLE>
																				th{width:150px;}
																			</STYLE>

