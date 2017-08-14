<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Company';
?>


<?php echo CHtml::link('Tambah Kontak', 
	array('companycontact/create', 'id'=>$model->id_company,
		), array('class' => 'btn btn-info btn-flat', 'title'=>'Tambah Kontak Personal'));
		?>

		<HR>

			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
															// 'id_company',
					'created_date',
					'update_date',
					'company_code',
					'name',
					'owner',
					'address',
					'email',
					'phone',
					'faximile',
					'postal_code',
					array('name'=>'type','value'=>Company::model()->type($model->type)),
					array('name'=>'place','value'=>Company::model()->place($model->place)),
					array('name'=>'classification','value'=>Company::model()->classification($model->classification)),
					'province',
					'city',
					array('name'=>'category_id','value'=>$model->Industry->description),
					array('name'=>'status','value'=>Users::model()->status($model->status)),
					),
					)); ?>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'company-contact-grid',
				'dataProvider'=>$dataContact,
				// 'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),


					'name',
					'address',
					'phone',
					'email',

					array(
						'class'=>'CButtonColumn',
						'template'=>'{view}',
						'buttons'=>array(
							'view'=>
							array(
								'url'=>'Yii::app()->createUrl("CompanyContact/view", array("id"=>$data->id_company_contact))',
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

			<STYLE>
				th{width:150px;}
			</STYLE>

			<!-- Modal -->
			<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Popup Header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><strong>View</strong> Kontak Personal Perusahaan</h4>
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


