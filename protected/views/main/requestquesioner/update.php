<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */

$this->breadcrumbs=array(
	'Request Quesioners'=>array('index'),
	$model->id_quesioner=>array('view','id'=>$model->id_quesioner),
	'Edit',
	);

	$this->pageTitle='Edit RequestQuesioner';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>