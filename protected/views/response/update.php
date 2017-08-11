<?php
/* @var $this ResponseController */
/* @var $model Response */

$this->breadcrumbs=array(
'Responses'=>array('admin'),
	$model->id_response=>array('view','id'=>$model->id_response),
	'Edit',
	);

	$this->pageTitle='Edit Response';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>