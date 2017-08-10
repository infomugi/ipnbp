<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->name=>array('view','id'=>$model->id_setting),
	'Edit',
	);

	$this->pageTitle='Edit Social Media';
	?>

	<?php echo $this->renderPartial('_form_socialmedia', array('model'=>$model)); ?>