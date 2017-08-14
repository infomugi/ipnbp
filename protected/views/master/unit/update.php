<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
'Units'=>array('admin'),
	$model->name=>array('view','id'=>$model->id_unit),
	'Edit',
	);

	$this->pageTitle='Edit Unit';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>