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

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Penjadwalan'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Permohonan Penjadwalan'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_schedule,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Penjadwalan'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_schedule,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Penjadwalan'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Penjadwalan'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Permohonan Penjadwalan'));
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
															'id_schedule',
															'created_date',
															'created_id',
															'update_date',
															'update_id',
															'task',
															'cost',
															'start_date',
															'end_date',
															'description',
															'note',
															'testing_number',
															'testing_id',
															'file',
															'request_id',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

