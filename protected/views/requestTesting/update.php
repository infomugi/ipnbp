<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */

$this->breadcrumbs=array(
'Request Testings'=>array('admin'),
	$model->id_testing=>array('view','id'=>$model->id_testing),
	'Edit',
	);

$this->pageTitle='Edit Tahapan Pengujian';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>