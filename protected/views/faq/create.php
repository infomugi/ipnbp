<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs=array(
'Faqs'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah Faq';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>