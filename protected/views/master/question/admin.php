<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
	);

$this->pageTitle='Manage Pertanyaan';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn pull-right btn-primary btn-md'));
		?>

	</span> 


	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Pertanyaan',
			array('create'),
			array('class' => 'btn btn-primary btn-flat'));
			?>

			<?php echo CHtml::link('Bobot Pertanyaan',
				array('master/quesionerweight/admin'),
				array('class' => 'btn btn-primary btn-flat'));
				?>

				<?php echo CHtml::link('Kuesioner Pengujian',
					array('index','type'=>1),
					array('class' => 'btn btn-success btn-flat'));
					?>

					<?php echo CHtml::link('Kuesioner Advis Teknis',
						array('index','type'=>2),
						array('class' => 'btn btn-success btn-flat'));
						?>

						<?php echo CHtml::link('Kuesioner Sertifikasi',
							array('index','type'=>3),
							array('class' => 'btn btn-success btn-flat'));
							?>

						</span>	

						<HR>

							<?php $this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'question-grid',
								'dataProvider'=>$model->search(),
				//'filter'=>$model,
								'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
								'columns'=>array(

									array(
										'header'=>'No',
										'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
										'htmlOptions'=>array('width'=>'10px', 
											'style' => 'text-align: center;')),

									'question_sort',
									'question',
									'point',
									array('name'=>'type','value'=>'Question::model()->type($data->type)'),
									array('name'=>'category_id','value'=>'$data->QuesionerWeight->name . " (" . $data->QuesionerWeight->weight."%)"'),

					// 'attachment',
					// 'sub_id',
					// 'status',

									array(
										'class'=>'CButtonColumn',
										'template'=>'{update}{delete}',
										'buttons'=>array(
											'view'=>
											array(
												'url'=>'Yii::app()->createUrl("master/question/update", array("id"=>$data->id_question))',
								// 'options'=>array(
								// 	'ajax'=>array(
								// 		'type'=>'POST',
								// 		'url'=>"js:$(this).attr('href')",
								// 		'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
								// 		),
								// 	),
												),

											'delete'=>
											array(
												'url'=>'Yii::app()->createUrl("master/question/delete", array("id"=>$data->id_question))',
												),

											),
										),
									),
									)); ?>



									<!-- Modal -->
									<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<!-- Popup Header -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title"><strong>View</strong> Question</h4>
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


