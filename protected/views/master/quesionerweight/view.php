<?php
/* @var $this QuesionerweightController */
/* @var $model Bobot Kuesioner */

$this->breadcrumbs=array(
	'Quesioner Weights'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Bobot Kuesioner';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Bobot Kuesioner'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Bobot Kuesioner'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_quesioner_weight,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Bobot Kuesioner'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_quesioner_weight,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Bobot Kuesioner'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Add Bobot Kuesioner'));
								?>

								<?php echo CHtml::link('Edit', 
									array('update', 'id'=>$model->id_quesioner_weight,
										), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Bobot Kuesioner'));
										?>
										<?php echo CHtml::link('Delete', 
											array('delete', 'id'=>$model->id_quesioner_weight,
												),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Bobot Kuesioner'));
												?>

											</span>

											<HR>

												<?php $this->widget('zii.widgets.CDetailView', array(
													'data'=>$model,
													'htmlOptions'=>array("class"=>"table"),
													'attributes'=>array(
															// 'id_quesioner_weight',
														'name',
														'weight',
														'type',
														),
														)); ?>

												<STYLE>
													th{width:150px;}
												</STYLE>

