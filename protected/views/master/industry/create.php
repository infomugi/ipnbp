<?php
/* @var $this IndustryController */
/* @var $model Industry */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Industry';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>