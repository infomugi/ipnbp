<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	'Add',
	);

	$this->pageTitle='Add Faq';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>