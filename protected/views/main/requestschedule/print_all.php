<?php
/* @var $this RequestScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Schedules',
	);

$this->pageTitle='Print - Laporan Pengujian Keseluruhan';

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan_Pengujian_".$startdate."_s/d_".$enddate.".xls");

?>

<H3>Laporan Pengujian</H3>
Rekapitulasi Hasil Pengujian Tanggal : <B><?php echo Request::model()->date($startdate); ?></B> s/d <B><?php echo Request::model()->date($enddate); ?></B> 
<HR>
	<div class="datagrid">
		<TABLE class="table-responsive table table-striped table-hover table-vcenter">
			<THEAD>
				<TR>
					<TD><B>No.</B></TD>
					<TD><B>Tgl Masuk Surat</B></TD>
					<TD><B>Nama Perusahaan / Instansi</B></TD>
					<TD><B>Tgl Surat & No Surat</B></TD>
					<TD><B>Perihal</B></TD>
					<TD><B>Disposisi</B></TD>
					<TD><B>Jenis Pengujian</B></TD>
					<TD><B>Tanggal Distribusi</B></TD>
					<TD><B>Lab</B></TD>
					<TD><B>Tgl Jawaban Lab</B></TD>
					<TD><B>Tgl Surat Keluar</B></TD>
					<TD><B>Tgl Uji</B></TD>
					<TD><B>Ket. Harga</B></TD>
					<TD><B>No. & Tgl Kontrak</B></TD>
					<TD><B>Tgl LHU</B></TD>
					<TD><B>Tgl LHU ke Loket</B></TD>
					<TD><B>Tgl LHU ke Client</B></TD>
					<TD><B>Sasaran Mutu (Hari)</B></TD>
					<TD><B>Realisasi (Hari)</B></TD>
					<TD><B>Evaluasi Sasaran Mutu</B></TD>
					<TD><B>Sisa Waktu</B></TD>
					<TD><B>Keterangan</B></TD>
				</TR>
			</THEAD>
			<TBODY>
				<?php 
				$x=0;
				foreach (Request::getReportAll($startdate,$enddate) as $data) { 
					$x++;
					?>
					<TR>
						<TD><?php echo $x; ?></TD>
						<TD><?php echo Request::model()->date($data['date']); ?></TD>
						<TD><?php echo $data['company_name']; ?></TD>
						<TD><?php echo $data['letter_code']; ?> - <?php echo Request::model()->date($data['letter_date']); ?></TD>
						<TD><?php echo $data['letter_subject']; ?></TD>
						<TD><?php echo "MA"; ?></TD>
						<TD><?php echo Request::model()->category($data['category_id']); ?></TD>
						<TD>
							<?php 
							foreach (Request::getReportDistribution($data['id']) as $distribution) { 
								echo Request::model()->date($distribution['disposition_date']); 
							}
							?>
						</TD>
						<TD>
							<?php 
							foreach (Request::getReportLab($data['id']) as $lab) { 
								echo $lab['code'].", "; 
							}
							?>
						</TD>
						<TD>
							<?php 
							foreach (Request::getReportLabAnswer($data['id']) as $answer) { 
								echo "<b>".$answer['code']."</b> : ".Request::model()->date($answer['date']); 
							}
							?>
						</TD>
						<TD>
							<?php 
							foreach (Request::getReportResponse($data['id']) as $response) { 
								echo Request::model()->date($response['date']); 
							}
							?>
						</TD>
						<TD>
							<?php 
							foreach (Request::getReportSchedule($data['id']) as $schedule) { 
								echo "<b>".$schedule['code']."</b> : (<i>".$schedule['task_name']."</i>) - ".Request::model()->date($schedule['start_date']); 
							}
							?>
						</TD>
						<TD>
							<?php 
							foreach (Request::getReportSchedule($data['id']) as $schedule) { 
								echo "<b>".$schedule['code']."</b>" . " : " . Request::model()->rupiah($schedule['cost']); 
							}
							?>
						</TD>

						<TD>
							<?php 
							foreach (Request::getReportSpk($data['id']) as $invoice) { 
								echo "<b>".$invoice['spk_no']."</b>" . " : " . Request::model()->date($invoice['spk_date']); 
							}
							?>
						</TD>

						<TD>
							<?php 
							foreach (Request::getReportDone($data['id']) as $invoice) { 
								echo "<b>".Request::model()->date($invoice['upload_date'])."</b>"; 
							}
							?>
						</TD>

						<TD>
							<?php 
							foreach (Request::getReportDone($data['id']) as $invoice) { 
								echo "<b>".Request::model()->date($invoice['accept_date'])."</b>"; 
							}
							?>
						</TD>

						<TD>
							<?php 
							foreach (Request::getReportDone($data['id']) as $invoice) { 
								echo "<b>".Request::model()->date($invoice['send_date'])."</b>"; 
							}
							?>
						</TD>

						<TD>
							<?php 
							echo RequestSchedule::model()->testingPeriode($data['id']);
							?>
						</TD>
					</TR>

					<?php } ?>
				</TBODY>
			</TABLE>
		</div>


		<style type="text/css">
			.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background-color:#000; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000000; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #000000; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #000000) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #000000 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#000000');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #000000; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
			h3{line-height: 0px;}
		</style>