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
															// 'id_company',
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
											array('name'=>'type','value'=>Company::model()->type($model->type)),
											array('name'=>'place','value'=>Company::model()->place($model->place)),
											array('name'=>'classification','value'=>Company::model()->classification($model->classification)),
											'province',
											'city',
											'category_id',
											array('name'=>'status','value'=>Users::model()->status($model->status)),
											),
											)); ?>

									<STYLE>
										th{width:150px;}
									</STYLE>

