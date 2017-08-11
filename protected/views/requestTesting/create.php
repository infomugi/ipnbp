<?php
/* @var $this RequestTestingController */
/* @var $model RequestTesting */

$this->breadcrumbs=array(
'Request Testings'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah RequestTesting';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>