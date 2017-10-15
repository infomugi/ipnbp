<?php
if(YII::app()->user->record->level==1){
	$this->pageTitle='Dashboard';
}else{
	$this->pageTitle='Permohonan Pengujian';
}
?>
<?php 
if(YII::app()->user->record->level==1){
	?>
	<H3><i class="mdi mdi-calendar"></i> Status Jadwal & RAB Balai</H3>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'status-balai-grid',
		'dataProvider'=>$dataShedule,
	// Different Color
		'rowCssClassExpression'=>'(RequestSchedule::model()->countSchedule($data->testing_part,$data->request_id,1)=="Balai Belum Membuat Jadwal & RAB")?"text-danger":"text-bold"',
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			array('name'=>'request_id','value'=>'$data->Request->letter_subject'),
			array('name'=>'testing_type','value'=>'$data->Testing->name'),
			array('name'=>'testing_lab','value'=>'$data->Lab->name'),
			array('name'=>'testing_part','value'=>'$data->Balai->name'),

			array(	
				'header'=>'Status Jadwal & RAB',
				'value'=>'RequestSchedule::model()->countSchedule($data->testing_part,$data->request_id,1)',
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

	<?php 
}else{
	?>
	<!--<H3>Data Pengujian Balai</H3>-->
	<?php
// 	$this->widget('zii.widgets.grid.CGridView', array(
// 		'id'=>'testing-grid',
// 		'dataProvider'=>$dataTesting,
// 				// 'filter'=>$model,	
// 		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
// 		'columns'=>array(

// 			array(
// 				'header'=>'No',
// 				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
// 				'htmlOptions'=>array('width'=>'10px', 
// 					'style' => 'text-align: center;')),

// 		// 'id_testing',

// 			array('name'=>'request_id','value'=>'$data->Request->letter_subject'),
// 			array('name'=>'testing_type','value'=>'$data->Testing->name'),
// 			array('name'=>'testing_lab','value'=>'$data->Lab->name'),
// 			array('name'=>'testing_part','value'=>'$data->Balai->name'),


// 			array(	
// 				'header'=>'Status Jadwal & RAB',
// 				'value'=>'RequestSchedule::model()->countSchedule($data->testing_part,$data->request_id,1)',
// 				),

// 		// array(	
// 		// 	'name'=>'status',
// 		// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
// 		// 	'value'=>'Users::model()->status($data->status)',
// 		// 	),

// 			array(
// 				'class'=>'CButtonColumn',
// 				'template'=>'{view}',
// 				'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
// 				'buttons'=>array(

// 					'view'=>
// 					array(
// 						'url'=>'Yii::app()->createUrl("request/view", array("id"=>$data->request_id))',
// 						),
// 					),
// 				),
// 			),
// 		));
		?>


	<!--<H3>Disposisi Balai</H3>-->
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
					
			 array('header'=>'Tanggal Masuk','value'=>'$data->Request->date'),

			'disposition_date',
			
            array(	
				'name'=>'disposition_to',
				'value'=>'$data->Balai->name',
            ),
            
            array('header'=>'Perihal','value'=>'$data->Request->letter_subject'),
			
			array('header'=>'Nama Perusahaan','value'=>'Company::model()->name($data->Request->company_id)'),

		
			
// 			array(	
// 				'name'=>'last_view',
// 				'value'=>'RequestDisposition::model()->views($data->last_view)',
// 				),

	        array('header'=>'Status','value'=>'Request::model()->history($data->Request->status)'),

			array(	
				'header'=>'Tindak Lanjut',
				'value'=>'RequestSchedule::model()->countSchedule($data->disposition_to,$data->request_id,2)',
				),

				// array(	
				// 	'name'=>'status',
				// 	'filter'=>array('0'=>'Terkirim','1'=>'Diterima'),
				// 	'value'=>'RequestDisposition::model()->status($data->status)',
				// 	),

			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}',
				'buttons'=>array(
					'view'=>
					array(
						'url'=>'Yii::app()->createUrl("request/view", array("id"=>$data->request_id))',
						),
					),
				),
			),
		)); ?>

	<?php 
}
?>