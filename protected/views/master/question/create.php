<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Add',
	);

$this->pageTitle='Buat Pertanyaan';
?>

<?php  echo $this->renderPartial('_form_create', array('model'=>$model)); ?>