<?php
/* @var $this RequestScheduleController */
/* @var $model RequestSchedule */

$this->breadcrumbs=array(
'Request Schedules'=>array('admin'),
	$model->id_schedule=>array('view','id'=>$model->id_schedule),
	'Edit',
	);

	$this->pageTitle='Edit RequestSchedule';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>