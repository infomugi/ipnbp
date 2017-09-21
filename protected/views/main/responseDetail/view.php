<?php
/* @var $this ResponseDetailController */
/* @var $model ResponseDetail */

$this->breadcrumbs=array(
	'Response Details'=>array('index'),
	$model->id_response_detail,
	);

	$this->pageTitle='Detail ResponseDetail';
	?>

	<span class="visible-xs">

		<?php echo CHtml::link('<i class='fa fa-plus'></i>',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add ResponseDetail'));
		 ?>
		<?php echo CHtml::link('<i class='fa fa-tasks'></i>',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List ResponseDetail'));
		 ?>
		<?php echo CHtml::link('<i class='fa fa-table'></i>',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage ResponseDetail'));
		 ?>
		<?php echo CHtml::link('<i class='fa fa-edit'></i>', 
	 array('update', 'id'=>$model->id_response_detail,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit ResponseDetail'));
 ?>
		<?php echo CHtml::link('<i class='fa fa-remove'></i>', 
	 array('delete', 'id'=>$model->id_response_detail,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus ResponseDetail'));
 ?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Add',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add ResponseDetail'));
		 ?>
		<?php echo CHtml::link('List',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List ResponseDetail'));
		 ?>
		<?php echo CHtml::link('Manage',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage ResponseDetail'));
		 ?>
		<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_response_detail,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit ResponseDetail'));
 ?>
		<?php echo CHtml::link('Delete', 
	 array('delete', 'id'=>$model->id_response_detail,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus ResponseDetail'));
 ?>

	</span>

	<HR>

		<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array("class"=>"table"),
		'attributes'=>array(
					'id_response_detail',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'letter_attachment',
		'description',
		'request_id',
		'response_id',
		'status',
			),
			)); ?>

		<STYLE>
			th{width:150px;}
		</STYLE>

