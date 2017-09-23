<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Jadwal & RAB'=>array('admin'),
	$model->id_schedule=>array('view','id'=>$model->id_schedule),
	'Edit',
	);

$this->pageTitle='Upload File RAB';
?>

<?php echo $this->renderPartial('_form_upload', array('model'=>$model)); ?>