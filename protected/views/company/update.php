<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id_company),
	'Edit',
	);

	$this->pageTitle='Edit Company';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>