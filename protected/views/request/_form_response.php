<?php
/* @var $this ResponseController */
/* @var $response Response */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'response-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php //echo $form->errorSummary($response, null, null, array('class' => 'alert alert-warning')); ?>



		<div class="col-md-10">

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_date'); ?>
				</div>   

				<div class="col-sm-8">
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($response,'letter_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
					<?php echo $form->error($response,'letter_date'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($response,'letter_code',array('class'=>'form-control')); ?>
					<?php echo $form->error($response,'letter_code'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->fileField($response,'letter_attachment',array('class'=>'btn btn-info')); ?>
					<?php echo $form->error($response,'letter_attachment'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textArea($response,'description',array('class'=>'form-control')); ?>
					<?php echo $form->error($response,'description'); ?>
				</div>

			</div>  

			

			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($response->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div><!-- form -->


	<h4>Data Surat Tanggapan</h4>
	<?php 
// $this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'response-grid',
// 	'dataProvider'=>$dataResponse,
// 		// 'filter'=>$model,
// 	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
// 	'columns'=>array(

// 		array(
// 			'header'=>'No Revisi',
// 			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
// 			'htmlOptions'=>array('width'=>'10px', 
// 				'style' => 'text-align: center;')),

// 		'letter_date',
// 		'letter_code',
// 		'description',

// 		array(      
// 			'class'=>'CLinkColumn',      
// 			'header'=>'Surat Tanggapan',      
// 			'label'=>'Download',  
// 			'urlExpression'=>'Yii::app()->request->baseUrl."/image/files/response/".$data["letter_attachment"]',      
// 			), 

// 			// 'date_send',
// 			// 'date_feedback',
// 			// 'letter_attachment',
// 			// array(	
// 			// 	'name'=>'status',
// 			// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
// 			// 	'value'=>'Users::model()->status($data->status)',
// 			// 	),

// 		array(
// 			'class'=>'CButtonColumn',
// 			'template'=>'{view}{update}{delete}',
// 			'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
// 			'buttons'=>array(
// 				'view'=>
// 				array(
// 					'url'=>'Yii::app()->createUrl("main/response/view", array("id"=>$data->id_response))',
// 					),
// 				'update'=>
// 				array(
// 					'url'=>'Yii::app()->createUrl("main/response/update", array("id"=>$data->id_response))',
// 					),
// 				'delete'=>
// 				array(
// 					'url'=>'Yii::app()->createUrl("main/response/delete", array("id"=>$data->id_response))',
// 					),
// 				),
// 			),
// 		),
// 		)); 
	?>

	<div class="table-responsive">
		<table class="table table-responsive table-hover table-striped">
			<thead>
				<tr>
					<th>No. Surat</th>
					<th>Tanggal Surat</th>
					<th>Catatan</th>
					<th>Surat Tanggapan</th>
					<th>Kirim Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($dataResponse->getData() as $key => $valueTesting) { ?>

					<tr class="clickable" data-toggle="collapse" id="row1" data-target=".<?php echo $valueTesting->id_response; ?>">
						<td>
							<H4><i class="icon mdi mdi-caret-right-circle"></i> <?php echo $valueTesting->letter_code; ?></H4></td>
							<td><H4><?php echo $valueTesting->letter_date; ?></H4></td>
							<td><H4><?php echo $valueTesting->description; ?></H4></td>

							<td>
								<?php echo CHtml::link('<i class="icon mdi mdi-download"></i> Download', 
									array('main/requesttesting/download', 'id'=>$valueTesting->id_response,
										), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Download Surat Tanggapan'));
								?>

							</td>

							<td>
								<?php echo CHtml::link('<i class="icon mdi mdi-email"></i> Kirim', 
									array('main/response/send', 'id'=>$valueTesting->id_response,
										), array('class' => 'btn btn-sm btn-warning btn-flat', 'title'=>'Kirim Surat Tanggapan'));
								?>

							</td>

							<td>

								<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>', 
									array('main/responsedetail/create', 'request'=>$valueTesting->request_id, 'response'=>$valueTesting->id_response,
										), array('class' => 'btn btn-sm btn-primary btn-flat', 'title'=>'Tambah Lampiran untuk No. Surat '.$valueTesting->letter_code));
								?>

								<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
									array('main/response/update', 'id'=>$valueTesting->id_response,
										), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Edit Tanggapan'));
								?>


								<?php echo CHtml::link('<i class="icon mdi mdi-close"></i>', 
									array('main/response/delete', 'id'=>$valueTesting->id_response,
										), array('class' => 'btn btn-sm btn-danger btn-flat', 'title'=>'Hapus Tanggapan'));
								?>

							</td>
						</tr>

						<?php 
						$detailResponse=new CActiveDataProvider('ResponseDetail',array('criteria'=>array('condition'=>'request_id='.$valueTesting->request_id.' AND response_id='.$valueTesting->id_response)));
						foreach($detailResponse->getData() as $key => $detail) { 
							?>

							<tr class="collapse <?php echo $valueTesting->id_response; ?>">

								<td></td>
								<td class="format-date"><?php echo $detail->created_date; ?></td>
								<td><?php echo $detail->description; ?></td>
								<td colspan="2">
									<?php echo CHtml::link('<i class="icon mdi mdi-download"></i> Download', 
										array('main/responsedetail/download', 'id'=>$detail->id_response_detail,
											), array('class' => 'btn btn-sm btn-warning btn-flat', 'title'=>'Download Lampiran Surat Tanggapan'));
									?>

								</td>


								<td>

									<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
										array('main/responsedetail/update', 'id'=>$detail->id_response_detail,
											), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Update Tanggapan'));
									?>


									<?php echo CHtml::link('<i class="icon mdi mdi-close"></i>', 
										array('main/responsedetail/delete', 'id'=>$detail->id_response_detail,
											), array('class' => 'btn btn-sm btn-danger btn-flat', 'title'=>'Hapus Lampiran'));
									?>

								</td>

							</tr>

							<?php } ?> 

							<?php } ?> 

						</tbody>
					</table>
				</div>


