<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	$model->id_request=>array('view','id'=>$model->id_request),
	'Edit',
	);

$this->pageTitle='Edit Disposisi';
?>

<?php echo $this->renderPartial('_form_disposition', array('model'=>$model)); ?>