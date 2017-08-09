<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	'Offices'=>array('index'),
	$model->id_office,
	);

$this->pageTitle='Detail Office';
?>

<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
			array('index'),
			array('class' => 'btn btn-primary btn-flat', 'title'=>'List Office'));
			?>
			<?php echo CHtml::link('<i class="fa fa-table"></i>',
				array('admin'),
				array('class' => 'btn btn-primary btn-flat','title'=>'Manage Office'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
					array('update', 'id'=>$model->id_office,
						), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Office'));
						?>
						<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
							array('delete', 'id'=>$model->id_office,
								),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Office'));
								?>

							</span> 

							<span class="hidden-xs">

									<?php echo CHtml::link('List',
										array('index'),
										array('class' => 'btn btn-primary btn-flat', 'title'=>'List Office'));
										?>
										<?php echo CHtml::link('Manage',
											array('admin'),
											array('class' => 'btn btn-primary btn-flat','title'=>'Manage Office'));
											?>
											<?php echo CHtml::link('Edit', 
												array('update', 'id'=>$model->id_office,
													), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Office'));
													?>
													<?php echo CHtml::link('Delete', 
														array('delete', 'id'=>$model->id_office,
															),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Office'));
															?>

														</span>

														<HR>

															<?php $this->widget('zii.widgets.CDetailView', array(
																'data'=>$model,
																'htmlOptions'=>array("class"=>"table"),
																'attributes'=>array(
																	'address',
																	'phone',
																	'fax',
																	'maps',
																						
																	),
																	)); ?>

																	

															<STYLE>
																th{width:150px;}
															</STYLE>
