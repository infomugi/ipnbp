<?php
/* @var $this RequestController */
/* @var $disposition Request */
/* @var $form CActiveForm */
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'request-disposition-grid',
	'dataProvider'=>$dataDisposition,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'disposition_date',
		array(	
			'name'=>'disposition_to',
			'value'=>'$data->Balai->name',
			),
		array(	
			'name'=>'last_view',
			'value'=>'RequestDisposition::model()->views($data->last_view)',
			),
		array(	
			'name'=>'status',
			'filter'=>array('0'=>'Terkirim','1'=>'Diterima'),
			'value'=>'RequestDisposition::model()->status($data->status)',
			),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{delete}',
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("RequestDisposition/view", array("id"=>$data->id_disposition))',
					),
				'delete'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestdisposition/delete", array("id"=>$data->id_disposition))',
					),
				),
			),
		),
		)); ?>

