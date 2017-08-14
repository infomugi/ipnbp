<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Message';
?>

<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Message'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Message'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_message,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Message'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_message,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Message'));
								?>

							</span> 

							<span class="hidden-xs">

									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List Message'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage Message'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_message,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Message'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_message,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Message'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'id_message',
																	'created_date',
																	'title',
																	'name',
																	'email',
																	'message',
																	'read',
																	'status',
																	),
																	)); ?>

															<STYLE>
																th{width:150px;}
															</STYLE>

