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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->pageTitle; ?> - <?php echo YII::app()->name; ?></title>
    <!--  Fonts and icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/admin/assets/img/logo-fav.png">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/admin/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <!-- animate css -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/css/animate.css" rel="stylesheet">
    <!-- magnific-popup -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- owl.carousel -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/owl.carousel/<?php echo $baseUrl; ?>/intro/assets/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>/intro/assets/owl.carousel/<?php echo $baseUrl; ?>/intro/assets/owl.theme.default.min.css" rel="stylesheet">
    <!-- flexslider -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/flexSlider/flexslider.css" rel="stylesheet">
    <!-- swiper -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/css/swiper.css" rel="stylesheet" />
    <!-- bootstrap -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- material-kit -->
    <link href="<?php echo $baseUrl; ?>/intro/assets/css/material-kit.css" rel="stylesheet"/>
    <!-- main stylesheet -->
    <link href="<?php echo $baseUrl; ?>/intro/style.css" rel="stylesheet"/>


    <!-- Choose your default colors -->
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/intro/assets/css/colors/color1.css">
</head>

<body id="top">
    <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tt-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img height="40px" src="<?php echo $baseUrl; ?>/admin/assets/css/img/logo.png" alt="PNBP"></a>
            </div><!-- /.navbar-header -->

            <div class="collapse navbar-collapse" id="tt-navigation">
                <ul class="nav navbar-nav navbar-right">


                    <!-- social menu -->
                    <li>
                        <a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                            <i class="mdi mdi-instagram"></i>
                        </a>
                    </li>
                </ul><!-- /.navbar-nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="wrapper">

        <!-- header -->
        <div class="header tt-page-header filter dark-6" style="background-image: url('<?php echo $baseUrl; ?>/intro/assets/img/cover.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="title text-center"><?php echo $this->pageTitle; ?><BR>Puslitbang Perumahan & Pemukiman Kementerian PU</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        
          <?php echo $content; ?>


        <footer class="footer">
            <div class="container">
                <div class="copyright pull-left">
                    &copy; <?php echo date('Y'); ?> <span class="primary-color"><i class="fa fa-heart heart"></i></span> by <?php echo YII::app()->name; ?>
                </div>
            </div>
        </footer>


        <div id="backTop">
            <a href="#top" class="btn btn-danger btn-fab btn-fab-mini btn-round page-scroll"><i class="mdi mdi-arrow-up-bold"></i></a>
        </div> 

    </div><!-- /.wrapper -->


    <!--  preloader start -->
    <div id="tt-preloader">
        <div class="tt-preloader-wave"></div>
    </div>
    <!-- preloader end -->


    <!--   Core JS Files   -->
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/material.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/smoothscroll.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/jquery.stellar.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/imagesloaded.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/jquery.countTo.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/jquery.inview.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/flexSlider/jquery.flexslider-min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/swiper.jquery.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/wow.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/material-kit.js"></script>
    <script src="<?php echo $baseUrl; ?>/intro/assets/js/scripts.js"></script>
</body>

</html>
