<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */

$this->breadcrumbs=array(
	'Request Quesioners'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add RequestQuesioner';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>