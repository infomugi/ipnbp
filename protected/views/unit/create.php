<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
'Units'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah Unit';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>