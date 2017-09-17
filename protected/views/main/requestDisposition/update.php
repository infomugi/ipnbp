<?php
/* @var $this RequestDispositionController */
/* @var $model RequestDisposition */

$this->breadcrumbs=array(
	'Request Dispositions'=>array('index'),
	$model->id_disposition=>array('view','id'=>$model->id_disposition),
	'Edit',
	);

	$this->pageTitle='Edit RequestDisposition';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>