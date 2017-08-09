<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	'Offices'=>array('index'),
	$model->id_office=>array('view','id'=>$model->id_office),
	'Edit',
	);

	$this->pageTitle='Edit Office';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>