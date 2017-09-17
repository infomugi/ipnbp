<?php
if(YII::app()->user->record->level==1){
	$this->pageTitle='Dashboard';
}else{
	$this->pageTitle='Dashboard - Permohonan Pengujian';
}
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'testing-grid',
	'dataProvider'=>$dataTesting,
				// 'filter'=>$model,	
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		// 'id_testing',

		array('name'=>'request_id','value'=>'$data->Request->letter_subject'),
		array('name'=>'testing_type','value'=>'$data->Testing->name'),
		array('name'=>'testing_lab','value'=>'$data->Lab->name'),
		array('name'=>'testing_part','value'=>'$data->Balai->name'),

		array(	
			'name'=>'status',
			'filter'=>array('0'=>'Disable','1'=>'Enable'),
			'value'=>'Users::model()->status($data->status)',
			),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
			'buttons'=>array(

				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("request/view", array("id"=>$data->request_id))',
					),
				),
			),
		),
		)); ?>