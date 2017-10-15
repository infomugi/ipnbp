	<!-- START TAB: 2 -->
	<div class="panel panel-border-color panel-border-color-primary">
		<div class="tab-container">
			<ul class="nav nav-tabs" id="myTab">
				<li><a href="#pengujian" data-toggle="tab"><span class="icon mdi mdi-case-check"></span><span class="hidden-xs">1. Pengujian</span></a></li>
				<li><a href="#jadwal" data-toggle="tab"><span class="icon mdi mdi-calendar"></span><span class="hidden-xs">2. Jadwal & RAB</span></a></li>
				<li><a href="#laporan" data-toggle="tab"><span class="icon mdi mdi-layers"></span><span class="hidden-xs">3. Laporan</span></a></li>
				<li><a href="#riwayat" data-toggle="tab"><span class="icon mdi mdi-filter-list"></span><span class="hidden-xs">4. Riwayat</span></a></li>
			</ul>
			<div class="tab-content">

				<div id="pengujian" class="tab-pane">
					<h4>Tambah Pengujian</h4>
					<?php echo $this->renderPartial('_form_testing', 
						array(
							'testing'=>$testing,
							'dataTesting'=>$dataTesting,
							)); ?>
						</div>

						<div id="jadwal" class="tab-pane">
							<h4>Tambah Jadwal</h4>
							<?php echo $this->renderPartial('_form_schedule', 
								array(
									'schedule'=>$schedule,
									'dataSchedule'=>$dataSchedule,
									'request_id'=>$model->id_request,
									)); ?>
								</div>

								<div id="laporan" class="tab-pane">
									<h4>Tambah Laporan</h4>
									<?php echo $this->renderPartial('_form_report', 
										array(
											'report'=>$report,
											'dataReport'=>$dataReport,
											)); ?>

										</div>

										<div id="riwayat" class="tab-pane">
											<h4>Riwayat</h4>
											<?php echo $this->renderPartial('_form_activity', 
												array(
													'activity'=>$activity,
													)); ?>
												</div>


											</div>
										</div>
									</div>
									<!-- START TAB: 2 -->