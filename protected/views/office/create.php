<?php
/* @var $this OfficeController */
/* @var $model Office */

$this->breadcrumbs=array(
	'Offices'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Office';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>