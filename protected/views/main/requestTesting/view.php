<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */

$this->breadcrumbs=array(
	'Request Testings'=>array('admin'),
	$model->id_testing,
	);

$this->pageTitle='Detail Permohonan Pengujian';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Pengujian'));
		?>
		<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
			array('update', 'id'=>$model->id_testing,
				), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
				?>
				<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
					array('delete', 'id'=>$model->id_testing,
						),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
						?>

					</span> 

					<span class="hidden-xs">

						<?php echo CHtml::link('Tambah',
							array('create'),
							array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Permohonan Pengujian'));
							?>
							<?php echo CHtml::link('Edit', 
								array('update', 'id'=>$model->id_testing,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Permohonan Pengujian'));
									?>
									<?php echo CHtml::link('Hapus', 
										array('delete', 'id'=>$model->id_testing,
											),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Permohonan Pengujian'));
											?>

										</span>

										<HR>

											<?php $this->widget('zii.widgets.CDetailView', array(
												'data'=>$model,
												'htmlOptions'=>array("class"=>"table"),
												'attributes'=>array(
													'id_testing',
													'created_date',
													'created_id',
													'update_date',
													'update_id',
													'testing_type',
													'testing_lab',
													'testing_part',
													'request_id',
													'status',
													),
													)); ?>

											<STYLE>
												th{width:150px;}
											</STYLE>

