<?php
/* @var $this ResponseDetailController */
/* @var $data ResponseDetail */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_response_detail), array('view', 'id'=>$data->id_response_detail)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_response_detail',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'letter_attachment',
		'description',
		'request_id',
		'response_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
