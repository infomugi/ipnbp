<?php
$this->pageTitle='Dashboard';
?>

<div class="col-sm-6">
	<div class="panel panel-default panel-contrast">
		<div class="panel-body panel-body-contrast">

			<div id="container-2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		</div>
	</div>
</div>
<div class="col-sm-6">

	<div class="panel panel-default panel-contrast">
		<div class="panel-body panel-body-contrast">

			<div id="container-3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		</div>
	</div>

</div>

<div class="col-sm-12">
	<div class="panel panel-default panel-contrast">
		<div class="panel-body panel-body-contrast">

			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default panel-contrast">
		<div class="panel-body panel-body-contrast">

			<H3><i class="mdi mdi-calendar"></i> Jadwal Antrian</H3>
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'request-grid',
				'dataProvider'=>$dataRequest,
				// 'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

					'code',
					array('name'=>'date','value'=>'Request::model()->date($data->date)'),
					array('name'=>'company_id','value'=>'$data->Company->name'),
					'letter_subject',

					array(	
						'name'=>'status',
						'filter'=>array('0'=>'-','1'=>'Permohonan','2'=>'Disposisi','8'=>'Jadwal & RAB','3'=>'Surat Tanggapan','4'=>'Invoice & SPK','5'=>'Kuitansi','6'=>'Laporan Dikirim','7'=>'Laporan Diterima'),
						'value'=>'Request::model()->history($data->status)',
						),

					array('header'=>'Periode Pengujian','value'=>'RequestSchedule::model()->testingPeriode($data->id_request)'),

					array(
						'class'=>'CButtonColumn',
						'template'=>'{view}',
						'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'view'=>
							array(
								'url'=>'Yii::app()->createUrl("request/view", array("id"=>$data->id_request))',
								// 'options'=>array(
								// 	'ajax'=>array(
								// 		'type'=>'POST',
								// 		'url'=>"js:$(this).attr('href')",
								// 		'success'=>'function(data) { $("#viewModal .modal-body p").html(data); $("#viewModal").modal(); }'
								// 		),
								// 	),
								),						
							),
						),
					),
					)); ?>


				</div>
			</div>
		</div>


		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script type="text/javascript">

			$(function () {
				Highcharts.chart('container', {
					chart: {type: 'areaspline'}, 
					title: {text: 'Rekap Pendapatan Tahun <?php echo date('Y'); ?>'},
					legend: {layout: 'vertical', align: 'left', verticalAlign: 'top', x: 150, y: 100, floating: true, borderWidth: 1, backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'}, xAxis: {
						categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ], 
						plotBands: [{from: 200.5, to: 100.5, color: 'rgba(68, 170, 213, .2)'}] }, 
						yAxis: {title: {text: 'Total Pendapatan'} }, 
						tooltip: {shared: true, valueSuffix: ' Rupiah'}, 
						credits: {enabled: false }, 
						plotOptions: {areaspline: {fillOpacity: 0.5 } }, 
						series: [
						{
							name: 'Pengujian',
							data: [<?php for ($i=1; $i <= 12; $i++) {echo Request::model()->moneyReport($i,1).","; } ?> ] 
						},
						{
							name: 'Advis Teknis',
							data: [<?php for ($i=1; $i <= 12; $i++) {echo Request::model()->moneyReport($i,2).","; } ?> ] 
						},
						{
							name: 'Sertifikasi',
							data: [<?php for ($i=1; $i <= 12; $i++) {echo Request::model()->moneyReport($i,3).","; } ?> ] 
						},	
						{
							name: 'Inspeksi SLF',
							data: [<?php for ($i=1; $i <= 12; $i++) {echo Request::model()->moneyReport($i,4).","; } ?> ] 
						},														

						]
					});
			});
		</script>        


		<script type="text/javascript">
			Highcharts.chart('container-2', {
				chart: {
					type: 'column'
				},
				credits: {enabled: false }, 
				title: {
					text: 'Rekap Status Permohonan <?php echo date('Y'); ?>'
				},
				xAxis: {
					categories: ['Pengujian', 'Advis Teknis', 'Sertifikasi', 'Inspeksi SLF']
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Total Permohonan'
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					x: -30,
					verticalAlign: 'top',
					y: 25,
					floating: true,
					backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
					borderColor: '#CCC',
					borderWidth: 1,
					shadow: false
				},
				tooltip: {
					headerFormat: '<b>{point.x}</b><br/>',
					pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: true,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
					name: 'Selesai',
					data: [
					<?php echo Request::model()->countReport(1,1).","; ?>
					<?php echo Request::model()->countReport(2,1).","; ?>
					<?php echo Request::model()->countReport(3,1).","; ?>
					<?php echo Request::model()->countReport(4,1).","; ?>
					]
				}, {
					name: 'Proses',
					data: [
					<?php echo Request::model()->countReport(1,0).","; ?>
					<?php echo Request::model()->countReport(2,0).","; ?>
					<?php echo Request::model()->countReport(3,0).","; ?>
					<?php echo Request::model()->countReport(4,0).","; ?>
					]
				}
				]
			});
		</script>

		<script type="text/javascript">

			$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container-3', {
    	chart: {
    		plotBackgroundColor: null,
    		plotBorderWidth: null,
    		plotShadow: false,
    		type: 'pie'
    	},
    	credits: {enabled: false }, 
    	title: {
    		text: 'Profil Pelanggan'
    	},
    	tooltip: {
    		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    	},
    	plotOptions: {
    		pie: {
    			allowPointSelect: true,
    			cursor: 'pointer',
    			dataLabels: {
    				enabled: false
    			},
    			showInLegend: true
    		}
    	},
    	series: [{
    		name: 'Presentase',
    		colorByPoint: true,
    		data: [
    		{
    			name: 'Pemerintah',
    			y: <?php echo Company::model()->getTotalCompany(1); ?>
    		}, 
    		{
    			name: 'Swasta',
    			y: <?php echo Company::model()->getTotalCompany(2); ?>
    		}, 
    		{
    			name: 'Organisasi Masyarakat',
    			y: <?php echo Company::model()->getTotalCompany(3); ?>
    		},
    		{
    			name: 'Perguruan Tinggi',
    			y: <?php echo Company::model()->getTotalCompany(4); ?>
    		},
    		]
    	}]
    });
});
</script>