<?php
/* @var $this ResponseController */
/* @var $model Response */

$this->breadcrumbs=array(
	'Responses'=>array('admin'),
	$model->id_response,
	);

$this->pageTitle='Detail Surat Tanggapan';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_response,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Surat Tanggapan'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_response,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Surat Tanggapan'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_response,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Surat Tanggapan'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_response,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Surat Tanggapan'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															// 'id_response',
															// 'created_date',
															// 'created_id',
															// 'update_date',
															// 'update_id',
															'letter_date',
															'letter_code',
															'letter_attachment',
															'date_send',
															'date_feedback',
															'description',
															'request_id',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

