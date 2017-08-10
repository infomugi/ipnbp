<?php
/* @var $this TestingController */
/* @var $model Testing */

$this->breadcrumbs=array(
'Testings'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah Pengujian';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>