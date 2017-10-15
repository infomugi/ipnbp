<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */

$this->breadcrumbs=array(
	'Request Quesioners'=>array('index'),
	$model->id_quesioner,
	);

$this->pageTitle='Detail RequestQuesioner';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
				array('delete', 'id'=>$model->id_quesioner,
					),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kuesioner'));
					?>

				</span> 

				<span class="hidden-xs">

					<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
						array('request/view', 'id'=>$model->request_id,
							), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
							?>
							<?php echo CHtml::link('Hapus', 
								array('delete', 'id'=>$model->id_quesioner,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kuesioner'));
									?>

								</span>

								<HR>


									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
															// 'id_quesioner',
															// 'created_id',
															// 'created_date',
															// 'company_id',
															// 'request_id',
															// 'report_id',
															// 'unit',
											array('name'=>'question_1','value'=>RequestQuesioner::model()->answer($model->question_1)),
											array('name'=>'question_2','value'=>RequestQuesioner::model()->answer($model->question_2)),
											array('name'=>'question_3','value'=>RequestQuesioner::model()->answer($model->question_3)),
											array('name'=>'question_4','value'=>RequestQuesioner::model()->answer($model->question_4)),
											array('name'=>'question_5','value'=>RequestQuesioner::model()->answer($model->question_5)),
											array('name'=>'question_6','value'=>RequestQuesioner::model()->answer($model->question_6)),
											array('name'=>'question_7','value'=>RequestQuesioner::model()->answer($model->question_7)),
											array('name'=>'question_8','value'=>RequestQuesioner::model()->answer($model->question_8)),
											array('name'=>'question_9','value'=>RequestQuesioner::model()->answer($model->question_9)),
											array('name'=>'question_10','value'=>RequestQuesioner::model()->answer($model->question_10)),

											array('name'=>'question_11','value'=>RequestQuesioner::model()->answer($model->question_11)),
											array('name'=>'question_12','value'=>RequestQuesioner::model()->answer($model->question_12)),
											array('name'=>'question_13','value'=>RequestQuesioner::model()->answer($model->question_13)),
											array('name'=>'question_14','value'=>RequestQuesioner::model()->answer($model->question_14)),
											array('name'=>'question_15','value'=>RequestQuesioner::model()->answer($model->question_15)),
											array('name'=>'question_16','value'=>RequestQuesioner::model()->answer($model->question_16)),
											array('name'=>'question_17','value'=>RequestQuesioner::model()->answer($model->question_17)),
											array('name'=>'question_18','value'=>RequestQuesioner::model()->answer($model->question_18)),
											array('name'=>'question_19','value'=>RequestQuesioner::model()->answer($model->question_19)),
											array('name'=>'question_20','value'=>RequestQuesioner::model()->answer($model->question_20)),
											array('name'=>'question_21','value'=>RequestQuesioner::model()->answer($model->question_21)),
											array('name'=>'question_22','value'=>RequestQuesioner::model()->answer($model->question_22)),

															// 'status',
											),
											)); ?>

									<STYLE>
										th{width:150px;}
									</STYLE>

