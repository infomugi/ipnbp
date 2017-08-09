
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="">
	<title><?php echo CHtml::encode($this->pageTitle); ?> - <?php echo CHtml::encode(Yii::app()->name); ?></title>
	<?php
	$baseUrl = Yii::app()->theme->baseUrl; 
	$cs = Yii::app()->getClientScript();
	Yii::app()->clientScript->registerCoreScript('jquery');
	?>  
	<link rel="shortcut icon" href="<?php echo $baseUrl; ?>/backend/image/favicon/favicon.png">
	<link rel="icon" type="image/png" href="<?php echo $baseUrl; ?>/backend/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo $baseUrl; ?>/backend/favicon-16x16.png" sizes="16x16">
	<link href="<?php echo $baseUrl; ?>/backend/https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $baseUrl; ?>/backend/css/vendor.min.css">
	<link rel="stylesheet" href="<?php echo $baseUrl; ?>/backend/css/cosmos.min.css">
	<link rel="stylesheet" href="<?php echo $baseUrl; ?>/backend/css/application.min.css">
</head>
<body class="layout layout-header-fixed layout-left-sidebar-fixed">
	<div class="site-overlay"></div>
	<div class="site-header">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo $baseUrl; ?>/backend/index.html">
					<img src="<?php echo $baseUrl; ?>/backend/img/logo.png" alt="" height="25">
					<span><?php echo YII::app()->name; ?></span>
				</a>
				<button class="navbar-toggler left-sidebar-toggle pull-left visible-xs" type="button">
					<span class="hamburger"></span>
				</button>
				<button class="navbar-toggler pull-right visible-xs-block" type="button" data-toggle="collapse" data-target="#navbar">
					<span class="more"></span>
				</button>
			</div>
			<div class="navbar-collapsible">
				<div id="navbar" class="navbar-collapse collapse">
					<button class="navbar-toggler left-sidebar-collapse pull-left hidden-xs" type="button">
						<span class="hamburger"></span>
					</button>

					<ul class="nav navbar-nav">
						<li class="visible-xs-block">
							<div class="nav-avatar">
								<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="" width="48" height="48" class="thumb-md img-circle">
							</div>
							<h4 class="navbar-text text-center">Selamat Datang, <?php echo YII::app()->user->name; ?>.</h4>
						</li>
					</ul>
					<form class="navbar-form navbar-left">
						<div class="navbar-search-group">
							<input type="text" class="form-control" placeholder="Search">
							<button type="submit" class="btn btn-default">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-table dropdown visible-xs-block">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="nav-cell nav-icon">
									<i class="zmdi zmdi-account-o"></i>
								</span>
								<span class="hidden-md-up m-l-15">Account</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo Yii::app()->baseUrl; ?>/profile/<?php echo YII::app()->user->name; ?>">Profile</a></li>
								<li><a href="#">Settings</a></li>
								<li><a href="#">Help</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Logout</a></li>
							</ul>
						</li>

						<li class="nav-table dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="nav-cell nav-icon">
									<i class="zmdi zmdi-notifications-none"></i>
								</span>
								<span class="hidden-md-up m-l-15">Notifications</span>
								<span class="label label-success">3</span>
							</a>
							<div class="dropdown-menu custom-dropdown dropdown-notifications dropdown-menu-right">
								<div class="dropdown-header">
									<span>Notifications</span>
									<a href="#" class="text-primary">Mark all as read</a>
								</div>
								<div class="n-items">
									<div class="custom-scrollbar">
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/1.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">John Doe</a> is now following <a href="#">Kate Morris</a>.</div>
											<div class="ni-time">10 min</div>
										</div>
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/2.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">Alexander Olsen</a> liked post <a href="#">Getting Started with SASS</a>.</div>
											<div class="ni-time">40 min</div>
										</div>
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/3.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">Linda Davis</a> commented post <a href="#">How to use Bower</a>.</div>
											<div class="ni-time">3 hours</div>
										</div>
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/4.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">John Doe</a> is now following <a href="#">Kate Morris</a>.</div>
											<div class="ni-time">10 min</div>
										</div>
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/5.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">Alexander Olsen</a> liked post <a href="#">Getting Started with SASS</a>.</div>
											<div class="ni-time">40 min</div>
										</div>
										<div class="n-item">
											<div class="ni-img">
												<img class="img-circle" src="<?php echo $baseUrl; ?>/backend/img/avatars/6.jpg" alt="" width="40" height="40">
											</div>
											<div class="ni-text"><a href="#">Linda Davis</a> commented post <a href="#">How to use Bower</a>.</div>
											<div class="ni-time">3 hours</div>
										</div>
									</div>
								</div>
								<div class="dropdown-footer">
									<a href="#">View all notifications</a>
								</div>
							</div>
						</li>

						<li class="nav-table dropdown hidden-sm-down">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<span class="nav-cell p-r-10">

									<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="" width="32" height="32" class="thumb-md img-circle">

								</span>
								<span class="nav-cell"><?PHP echo YII::app()->user->name; ?>
									<span class="caret"></span>
								</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo Yii::app()->baseUrl; ?>/profile/<?php echo YII::app()->user->name; ?>">
										<i class="zmdi zmdi-account-o m-r-10"></i> Profile</a>
									</li>
									<li>
										<a href="#">
											<i class="zmdi zmdi-settings m-r-10"></i> Settings</a>
										</li>
										<li>
											<a href="#">
												<i class="zmdi zmdi-help-outline m-r-10"></i> Help</a>
											</li>
											<li role="separator" class="divider"></li>
											<li>
												<a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">
													<i class="zmdi zmdi-power m-r-10"></i> Logout</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<div class="site-main">
						<div class="site-left-sidebar">
							<div class="sidebar-backdrop"></div>
							<div class="custom-scrollbar">
								<ul class="sidebar-menu">
									<li class="menu-title">Menu</li>
									<li class="with-sub">
										<a href="#" aria-haspopup="true">
											<span class="menu-icon">
												<i class="zmdi zmdi-home"></i>
											</span>
											<span class="menu-text">Dashboard</span>
										</a>
										<ul class="sidebar-submenu collapse">
											<li class="menu-subtitle">Dashboards</li>
											<li><a href="#">Dashboard 1</a></li>
											<li><a href="#">Dashboard 2</a></li>
											<li><a href="#">Dashboard 3</a></li>
										</ul>
									</li>
									<li>
										<a href="<?php echo $baseUrl; ?>/backend/page-layouts.html">
											<span class="menu-icon">
												<i class="zmdi zmdi-view-web"></i>
											</span>
											<span class="menu-text">Page layouts</span>
										</a>
									</li>

								</ul>
							</div>
						</div>

						<div class="site-content">

							<?php echo $content; ?>

						</div>
						<div class="site-footer">
							<?php echo date('Y'); ?> © <?php echo YII::app()->name; ?>
						</div>
					</div>
					<script src="<?php echo $baseUrl; ?>/backend/js/vendor.min.js"></script>
					<script src="<?php echo $baseUrl; ?>/backend/js/cosmos.min.js"></script>
					<script src="<?php echo $baseUrl; ?>/backend/js/application.min.js"></script>
				</body>
				</html>