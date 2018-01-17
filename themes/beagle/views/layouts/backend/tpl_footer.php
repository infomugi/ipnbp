
</div>

<!-- 
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/jquery/jquery.min.js" type="text/javascript"></script> 
-->
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
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
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/bootstrap-color/js/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/prettify/prettify.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/admin/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- 
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
		App.uiNotifications();
		// App.loaders();
		//Runs prettify
		// prettyPrint();
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

<script charset="utf-8" type="text/javascript">
	// FORM Invoice
	function terbilang1(){

		var bilangan=document.getElementById("nominal1").value; var kalimat=""; var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'); var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'); var tingkat = new Array('','Ribu','Juta','Milyar','Triliun'); var panjang_bilangan = bilangan.length; /* pengujian panjang bilangan */ if(panjang_bilangan > 15){kalimat = "Diluar Batas"; }else{/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */ for(i = 1; i <= panjang_bilangan; i++) {angka[i] = bilangan.substr(-(i),1); } var i = 1; var j = 0; /* mulai proses iterasi terhadap array angka */ while(i <= panjang_bilangan){subkalimat = ""; kata1 = ""; kata2 = ""; kata3 = ""; /* untuk Ratusan */ if(angka[i+2] != "0"){if(angka[i+2] == "1"){kata1 = "Seratus"; }else{kata1 = kata[angka[i+2]] + " Ratus"; } } /* untuk Puluhan atau Belasan */ if(angka[i+1] != "0"){if(angka[i+1] == "1"){if(angka[i] == "0"){kata2 = "Sepuluh"; }else if(angka[i] == "1"){kata2 = "Sebelas"; }else{kata2 = kata[angka[i]] + " Belas"; } }else{kata2 = kata[angka[i+1]] + " Puluh"; } } /* untuk Satuan */ if (angka[i] != "0"){if (angka[i+1] != "1"){kata3 = kata[angka[i]]; } } /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */ if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" "; } /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */ kalimat = subkalimat + kalimat; i = i + 3; j = j + 1; } /* mengganti Satu Ribu jadi Seribu jika diperlukan */ if ((angka[5] == "0") && (angka[6] == "0")){kalimat = kalimat.replace("Satu Ribu","Seribu"); } } document.getElementById("terbilang1").innerHTML=kalimat+" Rupiah"; 


	}

	$(function(){ 
		$('#terbilang_invoice').hide();
		$('#nominal1').click(function() {
			$('#terbilang_invoice').show();
			$('#RequestInvoice_note').val("Pembayaran tersebut agar di transfer ke Bank BNI Cabang Bandung dengan No. Rekening 00563 19680 an. BPN 095 Puslitbang Perumahan dan Pemukiman.");
		});
		jQuery('#nominal1').keyup(function () { 
			this.value = this.value.replace(/[^0-9\.]/g,'');
		});
	});	

	// FORM Payment
	function terbilang2()
	{
		var bilangan=document.getElementById("nominal2").value; var kalimat=""; var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'); var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'); var tingkat = new Array('','Ribu','Juta','Milyar','Triliun'); var panjang_bilangan = bilangan.length; /* pengujian panjang bilangan */ if(panjang_bilangan > 15){kalimat = "Diluar Batas"; }else{/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */ for(i = 1; i <= panjang_bilangan; i++) {angka[i] = bilangan.substr(-(i),1); } var i = 1; var j = 0; /* mulai proses iterasi terhadap array angka */ while(i <= panjang_bilangan){subkalimat = ""; kata1 = ""; kata2 = ""; kata3 = ""; /* untuk Ratusan */ if(angka[i+2] != "0"){if(angka[i+2] == "1"){kata1 = "Seratus"; }else{kata1 = kata[angka[i+2]] + " Ratus"; } } /* untuk Puluhan atau Belasan */ if(angka[i+1] != "0"){if(angka[i+1] == "1"){if(angka[i] == "0"){kata2 = "Sepuluh"; }else if(angka[i] == "1"){kata2 = "Sebelas"; }else{kata2 = kata[angka[i]] + " Belas"; } }else{kata2 = kata[angka[i+1]] + " Puluh"; } } /* untuk Satuan */ if (angka[i] != "0"){if (angka[i+1] != "1"){kata3 = kata[angka[i]]; } } /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */ if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" "; } /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */ kalimat = subkalimat + kalimat; i = i + 3; j = j + 1; } /* mengganti Satu Ribu jadi Seribu jika diperlukan */ if ((angka[5] == "0") && (angka[6] == "0")){kalimat = kalimat.replace("Satu Ribu","Seribu"); } } document.getElementById("terbilang2").innerHTML=kalimat+" Rupiah"; 
	}


	$(function(){ 
		
		$('#terbilang_payment').hide();

		$('#nominal2').change(function() {
			var a = $('#nominal2').val();
			var b = $('#balance').val();

			if(parseInt(a) > b){
				alert("Jumlah Pembayaran melebihi Sisa Bayar");
				$('#nominal2').val(0);
				$('#nominal2').focus();
			}else{
				$('#RequestPayment_file').focus();
			}
		});

		$('#nominal2').click(function() {
			$('#terbilang_payment').show();
		});


		jQuery('#nominal2').keyup(function () { 
			this.value = this.value.replace(/[^0-9\.]/g,'');
		});

		$("#RequestPayment_term").change(function () {
			var end = this.value;
			if(end==6){
				var balance = $('#balance').val();
				var nominal2 = $('#nominal2').val(balance);
			}else{
				var nominal2 = $('#nominal2').val(0);
			}
		});
		
		$('#ytRequest_disposition_letter').click(function() {
                    // $(this).closest('form').submit();
                    $('#disposisi').click();
                });
		
	});		

	$('#cp2').colorpicker({ format: 'hex', colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000', 'default': '#777777', 'primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e', 'danger': '#d9534f' } });

// 	$(document).ready(function () {
// 		$('a').click(function() {
//         //store the id of the collapsible element
//         localStorage.setItem('collapseItem', $(this).attr('href'));
//     });

// 		var collapseItem = localStorage.getItem('collapseItem'); 
// 		if (collapseItem) {
// 			$(collapseItem).collapse('show')
// 		}
// 	});



</script>


</body>
</html>