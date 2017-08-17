<?php
/* @var $this Kategori PengujianController */
/* @var $model Kategori Pengujian */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Kategori Pengujian';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Kategori Pengujian'));
		?>
		<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
			array('update', 'id'=>$model->id_category,
				), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kategori Pengujian'));
				?>
				<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
					array('delete', 'id'=>$model->id_category,
						),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kategori Pengujian'));
						?>

					</span> 

					<span class="hidden-xs">

						<?php echo CHtml::link('Tambah Kategori Pengujian',
							array('create'),
							array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Kategori Pengujian'));
							?>
							<?php echo CHtml::link('Edit', 
								array('update', 'id'=>$model->id_category,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kategori Pengujian'));
									?>
									<?php echo CHtml::link('Hapus', 
										array('delete', 'id'=>$model->id_category,
											),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kategori Pengujian'));
											?>

										</span>

										<HR>

											<?php $this->widget('zii.widgets.CDetailView', array(
												'data'=>$model,
												'htmlOptions'=>array("class"=>"table"),
												'attributes'=>array(
															// 'id_category',
													'name',
													'description',
															// 'icon',
															// 'status',
															// 'id_user',
															// 'type',
													),
													)); ?>

											<STYLE>
												th{width:150px;}
											</STYLE>

