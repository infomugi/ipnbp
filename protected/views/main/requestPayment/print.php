<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Request Payments'=>array('admin'),
	$model->id_payment,
	);

$this->pageTitle='Print Kuitansi - '.$model->code;

$bulan = array(
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
	);

$buat = date_create($model->date);
$tanggal_buat = date_format($buat,'d').' '.(ucfirst($bulan[date_format($buat,'m')])).' '.date_format($buat,'Y'); 

function terbilang($satuan){
	$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh","sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return terbilang($satuan - 10)." belas";
	elseif ($satuan < 100)
		return terbilang($satuan / 10)." puluh".terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "seratus".terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return terbilang($satuan / 100)." ratus".terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "seribu".terbilang($satuan - 1000); 
	elseif ($satuan < 1000000)
		return terbilang($satuan / 1000)." ribu".terbilang($satuan % 1000); 
	elseif ($satuan < 1000000000)
		return terbilang($satuan / 1000000)." juta".terbilang($satuan % 1000000); 
	elseif ($satuan >= 1000000000)
		echo "Angka yang Anda masukkan terlalu besar";
}
?>

<div class="kotak">
	<div class="line3"></div>
	<div class="line2"></div>
	<BR> <BR>
		<div class="judul"><U>K U I T A N S I</U></div>
		<div class="info">NOMOR : <?php echo $model->code; ?></div>

	</div>

	<div class="kotak" style="text-align:justify;font-size:18px;line-height:20px;">
		<div class="isi">

			<BR> <BR>
				<p>
					<div class="jadwal">
						<table>
							<tr>
								<td width="28%">Sudah di Terima dari</td>
								<td width="2%">:</td>
								<td width="70%"> <b><?php echo RequestPayment::model()->findCompany($model->Request->company_id); ?></b></td>
							</tr>
							<tr>
								<td width="28%">Banyaknya Uang</td>
								<td width="2%">:</td>
								<td width="70%"> <b>== <?php echo strtoupper(terbilang($model->total)); ?> ==</b></td>
							</tr>
							<tr>
								<td width="28%">Untuk Pembayaran</td>
								<td width="2%">:</td>
								<td width="70%"><b><?php echo $model->Invoice->description; ?></b></td>
							</tr>

							<tr>
								<td width="28%"><b>Jumlah</b></td>
								<td width="2%">:</td>
								<td width="70%"> <b>Rp. <?php echo Yii::app()->numberFormatter->format("###,###,###",$model->total); ?>,-</b></td>
							</tr>


						</table>
					</div>
				</p>

			</div>
		</div>
		<BR>
			<BR>
				<div class="kotak">
					<div class="kiri">

					</div>
					<div class="kanan" style="font-size:18px;line-height:20px;text-align: center;">

						<BR>
							<BR>
								<BR>

									Bandung, <?php echo $tanggal_buat;?>
									<BR>
										Bendahara Penerima<BR>
										<BR> <BR> <BR> <BR> 
											<b><u>Ahmad Gojali</u></b><BR>
											NIP. 19690527 200701 1 002
										</div>
									</div>




