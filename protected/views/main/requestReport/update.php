<?php
/* @var $this RequestReportController */
/* @var $model RequestReport */
$this->breadcrumbs=array(
	'Request Reports'=>array('admin'),
	$model->id_report=>array('view','id'=>$model->id_report),
	'Edit',
	);

$this->pageTitle='Edit Laporan';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>