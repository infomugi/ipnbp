<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
'Request Payments'=>array('admin'),
	$model->id_payment=>array('view','id'=>$model->id_payment),
	'Edit',
	);

	$this->pageTitle='Edit RequestPayment';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>