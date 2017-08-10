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
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
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
												<li><a href="<?php echo $url; ?>dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
												</li>
												<li class="parent"><a href="#"><i class="icon mdi mdi-chart-donut"></i><span>Master</span></a>
													<ul class="sub-menu">
														<li><a href="<?php echo $url; ?>company/admin">Perusahaan</a></li>
														<li><a href="<?php echo $url; ?>category/admin">Kategori</a></li>
														<li><a href="<?php echo $url; ?>testing/admin">Pengujian</a></li>

													</ul>
												</li>
												<li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Accounts</span></a>
													<ul class="sub-menu">
														<li><a href="<?php echo $url; ?>users/admin">Pengguna</a><li>
															<li><a href="<?php echo $url; ?>division/admin">Divisi</a><li>
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

												<div class="panel panel-default panel-contrast">
													<div class="panel-heading"><?php echo $this->pageTitle; ?>

													</div>
													<div class="panel-body panel-body-contrast">
														<?php echo $content; ?>
													</div>
												</div>


											</div>
										</div>
									</div>
								</div>
								
							</div>

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
							<script type="text/javascript">
								$(document).ready(function(){
				      	//initialize the javascript
				      	App.init();
				      	App.dataTables();
				      });
				  </script>
				</body>
				</html>