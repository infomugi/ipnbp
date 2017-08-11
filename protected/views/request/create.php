<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
'Requests'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah Request';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>