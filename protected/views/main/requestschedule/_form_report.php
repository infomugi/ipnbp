<?php
/* @var $this RequestScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Schedules',
	);

$this->pageTitle='Laporan Pengujian';
?>

<div class="col-md-12">
	<h3><i class="mdi mdi-print"></i> Per Perusahaan</h3>
	<form action="<?php echo $this->createUrl('print');?>" method="post">


		<div class="row">
			<div class="col-md-4">
				<div class="form-group">

					<select name="company" class="select2 form-control select2-hidden-accessible" required="true">
						<option value="">- Pilih Perusahaan -</option>
						<?php foreach (Company::getCompany() as $data) { ?>
							<option value="<?php echo $data["id_company"]; ?>"><?php echo $data["name"]; ?></option>
							<?php } ?>
						</select>

					</div>  
				</div>  

				<div class="col-md-3">

					<div class="form-group">



						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<input type="text" name="startdate" class="form-control" placeholder="Tanggal Mulai" required="true">
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						

					</div>  

				</div>  
				<div class="col-md-3">

					<div class="form-group">



						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<input type="text" name="enddate" class="form-control" placeholder="Tanggal Berakhir" required="true">
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>


					</div>  

				</div>  



				<div class="col-md-2">
					<div class="form-group">

						<input class="btn btn-info btn-large input-lg  btn-block pull-right" type="submit" value="Cetak" >

					</div>
				</div>
			</div>

		</form>

		<div class="alert alert-primary">
			Download Laporan Pengujian berdasarkan Perusahaan ke Excel, <a class="label label-warning" href="<?php echo YII::app()->baseUrl; ?>/Laporan - Pengujian Perusahaan.xls"><b>Disini</b></a>
		</div>


	</div>


	<div class="col-md-12">

		<h3><i class="mdi mdi-print"></i> Semua Perusahaan</h3>
		<form action="<?php echo $this->createUrl('printall');?>" method="post">


			<div class="row">

				<div class="col-md-5">

					<div class="form-group">



						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<input type="text" name="startdate" class="form-control" placeholder="Tanggal Mulai" required="true">
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>


					</div>  

				</div>  
				<div class="col-md-5">

					<div class="form-group">



						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<input type="text" name="enddate" class="form-control" placeholder="Tanggal Berakhir" required="true">
							<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>


					</div>  

				</div>  



				<div class="col-md-2">
					<div class="form-group">

						<input class="btn btn-info btn-large input-lg  btn-block pull-right" type="submit" value="Cetak" >

					</div>
				</div>
			</div>

		</form>


	</div>


