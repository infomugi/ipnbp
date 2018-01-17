<?php
/* @var $this RequestReportController */
/* @var $model RequestReport */

$this->breadcrumbs=array(
	'Request Reports'=>array('admin'),
	'Tambah',
	);

$this->pageTitle='Kirim Email Konfirmasi';
?>

<?php echo $this->renderPartial('_form_email', array('model'=>$model)); ?>