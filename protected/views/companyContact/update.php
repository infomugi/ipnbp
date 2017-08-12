<?php
/* @var $this CompanyContactController */
/* @var $model CompanyContact */

$this->breadcrumbs=array(
	'Company Contacts'=>array('index'),
	$model->name=>array('view','id'=>$model->id_company_contact),
	'Edit',
	);

	$this->pageTitle='Edit CompanyContact';
	?>

	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>