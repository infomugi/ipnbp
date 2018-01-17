<?php
/* @var $this LaporanController */
/* @var $model Laporan */

$this->breadcrumbs=array(
	'Request Reports'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Laporan';
?>

<!-- <span class="visible-xs">

	<?php echo CHtml::link('<i class="fa fa-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary btn-md'));
		?>

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Laporan',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>

		</span>	

		<HR> -->

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'report-grid',
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
						'name'=>'upload_date',
						'value'=>'Request::model()->timeNull($data->upload_date)',
						),

					array(	
						'name'=>'accept_date',
						'value'=>'Request::model()->timeNull($data->accept_date)',
						),


					'description',

					array(
						'header'=>'Kirim Email (Konfirmasi)',      
						'class'=>'CButtonColumn',
						'template'=>'{Confirmation}',
						'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'Confirmation'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/sendconfirmation", array("id"=>$data->id_report))',
								'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
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

					array(
						'header'=>'Download Laporan',      
						'class'=>'CButtonColumn',
						'template'=>'{File}',
						'htmlOptions'=>array('width'=>'15px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'File'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/download", array("id"=>$data->id_report))', 
								'imageUrl'=>YII::app()->baseUrl.'/image/setting/invoice.png',
								'visible'=>'$data->file!=NULL',
								),

							),
						),

					array(
						'header'=>'Kirim Email (Laporan)',      
						'class'=>'CButtonColumn',
						'template'=>'{Send}',
						'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'Send'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/send", array("id"=>$data->id_report))',
								'imageUrl'=>YII::app()->baseUrl.'/image/setting/email.png',
								),
							),
						),	

					array(
						'header'=>'Kirim Email (Kuesioner)',      
						'class'=>'CButtonColumn',
						'template'=>'{Quesioner}',
						'htmlOptions'=>array('width'=>'10px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'Quesioner'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/sendquesioner", array("id"=>$data->id_report))',
								'imageUrl'=>YII::app()->baseUrl.'/image/setting/kuesioner.png',
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
								'url'=>'Yii::app()->createUrl("main/requestreport/view", array("id"=>$data->id_report))',
								),
							'update'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/update", array("id"=>$data->id_report))',
								),
							'delete'=>
							array(
								'url'=>'Yii::app()->createUrl("main/requestreport/delete", array("id"=>$data->id_report))',
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
									<h4 class="modal-title"><strong>Detail</strong> Laporan</h4>
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


