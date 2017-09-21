<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Request Payments'=>array('admin'),
	$model->id_payment,
	);

$this->pageTitle='Detail Pembayaran - '.$model->code;

function terbilang($satuan){
	$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh","sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return terbilang($satuan - 10)." belas";
	elseif ($satuan < 100)
		return terbilang($satuan / 10)." puluh".terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "seratus".terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return terbilang($satuan / 100)." ratus".terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "seribu".terbilang($satuan - 1000); 
	elseif ($satuan < 1000000)
		return terbilang($satuan / 1000)." ribu".terbilang($satuan % 1000); 
	elseif ($satuan < 1000000000)
		return terbilang($satuan / 1000000)." juta".terbilang($satuan % 1000000); 
	elseif ($satuan >= 1000000000)
		echo "Angka yang Anda masukkan terlalu besar";
}
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
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

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
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
															// 'id_payment',
															// 'created_date',
															// 'created_id',
															// 'update_date',
															// 'update_id',
															'code',
															'date',
															array('name'=>'term','value'=>RequestPayment::model()->term($model->term)),
															'total',
															array('label'=>'Terbilang','value'=>ucwords(terbilang($model->total))),
															'file',
															// 'invoice_id',
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

