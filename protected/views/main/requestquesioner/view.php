<?php
/* @var $this RequestQuesionerController */
/* @var $model RequestQuesioner */

$this->breadcrumbs=array(
	'Request Quesioners'=>array('index'),
	$model->id_quesioner,
	);

$this->pageTitle='Detail Kuesioner';
$dataQuesioner=new CActiveDataProvider('Question',array('criteria'=>array('condition'=>'type='.$model->Request->created_id)));
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


									<?php
									echo "<table class='table table-responsive table-striped table-hover'>
									<THEAD>
										<TD><b>No.</b></TD>
										<TD width='70%'><b>Pertanyaan</b>
										</TD>
										<TD width='30%'>
											<span class='pull-left'>
												<b>
													<span class='label label-info'>Jawaban</span> 
												</b>
											</span>

										</TD>
									</THEAD>
									<TBODY>";
										$x=0;
										foreach($dataQuesioner->getData() as $key => $question) {
											$x++;
											?>

											<TR>
												<TD><?php echo CHtml::encode($question->question_sort); ?></TD>
												<TD><?php echo CHtml::encode($question->question); ?></TD>
												<TD><?php echo CHtml::encode(RequestQuesioner::model()->showAnswer($model->answers,$question->question_sort)); ?></TD>
											</TR>

											<?php
											
										}

										echo "</TBODY>";
										echo "<TFOOT><TD colspan='3'><span class='pull-right'>
										<b><span class='label label-info'>4</span> = Sangat Puas, <span class='label label-success'>3</span> = Puas, <span class='label label-warning'>2</span> = Kurang Puas, <span class='label label-danger'>1</span> = Tidak Puas</b></span></TD></TFOOT><TABLE>";
										echo "<HR>";

										?>
