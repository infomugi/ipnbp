<?php
/* @var $this QuesionerweightController */
/* @var $data QuesionerWeight */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_quesioner_weight), array('view', 'id'=>$data->id_quesioner_weight)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_quesioner_weight',
		'name',
		'weight',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
