<?php
/* @var $this ResponseDetailController */
/* @var $model ResponseDetail */

$this->breadcrumbs=array(
	'Response Details'=>array('index'),
	$model->id_response_detail=>array('view','id'=>$model->id_response_detail),
	'Edit',
	);

$this->pageTitle='Edit Lampiran';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>