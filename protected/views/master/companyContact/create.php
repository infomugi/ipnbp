<?php
/* @var $this CompanyContactController */
/* @var $model CompanyContact */

$this->breadcrumbs=array(
	'Company Contacts'=>array('index'),
	'Add',
	);

$this->pageTitle='Tambah Kontak Personal Perusahaan';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>