<?php
/* @var $this LaporanController */
/* @var $model Laporan */
$this->pageTitle="Konfirmasi Laporan";
?>

<!-- Main Content Start -->
<div class="main main-raised">

	<div class="section-padding section-basic">
		<div class="container">
			<div class="row margin-bottom-80 text-center">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="title wow fadeInUp"><?php echo $request->Company->name; ?><br> <?php echo $request->letter_subject; ?></h3>
					<div class="section-divider"></div>
					<p class="description wow fadeInUp">Laporan</p>
				</div>
			</div><!-- /.row -->



			<div class="col-md-12">

				<p class="alert alert-success">
					Terimakasih <?php echo $request->Company->name; ?> telah melakukan konfirmasi. ( <?php echo RequestReport::model()->delivery($model->delivery); ?> ). 
				</p>
			</div>


		</div>
	</div>
</div>
<!-- End Main Content -->


