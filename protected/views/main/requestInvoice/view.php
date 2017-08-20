<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Request Invoices'=>array('admin'),
	$model->id_invoice,
	);

$this->pageTitle='Detail Invoice';
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

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_invoice',
															'created_date',
															'created_id',
															'update_date',
															'update_id',
															'code',
															'date',
															'description',
															'total',
															'note',
															'signature_id',
															'file_invoice',
															'file_spk',
															'request_id',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

