<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Request Payments'=>array('admin'),
	$model->id_payment,
	);

$this->pageTitle='Detail Pembayaran';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Pembayaran'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Pembayaran'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_payment,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Pembayaran'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_payment,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Pembayaran'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Pembayaran'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Pembayaran'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_payment,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Pembayaran'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_payment,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Pembayaran'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_payment',
															'created_date',
															'created_id',
															'update_date',
															'update_id',
															'code',
															'date',
															'term',
															'total',
															'file',
															'invoice_id',
															'request_id',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

