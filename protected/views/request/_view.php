<?php
/* @var $this RequestController */
/* @var $data Request */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_request), array('view', 'id'=>$data->id_request)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_request',
		'code',
		'created_date',
		'created_id',
		'update_date',
		'update_id',
		'date',
		'company_id',
		'letter_date',
		'letter_code',
		'letter_subject',
		'letter_attachment',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
