<?php
/* @var $this RequestScheduleController */
/* @var $model RequestSchedule */

$this->breadcrumbs=array(
'Request Schedules'=>array('admin'),
'Tambah',
);

$this->pageTitle='Tambah RequestSchedule';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>