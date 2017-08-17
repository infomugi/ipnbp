<?php
/* @var $this TestingController */
/* @var $model Testing */

$this->breadcrumbs=array(
	'Testings'=>array('admin'),
	$model->name,
	);

$this->pageTitle='Detail Jenis Pengujian - '.$model->name;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Jenis Pengujian'));
		?>
		<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
			array('update', 'id'=>$model->id_testing,
				), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Jenis Pengujian'));
				?>
				<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
					array('delete', 'id'=>$model->id_testing,
						),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Jenis Pengujian'));
						?>

					</span> 

					<span class="hidden-xs">

						<?php echo CHtml::link('Tambah Jenis Pengujian',
							array('create'),
							array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Pengujian'));
							?>
							<?php echo CHtml::link('Edit', 
								array('update', 'id'=>$model->id_testing,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Jenis Pengujian'));
									?>
									<?php echo CHtml::link('Hapus', 
										array('delete', 'id'=>$model->id_testing,
											),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Jenis Pengujian'));
											?>

										</span>

										<HR>

											<?php $this->widget('zii.widgets.CDetailView', array(
												'data'=>$model,
												'htmlOptions'=>array("class"=>"table"),
												'attributes'=>array(
													'code',
													'name',
													array(	
														'name'=>'status',
														'value'=>Users::model()->status($model->status),
														),
													),
													)); ?>

											<STYLE>
												th{width:150px;}
											</STYLE>

