<?php
/* @var $this QuesionerweightController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quesioner Weights',
	);

	$this->pageTitle='List QuesionerWeight';
	?>

	<span class="visible-xs">

		<?php echo CHtml::link('<i class="fa fa-plus"></i>',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add QuesionerWeight'));
		 ?>
		<?php echo CHtml::link('<i class="fa fa-tasks"></i>',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List QuesionerWeight'));
		 ?>
		<?php echo CHtml::link('<i class="fa fa-table"></i>',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage QuesionerWeight'));
		 ?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Add',
	 array('create'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Add QuesionerWeight'));
		 ?>
		<?php echo CHtml::link('List',
	 array('index'),
 array('class' => 'btn btn-primary btn-flat', 'title'=>'List QuesionerWeight'));
		 ?>
		<?php echo CHtml::link('Manage',
	 array('admin'),
 array('class' => 'btn btn-primary btn-flat','title'=>'Manage QuesionerWeight'));
		 ?>

	</span>

	<HR>

		<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		)); ?>

