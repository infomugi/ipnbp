<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
'Categories'=>array('index'),
'Tambah',
);

$this->pageTitle='Tambah Kategori';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>