<?php
/* @var $this DivisionController */
/* @var $model Division */

$this->breadcrumbs=array(
	'Divisions'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Division - '.$model->name;
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
		array('update', 'id'=>$model->id_division,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Division'));
			?>
			<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
				array('delete', 'id'=>$model->id_division,
					),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Division'));
					?>

				</span> 

				<span class="hidden-xs">


					<?php echo CHtml::link('Edit', 
						array('update', 'id'=>$model->id_division,
							), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Division'));
							?>
							<?php echo CHtml::link('Delete', 
								array('delete', 'id'=>$model->id_division,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Delete Division'));
									?>

								</span>

								<HR>

									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											'name',
											'description',
											
											array(	
												'name'=>'status',
												'value'=>Users::model()->status($model->status),
												),
											
											),
											)); ?>

									<STYLE>
										th{width:150px;}
									</STYLE>

