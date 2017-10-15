<?php
/* @var $this RequestScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Schedules',
	);

$this->pageTitle='Print - Laporan Pengujian';
?>

<div class="col-md-12">

	<form action="<?php echo $this->createUrl('print');?>" method="post">


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

						<input class="btn btn-info btn-large input-lg  btn-block pull-right" type="submit" value="Generate" >

					</div>
				</div>
			</div>

		</form>
	</div>