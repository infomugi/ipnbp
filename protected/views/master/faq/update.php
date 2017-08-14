<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs=array(
'Faqs'=>array('admin'),
	$model->id_faq=>array('view','id'=>$model->id_faq),
	'Edit',
	);

	$this->pageTitle='Edit Faq';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>