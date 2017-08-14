<?php
/* @var $this TestingController */
/* @var $model Testing */

$this->breadcrumbs=array(
'Testings'=>array('admin'),
	$model->name=>array('view','id'=>$model->id_testing),
	'Edit',
	);

	$this->pageTitle='Edit Testing';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>