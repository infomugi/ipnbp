<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
	'Units'=>array('admin'),
	$model->name,
	);

$this->pageTitle='Detail Unit';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Unit'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Unit'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_unit,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Unit'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_unit,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Unit'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Unit'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Unit'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_unit,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Unit'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_unit,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Unit'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_unit',
															'name',
															'address',
															'type',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

