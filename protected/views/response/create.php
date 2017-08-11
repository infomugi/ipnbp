<?php
/* @var $this ResponseController */
/* @var $model Response */

$this->breadcrumbs=array(
'Responses'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah Response';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>