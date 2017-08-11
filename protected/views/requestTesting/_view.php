<?php
/* @var $this RequestTestingController */
/* @var $data RequestTesting */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_testing), array('view', 'id'=>$data->id_testing)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_testing',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'testing_type',
		'testing_lab',
		'testing_part',
		'request_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
