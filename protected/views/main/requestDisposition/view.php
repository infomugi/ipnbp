<?php
/* @var $this RequestDispositionController */
/* @var $model RequestDisposition */

$this->breadcrumbs=array(
	'Request Dispositions'=>array('index'),
	$model->id_disposition,
	);

$this->pageTitle='Detail Disposisi';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
		array('request/view', 'id'=>$model->request_id,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
				array('update', 'id'=>$model->id_disposition,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Disposisi'));
					?>
					<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
						array('delete', 'id'=>$model->id_disposition,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Disposisi'));
							?>

						</span> 

						<span class="hidden-xs">

							<?php echo CHtml::link('<i class="icon mdi mdi-arrow-left"></i> Kembali', 
								array('request/view', 'id'=>$model->request_id,
									), array('class' => 'btn btn-info btn-flat', 'title'=>'Kembali ke Data '.$model->Request->letter_subject));
									?>
									<?php echo CHtml::link('Edit', 
										array('update', 'id'=>$model->id_disposition,
											), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Disposisi'));
											?>
											<?php echo CHtml::link('Hapus', 
												array('delete', 'id'=>$model->id_disposition,
													),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Disposisi'));
													?>

												</span>

												<HR>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															// 'id_disposition',
															// 'request_id',
															'disposition_date',
															'disposition_to',
															array('name'=>'last_view','value'=>$model->last_view=="0000-00-00" ? "-" : $model->last_view),
															array('name'=>'disposition_to','value'=>$model->disposition_to==0 ? "-" : $model->Balai->name),
															// 'status',
															),
															)); ?>

													<?php $this->widget('zii.widgets.CDetailView', array(
														'data'=>$model,
														'htmlOptions'=>array("class"=>"table"),
														'attributes'=>array(
															array('name'=>'created_by','value'=>$model->created_by==0 ? "-" : $model->CreatedBy->first_name),
															array('name'=>'created_date','value'=>$model->created_by==0 ? "-" : $model->created_date),
															),
															)); ?>

													<STYLE>
														th{width:150px;}
													</STYLE>

