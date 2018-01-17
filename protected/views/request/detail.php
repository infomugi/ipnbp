<?php
/* @var $this RequestController */
/* @var $model Request */
$this->widget('ext.yii-toastr.MugiToastr', array(
	'flashMessagesOnly' => true, 
	'options' => array(
		"closeButton" => true,
		"debug" => true,
		"progressBar"=> true,
		"positionClass" => "toast-bottom-right",
		"showDuration" => "600",
		"hideDuration" => "1000",
		"timeOut" => "15000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
		)
	));

$this->breadcrumbs=array(
	'Requests'=>array('admin'),
	$model->id_request,
	);

$this->pageTitle='Detail Permohonan Pengujian - '.$model->code;
?>

<h5 class="alert alert-success">
	<?php echo $model->Company->name; ?> - <?php echo $model->letter_subject; ?>
</h5>
<div class="table-responsive">
	<table class="table table-responsive table-hover table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kegiatan Pengujian</th>
				<th>Jadual Pengujian</th>
				<th>Biaya</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($dataTesting->getData() as $key => $valueTesting) { ?>

				<tr class="clickable" data-toggle="collapse" id="row1" data-target=".<?php echo $valueTesting->id_testing; ?>">
					<td colspan="4"><H4><i class="icon mdi mdi-caret-right-circle"></i> <b><?php echo $valueTesting->Testing->name; ?></b> ( <?php echo Unit::model()->name($valueTesting->testing_part); ?> )</H4></td>
					<td>

						<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
							array('main/requesttesting/update', 'id'=>$valueTesting->id_testing,
								), array('class' => 'btn btn-sm btn-success btn-flat', 'title'=>'Edit Tahapan Pengujian'));
						?>

					</td>
				</tr>

				<?php 
				$detailSchedule=new CActiveDataProvider('RequestSchedule',array('criteria'=>array('condition'=>'request_id='.$valueTesting->request_id.' AND testing_id='.$valueTesting->id_testing)));
				foreach($detailSchedule->getData() as $key => $detailTesting) { ?>
					<tr class="collapse <?php echo $valueTesting->id_testing; ?>">
						<td><i class="icon mdi mdi-caret-right"></i> <?php echo RequestSchedule::model()->testingNumber($detailTesting->testing_number); ?></td>
						<td><?php echo $detailTesting->task; ?></td>
						<td><?php echo date("d-m-Y",strtotime($detailTesting->start_date)); ?> - <?php echo date("d-m-Y",strtotime($detailTesting->end_date)); ?></td>
						<td><?php echo Yii::app()->numberFormatter->format("Rp ###,###,###",$detailTesting->cost); ?></td>
						<td>

							<?php echo CHtml::link('<i class="icon mdi mdi-edit"></i>', 
								array('main/requestschedule/update', 'id'=>$detailTesting->id_schedule,
									), array('class' => 'btn btn-info btn-sm', 'title'=>'Edit Permohonan Penjadwalan'));
							?>
							<?php echo CHtml::link('<i class="icon mdi mdi-close-circle"></i>', 
								array('main/requestschedule/delete', 'id'=>$detailTesting->id_schedule,
									),  array('class' => 'btn btn-danger btn-sm', 'title'=>'Hapus Permohonan Penjadwalan'));
							?>

						</td>
					</tr>

					<?php } ?> 

					<?php } ?> 

				</tbody>
			</table>
		</div>