<?php
/* @var $this RequestQuesionerController */
/* @var $data RequestQuesioner */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_quesioner), array('view', 'id'=>$data->id_quesioner)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_quesioner',
		'created_id',
		'created_date',
		'company_id',
		'request_id',
		'report_id',
		'unit',
		'question_1',
		'question_2',
		'question_3',
		'question_4',
		'question_5',
		'question_6',
		'question_7',
		'question_8',
		'question_9',
		'question_10',
		'question_11',
		'question_12',
		'question_13',
		'question_14',
		'question_15',
		'question_16',
		'question_17',
		'question_18',
		'question_19',
		'question_20',
		'question_21',
		'question_22',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
