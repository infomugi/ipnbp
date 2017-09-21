<?php
/* @var $this ResponseDetailController */
/* @var $model ResponseDetail */

$this->breadcrumbs=array(
	'Response Details'=>array('index'),
	'Add',
	);

$this->pageTitle='Upload Lampiran Surat Tanggapan';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>