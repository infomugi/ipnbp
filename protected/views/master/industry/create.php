<?php
/* @var $this IndustryController */
/* @var $model Industry */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	'Add',
	);

$this->pageTitle='Add Kategori';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>