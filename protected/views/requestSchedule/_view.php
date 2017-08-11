<?php
/* @var $this RequestScheduleController */
/* @var $data RequestSchedule */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_schedule), array('view', 'id'=>$data->id_schedule)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_schedule',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'task',
		'cost',
		'start_date',
		'end_date',
		'description',
		'note',
		'testing_number',
		'testing_id',
		'file',
		'request_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
