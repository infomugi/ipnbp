<?php
$this->pageTitle='Beranda';

if($filter=="company"){
	$url = 'request/calendarcompany/';
	$title = "Data Masuk Permohonan Pengujian";
}elseif($filter=="request"){
	$url = 'request/calendarrequest/';
	$title = "Jadwal Pengujian Per Bulan";
}else{
	$url = 'request/calendarcompany/';
}
?>
<H3><?php echo $title; ?></H3>
<?php $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
	// 'themeCssFile'=>'cupertino/jquery-ui.min.css',
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
			$("#myModalBody").load("'.Yii::app()->createUrl("/request/detail/id/")."/".'"+calEvent.id+"?asModal=true");
			$("#myModal").modal();
		}',

		)));
		?>


		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog ">
				<div class="modal-content modal-lg">

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