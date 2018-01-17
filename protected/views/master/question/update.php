<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id_question=>array('view','id'=>$model->id_question),
	'Edit',
	);

$this->pageTitle='Edit Pertanyaan';
?>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>