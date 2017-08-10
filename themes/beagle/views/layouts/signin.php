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
<body class="be-splash-screen">
    <div class="be-wrapper be-login">
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="splash-container">
                    <?php echo $content; ?>
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