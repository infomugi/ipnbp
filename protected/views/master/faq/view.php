<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs=array(
	'Faqs'=>array('admin'),
	$model->id_faq,
	);

$this->pageTitle='Detail Faq';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Faq'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Faq'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_faq,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Faq'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_faq,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Faq'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Tambah',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Faq'));
								?>
								<?php echo CHtml::link('Kelola',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Faq'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_faq,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Faq'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_faq,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Faq'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_faq',
															'created_date',
															'update_date',
															'question',
															'answer',
															'category_id',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

