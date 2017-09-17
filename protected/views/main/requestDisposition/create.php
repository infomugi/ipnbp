<?php
/* @var $this RequestDispositionController */
/* @var $model RequestDisposition */

$this->breadcrumbs=array(
	'Request Dispositions'=>array('index'),
	'Add',
	);

$this->pageTitle='Disposisi Permohonan';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>