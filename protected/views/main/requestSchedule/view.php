<?php
/* @var $this RequestScheduleController */
/* @var $model RequestSchedule */

$this->breadcrumbs=array(
	'Request Schedules'=>array('admin'),
	$model->id_schedule,
	);

$this->pageTitle='Detail Permohonan Penjadwalan';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="mdi mdi-edit"></i>', 
				array('update', 'id'=>$model->id_schedule,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Penjadwalan'));
					?>
					<?php echo CHtml::link('<i class="mdi mdi-close"></i>', 
						array('delete', 'id'=>$model->id_schedule,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Penjadwalan'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_schedule,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Penjadwalan'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_schedule,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Penjadwalan'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															// 'id_schedule',
															// 'created_date',
															// 'created_id',
															// 'update_date',
															// 'update_id',
															'task',
															array('name'=>'cost','value'=>Request::model()->rupiah($model->cost)),
															'start_date',
															'end_date',
															'description',
															'note',
															'testing_number',
															// 'testing_id',
															// 'file',
															// 'request_id',
															// 'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

