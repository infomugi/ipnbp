<?php
/* @var $this LaporanController */
/* @var $model Laporan */

$this->breadcrumbs=array(
'Request Reports'=>array('admin'),
$model->id_report,
);

$this->pageTitle='Detail Laporan';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Laporan'));
		 ?>
	<?php echo CHtml::link('<i class="fa fa-table"></i>',
	 array('admin'),
	 array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Laporan'));
		 ?>
	<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
	 array('update', 'id'=>$model->id_report,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Laporan'));
 ?>
	<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
	 array('delete', 'id'=>$model->id_report,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Laporan'));
 ?>

</span> 

<span class="hidden-xs">

	<?php echo CHtml::link('Tambah',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Tambah Laporan'));
		 ?>
	<?php echo CHtml::link('Kelola',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Kelola Laporan'));
		 ?>
	<?php echo CHtml::link('Edit', 
	 array('update', 'id'=>$model->id_report,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Laporan'));
 ?>
	<?php echo CHtml::link('Hapus', 
	 array('delete', 'id'=>$model->id_report,
		),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Laporan'));
 ?>

</span>

<HR>

	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table"),
	'attributes'=>array(
				'id_report',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'upload_date',
		'accept_date',
		'description',
		'file',
		'request_id',
		'status',
		),
		)); ?>

	<STYLE>
		th{width:150px;}
	</STYLE>

