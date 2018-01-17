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

$this->pageTitle='Reminder';
?>

<!-- START TAB: 2 -->
<div class="panel panel-border-color panel-border-color-success">
	<div class="tab-container">
		<ul class="nav nav-tabs" id="myTab">
			<li><a href="#disposisi" data-toggle="tab"><span class="icon mdi mdi-case-check"></span><span class="hidden-xs">Disposisi</span></a></li>
			<li><a href="#tanggapan" data-toggle="tab"><span class="icon mdi mdi-collection-text"></span><span class="hidden-xs">Tanggapan</span></a></li>
			<li><a href="#invoice" data-toggle="tab"><span class="icon mdi mdi-card"></span><span class="hidden-xs">Invoice</span></a></li>
			<li><a href="#laporan" data-toggle="tab"><span class="icon mdi mdi-money-box"></span><span class="hidden-xs">Laporan</span></a></li>
			<li><a href="#info" data-toggle="tab"><span class="icon mdi mdi-layers"></span><span class="hidden-xs">Info Laporan</span></a></li>
			<li><a href="#kirim" data-toggle="tab"><span class="icon mdi mdi-filter-list"></span><span class="hidden-xs">Kirim</span></a></li>
			<li><a href="#feedback" data-toggle="tab"><span class="icon mdi mdi-filter-list"></span><span class="hidden-xs">Feedback</span></a></li>
		</ul>
		<div class="tab-content">

			<!-- <div id="tanggapan" class="tab-pane active cont"> -->
			<div id="disposisi" class="tab-pane">
				<div class="alert alert-success">Disposisi: <b>Apabila dalam <span class="badge badge-warning"><?php echo $notification->disposition_reminder; ?></span> hari belum mengunggah file disposisi dan mengirimkan ke balai</b>.</div>


				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(1); ?>
					</tbody>
				</table>



			</div>


			<div id="tanggapan" class="tab-pane">
				<div class="alert alert-success">Surat Tanggapan: <b>Apabila dalam <span class="badge badge-warning"><?php echo $notification->response_reminder; ?></span> hari belum merespon / memberikan surat jawaban kepada Pelanggan</b>.</div>

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(2); ?>
					</tbody>
				</table>


			</div>


			<div id="invoice" class="tab-pane">
				<div class="alert alert-success">Invoice: <b>Apabila status surat tanggapan = diterima dan jangka waktu > <span class="badge badge-warning"><?php echo $notification->invoice_reminder; ?></span> hari, harus membuat dan mengirim invoice</b>.</div>

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(3); ?>
					</tbody>
				</table>


			</div>

			<div id="laporan" class="tab-pane">
				<div class="alert alert-success">Laporan: <b>Apabila Jadwal Terakhir di pengujian telah selesai, dan belum membuat laporan</b>.</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(4); ?>
					</tbody>
				</table>
			</div>

			<div id="info" class="tab-pane">
				<div class="alert alert-success">Info Laporan: <b>Apabila balai sudah memberikan laporan hasil pengujian kepada pelanggan dan jangka waktu >= <span class="badge badge-warning"><?php echo $notification->report_info_reminder; ?></span> hari, memberitahu kepada pelanggan apakah mau dikirim via email atau diambil ke balai</b>.</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(5); ?>
					</tbody>
				</table>


			</div>

			<div id="kirim" class="tab-pane">
				<div class="alert alert-success">Kirim Laporan: <b>apabila laporan sudah diisi dan disimpan oleh admin dan jangka waktu >= <span class="badge badge-warning"><?php echo $notification->report_send_reminder; ?></span> hari</b>.</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width:70%;">Reminder</th>
							<th style="width:10%;">Jenis</th>
							<th style="width:10%;">Tanggal</th>
							<th style="width:10%;"></th>
						</tr>
					</thead>
					<tbody>
						<?php echo $this->actionNotification(6); ?>
					</tbody>
				</table>
			</div>

			<div id="feedback" class="tab-pane">
				<h4>Reminder Feedback Client</h4>

			</div>


		</div>
	</div>
</div>
														<!-- START TAB: 2 -->