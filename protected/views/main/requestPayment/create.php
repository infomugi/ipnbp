<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
'Request Payments'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah RequestPayment';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>