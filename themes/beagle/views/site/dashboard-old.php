<?php
$this->pageTitle='Beranda';
if($filter==1){
	$url = YII::app()->baseUrl . "main/request/calendarcompany/data/1";
}else{
	$url = YII::app()->baseUrl . "main/request/calendarcompany/data/2";
}
?>

<select class="form-control" name="filter" id="filter_status">
	<option value="all">-- Pilih Status Permohonan --</option>
	<option value="1">Permohonan</option>
	<option value="2">Disposisi</option>
	<option value="3">Surat Tanggapan</option>
	<option value="4">Invoice & SPK</option>
	<option value="5">Kuitansi</option>
	<option value="6">Laporan Dikirim</option>
	<option value="6">Laporan Diterima</option>
</select>

<script type="text/javascript">
	$(document).on('change', 'select', function() {
		var val = $("#filter_status").val();
		window.location='<?php YII::app()->baseUrl; ?>/site/calendar/filter/' + val;
	});

</script>
<HR>
	<?php $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
	//'themeCssFile'=>'cupertino/jquery-ui.min.css',
		'id'=>'calendar',
		'options'=>array(

			'locale'=>'id',
			'initialLocaleCode'=>'id',

			'header'=>array(
				'left'=>'prev,today,next',
				'center'=>'title',
				'right'=>'month,agendaWeek,agendaDay',
				),
			'views'=>array(
				'listDay'=>array('buttonText'=>'Semua Hari'),
				'listWeek'=>array('buttonText'=>'Semua Minggu'),
				),        

			'events'=>$this->createUrl($url), 

			'eventClick'=> 'js:function(calEvent, jsEvent, view) {
				$("#myModalHeader").html(calEvent.title);
				$("#myModalBody").load("'.Yii::app()->createUrl("/main/request/detail/id/")."/".'"+calEvent.id+"?asModal=true");
				$("#myModal").modal();
			}',

			)));
			?>


			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

						<!-- Popup Header -->
						<div class="modal-header">
							<a class="close" data-dismiss="modal">&times;</a>
							<h4 id="myModalHeader">Modal header</h4>
						</div>

						<div class="modal-body" id="myModalBody">
							<p>Loading..</p>
						</div>
						<!-- Popup Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>