<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('admin'),
	'Tambah',
	);

$this->pageTitle='Tambah Perusahaan';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>