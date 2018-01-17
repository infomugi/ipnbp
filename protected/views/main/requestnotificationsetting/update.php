<?php
/* @var $this Setting NotifikasiController */
/* @var $model Setting Notifikasi */

$this->breadcrumbs=array(
	'Request Notification Settings'=>array('index'),
	$model->id_notification_setting=>array('view','id'=>$model->id_notification_setting),
	'Edit',
	);

$this->pageTitle='Edit Notifikasi ( Hari )';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>