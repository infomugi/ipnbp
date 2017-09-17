<?php
/* @var $this RequestDispositionController */
/* @var $model RequestDisposition */

$this->breadcrumbs=array(
	'Request Dispositions'=>array('index'),
	$model->id_disposition,
	);

	$this->pageTitle='Detail Disposisi';
	?>

	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-plus"></i>',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Disposisi'));
		 ?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Disposisi'));
		 ?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Disposisi'));
		 ?>
		<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
	 array('update', 'id'=>$model->id_disposition,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Disposisi'));
 ?>
		<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
	 array('delete', 'id'=>$model->id_disposition,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Disposisi'));
 ?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Add',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add Disposisi'));
		 ?>
		<?php echo CHtml::link('List',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List Disposisi'));
		 ?>
		<?php echo CHtml::link('Manage',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage Disposisi'));
		 ?>
		<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_disposition,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Disposisi'));
 ?>
		<?php echo CHtml::link('Delete', 
	 array('delete', 'id'=>$model->id_disposition,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Disposisi'));
 ?>

	</span>

	<HR>

		<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array("class"=>"table"),
		'attributes'=>array(
					'id_disposition',
		'created_date',
		'created_by',
		'request_id',
		'disposition_date',
		'disposition_to',
		'last_view',
		'status',
			),
			)); ?>

		<STYLE>
			th{width:150px;}
		</STYLE>

