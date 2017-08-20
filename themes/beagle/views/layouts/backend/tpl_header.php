<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$url = Yii::app()->baseUrl."/"; 
$cs = Yii::app()->getClientScript();
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
	<div class="be-wrapper be-color-header">
		<nav class="navbar navbar-default navbar-fixed-top be-top-header">
			<div class="container-fluid">
				<div class="navbar-header"><a href="<?php echo $url; ?>/site/dashboard" class="navbar-brand"></a>
				</div>
				<div class="be-right-navbar">
					<ul class="nav navbar-nav navbar-right be-user-nav">
						<li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="<?php echo $url; ?>image/avatar/<?php echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="Avatar"><span class="user-name"><?php echo YII::app()->user->name; ?></span></a>
							<ul role="menu" class="dropdown-menu">
								<li>
									<div class="user-info">
										<div class="user-name"><?php echo Users::model()->showFullname(YII::app()->user->id); ?></div>
										<div class="user-position online">Sedang Online</div>
									</div>
								</li>
								<!-- <li><a href="<?php echo $url; ?>profile/<?php echo YII::app()->user->name; ?>"><span class="icon mdi mdi-face"></span> Account</a></li> -->
								<!-- <li><a href="<?php echo $url; ?>setting/site"><span class="icon mdi mdi-settings"></span> Settings</a></li> -->
								<li><a href="<?php echo $url; ?>site/logout"><span class="icon mdi mdi-power"></span> Logout</a></li>
							</ul>
						</li>
					</ul>
					<!-- <div class="page-title"><span><?php echo YII::app()->name; ?></span></div> -->

					<?php 
					foreach (Request::countDisposision(1) as $data) {
						$total = $data['total']; 						
					} 
					if($total==0){
						$indicator = "";
					}else{
						$indicator = "indicator";
					}					
					?>

					<ul class="nav navbar-nav navbar-right be-icons-nav">
						<li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="<?php echo $indicator; ?>"></span></a>
							<ul class="dropdown-menu be-notifications">
								<li>
									<div class="title">Notifikasi Permohonan<span class="badge"><?php echo $total; ?></span></div>
									<div class="list">
										<div class="be-scroller">
											<div class="content">
												<ul>

													<?php foreach (Request::getDisposition(1) as $data) { ?>

														<li class="notification notification-unread">
															<a href="<?php echo $url;?>request/view/id/<?php echo $data['id_request']; ?>">
																<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
																<div class="notification-info">
																	<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> Mengajukan <?php echo $data['letter_subject']; ?></div><span class="date format-date"><?php echo $data['created_date']; ?></span>
																</div>
															</a>
														</li>

														<?php } ?>	

														<?php foreach (Request::getDisposition(2) as $data) { ?>

															<li class="notification">
																<a href="<?php echo $url;?>request/view/id/<?php echo $data['id_request']; ?>">
																	<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
																	<div class="notification-info">
																		<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> <?php echo $data['letter_subject']; ?> Telah di Disposisi</div><span class="date format-date"><?php echo $data['created_date']; ?></span>
																	</div>
																</a>
															</li>

															<?php } ?>	

														</ul>
													</div>
												</div>
											</div>
											<div class="footer"> <a href="<?php echo $url; ?>request/admin">Lihat Semua Permohonan</a></div>
										</li>
									</ul>
								</li>

							</ul>
						</div>
					</div>
				</nav>



