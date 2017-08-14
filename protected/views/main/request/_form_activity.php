
<ul class="user-timeline user-timeline-compact">
	<li class="latest">
		<div class="user-timeline-date format-date"><?php echo $activity->request_date; ?></div>
		<div class="user-timeline-title">Permohonan</div>
		<div class="user-timeline-description">Tanggal Terima Permohonan</div>
	</li>
	<li>
		<div class="user-timeline-date format-date"><?php echo $activity->approve_date; ?></div>
		<div class="user-timeline-title">Disposisi</div>
		<div class="user-timeline-description">Tanggal Disposisi</div>
	</li>
	<li>
		<div class="user-timeline-date format-date"><?php echo $activity->response_date; ?></div>
		<div class="user-timeline-title">Surat Tanggapan</div>
		<div class="user-timeline-description">Tanggal Kirim Surat Tanggapan</div>
	</li>
	<li>
		<div class="user-timeline-date format-date"><?php echo $activity->invoice_date; ?></div>
		<div class="user-timeline-title">Invoice dan SPK</div>
		<div class="user-timeline-description">Tanggal Kirim Invoice dan SPK</div>
	</li>
	<li>
		<div class="user-timeline-date format-date"><?php echo $activity->payment_date; ?></div>
		<div class="user-timeline-title">Kuitansi</div>
		<div class="user-timeline-description">Tanggal Kirim Kuitansi</div>
	</li>
	<li>
		<div class="user-timeline-title">Laporan</div>
		<div class="user-timeline-date format-date"><?php echo $activity->report_send_date; ?></div>
		<div class="user-timeline-description">Tanggal Kirim Laporan</div>
		<div class="user-timeline-date format-date"><?php echo $activity->report_accept_date; ?></div>
		<div class="user-timeline-description">Tanggal Terima Laporan</div>
	</li>			
</ul>
