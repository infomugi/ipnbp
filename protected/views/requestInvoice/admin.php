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
	'id'=>'request-invoice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'code',
		'date',
		'description',
		'total',
		'signature_id',
		'file_invoice',
		'file_spk',
		// 'note',
		// 'request_id',

		array(	
			'name'=>'status',
			'filter'=>array('0'=>'Disable','1'=>'Enable'),
			'value'=>'Users::model()->status($data->status)',
			),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
			'buttons'=>array(
				'view'=>
				array(
					'url'=>'Yii::app()->createUrl("RequestInvoice/view", array("id"=>$data->id_invoice))',
					'options'=>array(
						'ajax'=>array(
							'type'=>'POST',
							'url'=>"js:$(this).attr('href')",
							'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
							),
						),
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


