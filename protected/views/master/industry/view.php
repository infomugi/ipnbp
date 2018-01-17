<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategories'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Kategori Instansi';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-md'));
		?>
		
		<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
			array('update', 'id'=>$model->id_industry,
				), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kategori Instansi'));
				?>
			<!-- 	<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
					array('delete', 'id'=>$model->id_industry,
						),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kategori Instansi'));
						?> -->

					</span> 

					<span class="hidden-xs">

						<?php echo CHtml::link('Tambah Kategori Instansi',
							array('create'),
							array('class' => 'btn btn-primary btn-flat'));
							?>

							<?php echo CHtml::link('Edit', 
								array('update', 'id'=>$model->id_industry,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kategori Instansi'));
									?>
								<!-- 	<?php echo CHtml::link('Delete', 
										array('delete', 'id'=>$model->id_industry,
											),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kategori Instansi'));
											?> -->

										</span>

										<HR>

											<?php $this->widget('zii.widgets.CDetailView', array(
												'data'=>$model,
												'htmlOptions'=>array("class"=>"table"),
												'attributes'=>array(
											// 'id_industry',
													'name',
													'description',
													array('name'=>'status','value'=>Users::model()->status($model->status)),
													),
													)); ?>

											<STYLE>
												th{width:150px;}
											</STYLE>

