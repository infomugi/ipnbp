<div class="be-left-sidebar">
	<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Data Tables</a>
		<div class="left-sidebar-spacer">
			<div class="left-sidebar-scroll">
				<div class="left-sidebar-content">
					<ul class="sidebar-elements">
						<li class="divider">Menu</li>

						<?php if(YII::app()->user->record->level==1){ ?>

							<li><a href="<?php echo $url; ?>dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a></li>

							<li class="parent"><a href="#"><i class="icon mdi mdi-inbox"></i><span>Pelayanan</span></a>
								<ul class="sub-menu">
									<li><a href="<?php echo $url; ?>request/admin">Permohonan</a></li>
									<li><a href="<?php echo $url; ?>main/response/admin">Surat Tanggapan</a></li>
									<li class="parent"><a href="<?php echo $url; ?>main/requestschedule/admin">Jadwal & RAB</a>

										<ul class="sub-menu">
											<li><a href="<?php echo $url; ?>site/calendar/filter/request">Permohonan</a></li>

										</ul>

									</li>
									<li><a href="<?php echo $url; ?>main/requestinvoice/admin">Invoice</a></li>
									<li><a href="<?php echo $url; ?>main/requestpayment/admin">Pembayaran</a></li>
									<li><a href="<?php echo $url; ?>main/requestinvoice/spk">Surat Perjanjian Kerja</a></li>
									<li><a href="#">Hasil Uji</a></li>
									<li><a href="<?php echo $url; ?>main/requestquesioner/admin">Kuesioner</a></li>

								</ul>
							</li>
							<li class="parent"><a href="#"><i class="icon mdi mdi-chart-donut"></i><span>Referensi</span></a>
								<ul class="sub-menu">
									<li><a href="<?php echo $url; ?>master/unit/admin">Unit</a></li>
									<li><a href="<?php echo $url; ?>master/category/admin">Kategori Pengujian</a></li>
									<li><a href="<?php echo $url; ?>master/testing/admin">Jenis Pengujian</a></li>
									<li><a href="<?php echo $url; ?>master/company/admin">Perusahaan/ Instansi</a></li>

								</ul>
							</li>

							<li class="parent"><a href="#"><i class="icon mdi mdi-book"></i><span>Laporan</span></a>
								<ul class="sub-menu">
									<li><a href="<?php echo $url; ?>">Daftar Antrian</a></li>
									<li><a href="<?php echo $url; ?>">Laporan Advis Teknis</a></li>
									<li><a href="<?php echo $url; ?>">Laporan Sertifikasi</a></li>
									<li><a href="<?php echo $url; ?>/main/requestschedule/report">Laporan Pengujian</a></li>
									<li><a href="<?php echo $url; ?>">Laporan Kuesioner</a></li>

								</ul>
							</li>


							<li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Manajemen User</span></a>
								<ul class="sub-menu">
									<li><a href="<?php echo $url; ?>master/users/admin">Daftar User</a><li>
										<li><a href="<?php echo $url; ?>profile/<?php echo YII::app()->user->name; ?>">Profil User</a><li>
											<li><a href="<?php echo $url; ?>master/division/admin">Group User</a><li>
												<li><a href="<?php echo $url; ?>master/users/index">Otorisasi User</a><li>
												</ul>
											</li>

											<?php }else if(YII::app()->user->record->level==2){ ?>

												<li><a href="<?php echo $url; ?>dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a></li>

												<li class="parent"><a href="#"><i class="icon mdi mdi-inbox"></i><span>Pelayanan</span></a>
													<ul class="sub-menu">
														<li><a href="<?php echo $url; ?>site/balai">Permohonan</a></li>
														<li class="parent"><a href="<?php echo $url; ?>main/requestschedule/admin">Jadwal & RAB</a>
															<ul class="sub-menu">
																<li><a href="<?php echo $url; ?>site/calendar/filter/company">Perusahaan</a></li>
																<li><a href="<?php echo $url; ?>site/calendar/filter/request">Permohonan</a></li>

															</ul>
														</li>


													</ul>
												</li>

												<?php }else if(YII::app()->user->record->level==3){ ?>

													<?php }else{ ?>

														<?php } ?>


													</ul>
												</div>
											</div>
										</div>

									</div>
								</div>