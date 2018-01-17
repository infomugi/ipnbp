<?php
/* @var $this RequestPaymentController */
/* @var $model RequestPayment */

$this->breadcrumbs=array(
	'Invoice'=>array('index'),
	$model->id_invoice,
	);

$this->pageTitle='Print Invoice - '.$model->code;

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

<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table, th, td {
		border: 1px solid black;
		padding: 10px;
	}
</style>

<div class="kotak">
	<div class="line3"></div>
	<div class="line2"></div>

	<div class="kotak" style="text-align:left">
		NOMOR : <?php echo $model->code; ?>
	</div>

	<BR> <BR>

		<div class="judul"><U>I N V O I C E</U></div>
		<BR> <BR>

		</div>

		<div class="kotak">
			<div class="kiri">

				Kepada Yth. : </BR>
				<B>
					<?php echo RequestPayment::model()->findCompany($model->Request->company_id); ?></BR>
					<?php echo RequestPayment::model()->findCompanyAddress($model->Request->company_id); ?></BR>
					Up. <?php echo CompanyContact::model()->showUP($model->Request->company_id); ?>
				</B>

			</div>
			<div class="kanan" style="font-size:18px;line-height:20px;text-align: center;">

			</div>
		</div>




		<div class="kotak" style="text-align:justify;font-size:18px;line-height:20px;">
			<div class="isi">

				<BR> <BR>
					<p>
						<div class="jadwal">
							<table>
								<tr rowspan="3" style="text-align:center">
									<b>
										<td width="10%"><b>No.</b></td>
										<td width="50%"><b>Uraian</b></td>
										<td width="40%"><b>Jumlah</b></td>
									</b>
								</tr>

								<tr>
									<td width="10%"><br><br>1.</td>
									<td width="50%">Pembayaran Biaya Pekerjaan <b>"<?php echo $model->description; ?>"</b>
										<br>
										<b>SPK No : <?php echo $model->spk_no; ?>, Tanggal <?php echo Yii::app()->dateFormatter->format("dd MMM yyyy", $model->spk_date); ?></b>
									</td>
									<td width="40%"><br><br><b>Rp. <?php echo Yii::app()->numberFormatter->format("###,###,###",$model->total); ?>,-</b></td>
								</tr>

								<tr>
									<td width="10%"></td>
									<td width="50%"><center><b>Jumlah</b></center>
									</td>
									<td width="40%"><b>Rp. <?php echo Yii::app()->numberFormatter->format("###,###,###",$model->total); ?>,-</b></td>
								</tr>

								<tr>
									<td width="10%"></td>
									<td width="80%" colspan="2">Terbilang : == <?php echo ucwords(terbilang($model->total)); ?> Rupiah ==</td>
								</tr>

								<tr>
									<td width="10%"></td>
									<td width="80%" colspan="2">Catatan : <?php echo $model->note; ?></td>
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
											Bendahara Penerima Negara - PNBP<BR>
											<BR> <BR> <BR> <BR> 
												<b><u><?php echo $model->Signature->address; ?></u></b><BR>
												<?php echo $model->Signature->name; ?>
											</div>
										</div>




