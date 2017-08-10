<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->name=>array('view','id'=>$model->id_setting),
	'Edit',
	);

	$this->pageTitle='Edit Favicon';
	?>

	<?php echo $this->renderPartial('_form_favicon', array('model'=>$model)); ?>