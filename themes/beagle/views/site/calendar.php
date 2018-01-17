<?php
if($filter=="company"){
	$url = 'request/calendarcompany/';
	$title = "Data Masuk Permohonan Pengujian";
	$this->pageTitle=$title;
}elseif($filter=="request"){
	$urlDetail = Yii::app()->createUrl('/request/detail/id/');
	$url = 'request/calendarrequest/';
	$title = "Jadwal Pengujian Per Balai";
	$this->pageTitle=$title;
}elseif($filter=="balai"){
	$urlDetail = Yii::app()->createUrl('/request/unit/balai/'.$balai.'/id/');
	$url = 'request/calendarrequestdivision/balai/'.$balai;
	$title = "( ".RequestSchedule::model()->unitSchedule($balai). " ) Jadwal Pengujian - ".Unit::model()->name($balai);
	$this->pageTitle=$title;
}else{
	$url = 'request/calendarcompany/';
}
?>

<div class="row">

	<form action="<?php echo $this->createUrl('site/calendarbalai/filter/');?>" method="post">

		<input type="text" name="filter" value="balai" style="display:none">

		<div class="col-md-10">
			<div class="form-group">

				<select name="balai" class="form-control input-lg" required="true">
					<option value="">- Pilih Balai -</option>
					<?php foreach (Unit::getBalai() as $data) { ?>
						<option <?php if($balai==$data["id_unit"]){echo 'selected="selected"';}  ?> value="<?php echo $data["id_unit"]; ?>"><?php echo $data["name"]; ?></option>
						<?php } ?>
					</select>

				</div>  
			</div>  	

			<div class="col-md-2">
				<div class="form-group">

					<input class="btn btn-info btn-lg btn-block pull-right" type="submit" value="Tampilkan" >

				</div>
			</div>

		</form>
	</div>

	<div class="row">
		<div class="col-md-12">
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
						$("#myModalBody").load("'.$urlDetail."/".'"+calEvent.id+"?asModal=true");
						$("#myModal").modal();
					}',

					)));
					?>
				</div>
			</div>

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