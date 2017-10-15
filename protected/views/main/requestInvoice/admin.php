<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Request Invoices'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Invoice';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$model->search(),
// 			'filter'=>$model,	
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
		'description',

		array(	
			'name'=>'total',
			'value'=>'Request::model()->rupiah($data->total)',
			),


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
					'url'=>'Yii::app()->createUrl("main/requestinvoice/print", array("id"=>$data->id_invoice))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/print.png',
					),
				),
			),

		array(
			'header'=>'Kirim Email (Invoice)',      
			'class'=>'CButtonColumn',
			'template'=>'{Send}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Send'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/send", array("id"=>$data->id_invoice))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
					),
				),
			),	



		array(
			'header'=>'Download',      
			'class'=>'CButtonColumn',
			'template'=>'{Invoice}',
			'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Invoice'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/downloadinvoice", array("id"=>$data->id_invoice))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
					'visible'=>'$data->file_invoice!=NULL',
					),
				),
			),





		array(
			'header'=>'Upload',      
			'class'=>'CButtonColumn',
			'template'=>'{Upload Invoice}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Upload Invoice'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/uploadinvoice", array("id"=>$data->id_invoice))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/upload.png',
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
					'url'=>'Yii::app()->createUrl("main/requestinvoice/view", array("id"=>$data->id_invoice))',
					),
				'update'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/update", array("id"=>$data->id_invoice))',
					),
				'delete'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/delete", array("id"=>$data->id_invoice))',
					),
				),
			),
		),
		)); ?>


		<!-- Modal -->
		<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Popup Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><strong>Detail</strong> Invoice</h4>
					</div>
					<!-- Popup Content -->
					<div class="modal-body">
						<p>Details</p>
					</div>
					<!-- Popup Footer -->
					<div class="modal-footer">
						<BR>
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>


