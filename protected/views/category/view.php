<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Category';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Category'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Category'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_category,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Category'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_category,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Category'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Category'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Category'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_category,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Category'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_category,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Category'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_category',
															'name',
															'description',
															'icon',
															'status',
															'id_user',
															'type',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

