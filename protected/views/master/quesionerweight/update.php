<?php
/* @var $this QuesionerweightController */
/* @var $model QuesionerWeight */

$this->breadcrumbs=array(
	'Quesioner Weights'=>array('index'),
	$model->name=>array('view','id'=>$model->id_quesioner_weight),
	'Edit',
	);

	$this->pageTitle='Edit Bobot Pertanyaan';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>