<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Request Payments'=>array('admin'),
	$model->id_payment=>array('view','id'=>$model->id_payment),
	'Edit',
	);

$this->pageTitle='Upload - Kwitansi';
?>

<?php echo $this->renderPartial('_form_upload_payment', array('model'=>$model)); ?>