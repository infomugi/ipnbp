<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Permohonan Pengujian';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary pull-right btn-md'));
		?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah',
			array('create'),
			array('class' => 'btn btn-primary pull-right btn-flat'));
			?>

		</span>	

		<HR>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'request-grid',
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
					array('name'=>'company_id','value'=>'$data->Company->name'),

					array(	
						'name'=>'status',
						'filter'=>array('0'=>'Proses','1'=>'Selesai'),
						'value'=>'Users::model()->status($data->status)',
						),

					array(
						'class'=>'CButtonColumn',
						'template'=>'{view}{update}{delete}',
						'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'view'=>
							array(
								'url'=>'Yii::app()->createUrl("Request/view", array("id"=>$data->id_request))',
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
					<div class="panel panel-default">
						<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog custom-width">
								<div class="modal-content modal-lg">
									<!-- Popup Header -->
									

									<div class="modal-header">
										<button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
										<h3 class="modal-title">Form Modal</h3>
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
						</div>

