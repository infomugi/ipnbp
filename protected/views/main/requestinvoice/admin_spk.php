<?php
/* @var $this RequestInvoiceController */
/* @var $model RequestInvoice */

$this->breadcrumbs=array(
	'Request Invoices'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Surat Perintah Kerja';
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
			'name'=>'spk_no',
			'value'=>'$data->spk_no',
			),	

		array(	
			'name'=>'spk_date',
			'value'=>'$data->spk_date',
			),						

		array(	
			'header'=>'Nama Perusahaan',
			'value'=>'Company::model()->name($data->Request->company_id)',
			),							


		array(	
			'name'=>'total',
			'value'=>'Request::model()->rupiah($data->total)',
			),


		array(	
			'name'=>'balance',
			'value'=>'Request::model()->rupiah($data->balance)',
			),	

		array(	
			'name'=>'status',
			'value'=>'RequestPayment::model()->term($data->status)',
			),	

		array(
			'header'=>'Download',      
			'class'=>'CButtonColumn',
			'template'=>'{SPK}',
			'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'SPK'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/downloadspk", array("id"=>$data->id_invoice))',
					'imageUrl'=>YII::app()->baseUrl.'/image/setting/spk.png',
					'visible'=>'$data->file_spk!=NULL',
					),
				),
			),

		array(
			'header'=>'Upload',      
			'class'=>'CButtonColumn',
			'template'=>'{Upload SPK}',
			'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'Upload SPK'=>
				array(
					'url'=>'Yii::app()->createUrl("main/requestinvoice/uploadspk", array("id"=>$data->id_invoice))',
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


