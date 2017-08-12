<?php
/* @var $this IndustryController */
/* @var $model Industry */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	$model->name=>array('view','id'=>$model->id_industry),
	'Edit',
	);

	$this->pageTitle='Edit Industry';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>