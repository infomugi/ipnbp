<?php
/* @var $this RequestScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Schedules',
	);

$this->pageTitle='Laporan Pengujian';
?>


<div class="alert alert-primary">Download Laporan Pengujian berdasarkan Perusahaan, <a class="label label-success" href="<?php echo YII::app()->baseUrl; ?>/Laporan - Pengujian Perusahaan.xls"><b>Disini</b></a>.</div>


<form action="<?php echo $this->createUrl('main/requestschedule/report');?>" method="post">


	<div class="row">
		<div class="col-md-10">
			<div class="form-group">

				<select name="company" class="select2 form-control select2-hidden-accessible" required="true">
					<option value="">- Pilih Perusahaan -</option>
					<?php foreach (Company::getCompany() as $data) { ?>
						<option value="<?php echo $data["id_company"]; ?>"><?php echo $data["name"]; ?></option>
						<?php } ?>
					</select>

				</div>  
			</div>  



			<div class="col-md-2">
				<div class="form-group">

					<input class="btn btn-info btn-large input-lg  btn-block pull-right" type="submit" value="Tampilkan" >

				</div>
			</div>
		</div>

	</form>


	<?php
	$this->widget('EExcelWriter', array(
		'dataProvider' => $dataProvider,
		'title'        => 'EExcelWriter',
		'stream'       => FALSE,
		'fileName'     => 'Laporan - Pengujian Perusahaan.xls',
		'columns'      => array(

			array(	
				'header'=>'Nama Perusahaan',
				'value'=>'Company::model()->name($data->Request->company_id)',
				),		

			array(	
				'header'=>'Status Pengujian',
				'value'=>'RequestSchedule::model()->status($data->status)',
				),

			array(	
				'header'=>'Jenis Pengujian',
				'value'=>'$data->Testing->name',
				),

			array(	
				'header'=>'Tgl Uji',
				'value'=>'Request::model()->date($data->start_date)." s/d ".Request::model()->date($data->end_date)',
				),

			array(	
				'header'=>'Tanggal Laporan',
				'value'=>'',
				),

			array(	
				'header'=>'Tanggal disampaikan ke Pelanggan',
				'value'=>'',
				),

			),
		));
		?>

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'schedule-grid',
			'dataProvider'=>$dataProvider,
				// 'filter'=>$model,	
			'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
			'columns'=>array(

				array(
					'header'=>'No',
					'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					'htmlOptions'=>array('width'=>'10px', 
						'style' => 'text-align: center;')),

				array(	
					'header'=>'Nama Perusahaan',
					'value'=>'Company::model()->name($data->Request->company_id)',
					),		

				array(	
					'header'=>'Status Pengujian',
					'value'=>'RequestSchedule::model()->status($data->status)',
					),

				array(	
					'header'=>'Jenis Pengujian',
					'value'=>'$data->Testing->name',
					),

				array(	
					'header'=>'Tgl Uji',
					'value'=>'Request::model()->date($data->start_date)." s/d ".Request::model()->date($data->end_date)',
					),

				array(	
					'header'=>'Tanggal Laporan',
					'value'=>'',
					),

				array(	
					'header'=>'Tanggal disampaikan ke Pelanggan',
					'value'=>'',
					),


				),
				)); ?>