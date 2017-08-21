<?php
/* @var $this RequestReportController */
/* @var $model RequestReport */

$this->breadcrumbs=array(
'Request Reports'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah RequestReport';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>