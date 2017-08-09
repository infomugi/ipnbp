<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Message';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>