<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
'Request Invoices'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah RequestInvoice';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>