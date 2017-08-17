<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$url = Yii::app()->baseUrl."/"; 
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo $baseUrl; ?>/admin/assets/img/logo-fav.png">
	<title><?php echo $this->pageTitle; ?> - <?php echo YII::app()->name; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/daterangepicker/css/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/admin/assets/css/style.css" type="text/css"/>
</head>
<body>
	<div class="be-wrapper">
		<nav class="navbar navbar-default navbar-fixed-top be-top-header">
			<div class="container-fluid">
				<div class="navbar-header"><a href="#" class="navbar-brand"></a>
				</div>
				<div class="be-right-navbar">
					<ul class="nav navbar-nav navbar-right be-user-nav">
						<li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="<?php echo $baseUrl; ?>/admin/assets/img/avatar.png" alt="Avatar"><span class="user-name"><?php echo YII::app()->user->name; ?></span></a>
							<ul role="menu" class="dropdown-menu">
								<li>
									<div class="user-info">
										<div class="user-name"><?php echo YII::app()->user->name; ?></div>
										<div class="user-position online">Available</div>
									</div>
								</li>
								<li><a href="<?php echo $url; ?>profile/<?php echo YII::app()->user->name; ?>"><span class="icon mdi mdi-face"></span> Account</a></li>
								<li><a href="<?php echo $url; ?>setting/site"><span class="icon mdi mdi-settings"></span> Settings</a></li>
								<li><a href="<?php echo $url; ?>site/logout"><span class="icon mdi mdi-power"></span> Logout</a></li>
							</ul>
						</li>
					</ul>
					<!-- <div class="page-title"><span><?php echo YII::app()->name; ?></span></div> -->
					<ul class="nav navbar-nav navbar-right be-icons-nav">
						<li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
							<ul class="dropdown-menu be-notifications">
								<li>
									<div class="title">Notifications<span class="badge">3</span></div>
									<div class="list">
										<div class="be-scroller">
											<div class="content">
												<ul>
													<li class="notification notification-unread"><a href="#">
														<div class="image"><img src="<?php echo $baseUrl; ?>/admin/assets/img/avatar2.png" alt="Avatar"></div>
														<div class="notification-info">
															<div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
														</div></a></li>
														<li class="notification"><a href="#">
															<div class="image"><img src="<?php echo $baseUrl; ?>/admin/assets/img/avatar3.png" alt="Avatar"></div>
															<div class="notification-info">
																<div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
															</div></a></li>
															<li class="notification"><a href="#">
																<div class="image"><img src="<?php echo $baseUrl; ?>/admin/assets/img/avatar4.png" alt="Avatar"></div>
																<div class="notification-info">
																	<div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
																</div></a></li>
																<li class="notification"><a href="#">
																	<div class="image"><img src="<?php echo $baseUrl; ?>/admin/assets/img/avatar5.png" alt="Avatar"></div>
																	<div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="footer"> <a href="#">View all notifications</a></div>
												</li>
											</ul>
										</li>

									</ul>
								</div>
							</div>
						</nav>
						<div class="be-left-sidebar">
							<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Data Tables</a>
								<div class="left-sidebar-spacer">
									<div class="left-sidebar-scroll">
										<div class="left-sidebar-content">
											<ul class="sidebar-elements">
												<li class="divider">Menu</li>
												<!-- <li><a href="<?php echo $url; ?>dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
											</li> -->

											<li class="parent"><a href="#"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
												<ul class="sub-menu">
													<li><a href="<?php echo $url; ?>site/calendar/filter/company">Perusahaan</a></li>
													<li><a href="<?php echo $url; ?>site/calendar/filter/request">Permohonan</a></li>
													<li><a href="<?php echo $url; ?>site/calendar/filter/request">Biaya</a></li>

												</ul>
											</li>
											<li class="parent"><a href="#"><i class="icon mdi mdi-inbox"></i><span>Pelayanan</span></a>
												<ul class="sub-menu">
													<li><a href="<?php echo $url; ?>main/request/admin">Permohonan</a></li>
													<li><a href="<?php echo $url; ?>main/response/admin">Surat Tanggapan</a></li>
													<li><a href="<?php echo $url; ?>main/requestschedule/admin">Jadwal & RAB</a></li>
													<li><a href="<?php echo $url; ?>main/requestinvoice/admin">Invoice</a></li>
													<li><a href="<?php echo $url; ?>main/requestpayment/admin">Pembayaran</a></li>
													<li><a href="#">Surat Perjanjian Kerja</a></li>
													<li><a href="#">Hasil Uji</a></li>
													<li><a href="#">Kuesioner</a></li>

												</ul>
											</li>
											<li class="parent"><a href="#"><i class="icon mdi mdi-chart-donut"></i><span>Referensi</span></a>
												<ul class="sub-menu">
													<li><a href="<?php echo $url; ?>master/unit/admin">Unit</a></li>
													<li><a href="<?php echo $url; ?>master/category/admin">Kategori Pengujian</a></li>
													<li><a href="<?php echo $url; ?>master/testing/admin">Jenis Pengujian</a></li>
													<li><a href="<?php echo $url; ?>master/company/admin">Perusahaan/ Instansi</a></li>
													<li><a href="<?php echo $url; ?>master/industry/admin">Kategori Pemohon</a></li>

												</ul>
											</li>

											<li class="parent"><a href="#"><i class="icon mdi mdi-book"></i><span>Laporan</span></a>
												<ul class="sub-menu">
													<li><a href="<?php echo $url; ?>">Daftar Antrian</a></li>
													<li><a href="<?php echo $url; ?>">Laporan Advis Teknis</a></li>
													<li><a href="<?php echo $url; ?>">Laporan Sertifikasi</a></li>
													<li><a href="<?php echo $url; ?>">Laporan Pengujian</a></li>
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

														</ul>
													</div>
												</div>
											</div>

										</div>
									</div>
									<div class="be-content">

										<div class="main-content container-fluid">
											<div class="row">
												<div class="col-sm-12">