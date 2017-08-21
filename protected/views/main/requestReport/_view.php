<?php
/* @var $this RequestReportController */
/* @var $data RequestReport */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_report), array('view', 'id'=>$data->id_report)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_report',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'upload_date',
		'accept_date',
		'description',
		'file',
		'request_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
