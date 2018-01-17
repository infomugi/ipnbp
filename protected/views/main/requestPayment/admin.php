<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Request Payments'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Pembayaran';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),
		
		array(	
			'header'=>'Nama Perusahaan',
			'value'=>'Company::model()->name($data->Request->company_id)',
				// 	'filter'=>Chtml::listData(Company::model()->findAll(),'id_company','name'),
			),	

		'code',
		'date',
		array('name'=>'term','value'=>'RequestPayment::model()->term($data->term)'),



		array(	
			'name'=>'total',
			'value'=>'Request::model()->rupiah($data->total)',
			),

				// 'balance',

		array(	
			'name'=>'balance',
			'value'=>'Request::model()->rupiah($data->balance)',
			),	

		array(
			'header'=>'Print',      
			'class'=>'CButtonColumn',
			'template'=>'{Print}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Print'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/print", array("id"=>$data->id_payment))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/print.png',
					),
				),
			),			

		array(
			'header'=>'Kirim Email (Kwintansi)',      
			'class'=>'CButtonColumn',
			'template'=>'{Send}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Send'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/send", array("id"=>$data->id_payment))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
					),
				),
			),						

		array(
			'header'=>'Download',      
			'class'=>'CButtonColumn',
			'template'=>'{File Kwintansi}{Bukti Pembayaran}',
			'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'File Kwintansi'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/downloadpayment", array("id"=>$data->id_payment))', 
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
					'visible'=>'$data->file_payment!=NULL',
					),
				'Bukti Pembayaran'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/download", array("id"=>$data->id_payment))', 
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/spk.png',
					'visible'=>'$data->file!=NULL',
					),

				),
			),


		array(
			'header'=>'Upload',      
			'class'=>'CButtonColumn',
			'template'=>'{Upload Kuitansi}{Upload Bukti Pembayaran}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Upload Kuitansi'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/uploadpayment", array("id"=>$data->id_payment))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload.png',
					'visible'=>'$data->print_by!=NULL',
					),
				'Upload Bukti Pembayaran'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/upload", array("id"=>$data->id_payment))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload_file.png',
					'visible'=>'$data->print_by!=NULL',
					),
				
				),
			),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/view", array("id"=>$data->id_payment))',
					),
				'update'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/update", array("id"=>$data->id_payment))',
					),
				'delete'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestpayment/delete", array("id"=>$data->id_payment))',
					),
				),
			),
		),
		)); ?>