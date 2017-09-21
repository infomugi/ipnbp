<?php
/* @var $this ResponseController */
/* @var $model Response */

$this->breadcrumbs=array(
	'Responses'=>array('admin'),
	$model->id_response,
	);

$this->pageTitle='Detail Surat Tanggapan - '.$model->letter_code;
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
															'letter_date',
															'letter_code',
															'letter_attachment',
															'date_send',
															'date_feedback',
															'description',
															// 'request_id',
															// 'status',
															),
															)); ?>

															<h4><i class="mdi mdi-calendar"></i> Log <?php echo $this->pageTitle; ?></h4>
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

