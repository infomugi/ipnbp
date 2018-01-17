<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */

$this->breadcrumbs=array(
	'Request Testings'=>array('admin'),
	$model->id_testing,
	);

$this->pageTitle='Detail '.$model->Testing->name;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="mdi mdi-edit"></i>', 
				array('update', 'id'=>$model->id_testing,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
					?>
					<?php echo CHtml::link('<i class="mdi mdi-close"></i>', 
						array('delete', 'id'=>$model->id_testing,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_testing,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('remove', 'id'=>$model->id_testing, 'requestid'=>$model->request_id,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(

															array('name'=>'testing_type','value'=>$model->Testing->name),
															array('name'=>'testing_lab','value'=>$model->Category->name),
															array('name'=>'testing_part','value'=>$model->Balai->name),
															array('label'=>'Durasi','value'=>$model->Testing->time . " Hari"),
															array('label'=>'Waktu','value'=>Request::model()->rupiah($model->Testing->price)),

															),
															)); ?>

															<div class="no-padding">
																<div class="col-md-6">
																	<h4><i class="mdi mdi-calendar"></i> Log Tahapan Pengujian</h4>
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

