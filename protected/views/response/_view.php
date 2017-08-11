<?php
/* @var $this ResponseController */
/* @var $data Response */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_response), array('view', 'id'=>$data->id_response)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_response',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'letter_date',
		'letter_code',
		'letter_attachment',
		'date_send',
		'date_feedback',
		'description',
		'request_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
