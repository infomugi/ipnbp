<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs=array(
	'Faqs'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Faq';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-md'));
		?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Faq',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>

		</span>	

		<HR>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'faq-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

					'id_faq',
					'created_date',
					'update_date',
					'question',
					'answer',
					'category_id',

					array(	
						'name'=>'status',
						'filter'=>array('0'=>'Tidak Aktif','1'=>'Aktif'),
						'value'=>'Users::model()->status($data->status)',
						),

					array(
						'class'=>'CButtonColumn',
						'template'=>'{view}{update}',
						// 'template'=>'{view}{update}{delete}',
						'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'view'=>
							array(
								'url'=>'Yii::app()->createUrl("Faq/view", array("id"=>$data->id_faq))',
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
									<h4 class="modal-title"><strong>Detail</strong> Faq</h4>
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


