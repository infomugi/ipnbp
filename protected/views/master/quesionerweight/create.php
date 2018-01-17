<?php
/* @var $this QuesionerweightController */
/* @var $model QuesionerWeight */

$this->breadcrumbs=array(
	'Quesioner Weights'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Bobot Pertanyaan';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>