<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Company';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Company'));
		?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Company'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_company,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Company'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_company,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Company'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('Add',
								array('create'),
								array('class' => 'btn btn-primary btn-flat','title'=>'Add Company'));
								?>
								<?php echo CHtml::link('Manage',
									array('admin'),
									array('class' => 'btn btn-primary btn-flat','title'=>'Manage Company'));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_company,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Company'));
											?>
											<?php echo CHtml::link('Delete', 
												array('delete', 'id'=>$model->id_company,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Company'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															'id_company',
															'created_date',
															'update_date',
															'company_code',
															'name',
															'owner',
															'address',
															'email',
															'phone',
															'faximile',
															'postal_code',
															'type',
															'place',
															'classification',
															'province_id',
															'district_id',
															'category_id',
															'status',
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

