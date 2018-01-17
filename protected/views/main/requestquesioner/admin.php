<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */

$this->breadcrumbs=array(
	'Request Quesioners'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Kuesioner';
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'request-quesioner-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),


		array('name'=>'company_id','value'=>'$data->Company->name'),
		'created_date',
		array('name'=>'request_id','value'=>'$data->Request->letter_subject'),

		array(
			'name'=>'unit',
			'type'=>'html',
			'value' => function($data) {
				return CHtml::tag("div",array(),"<span class='label label-info'>".RequestQuesioner::model()->show($data["unit"])."</span>");
			}
			),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestquesioner/view", array("id"=>$data->id_quesioner))',
					),
				),
			),
		),
		)); ?>


