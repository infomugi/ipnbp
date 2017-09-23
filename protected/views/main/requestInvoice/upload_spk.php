<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Request Invoices'=>array('admin'),
	$model->id_invoice=>array('view','id'=>$model->id_invoice),
	'Edit',
	);

$this->pageTitle='Upload SPK';
?>

<?php echo $this->renderPartial('_form_upload_spk', array('model'=>$model)); ?>