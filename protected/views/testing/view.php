<?php
/* @var $this TestingController */
/* @var $model Testing */

$this->breadcrumbs=array(
	'Testings'=>array('admin'),
	$model->name,
	);

$this->pageTitle='Detail Pengujian';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Pengujian'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Pengujian'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_testing,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Pengujian'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_testing,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Pengujian'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Pengujian'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Pengujian'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_testing,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Pengujian'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_testing,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Pengujian'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'code',
															'name',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

