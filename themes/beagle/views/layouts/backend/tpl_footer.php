
</div>
</div>
</div>
</div>

</div>

<!-- 
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/jquery/jquery.min.js" type="text/javascript"></script> 
-->
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/js/main.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>

<!-- 
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/js/main.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script> 
-->

<script type="text/javascript">
	$(document).ready(function(){
		App.init();
		App.formElements();
	});

//Momen JS
if($('.format-date').length > 0){
	$('.format-date').each(function(){
		var ini = $(this);
		var tgl = ini.text();
		moment.locale('id');
		if(moment(tgl,'YYYY-MM-DD',true).isValid() || moment(tgl,'YYYY-MM-DD HH:mm:ss',true).isValid()){
			var formatTgl = moment(tgl, "YYYY-MM-DD HH:mm:ss").fromNow();
			ini.html(formatTgl);
		}
	});
} 
// Tab
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});
</script>


</body>
</html>