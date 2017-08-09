<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Template YII oleh Mugi Rachmat - www.infomugi.com">
  <meta name="author" content="Mugi Rachmat">
  <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.png">
   <title><?php echo CHtml::encode($this->pageTitle); ?> - <?php echo CHtml::encode(Yii::app()->name); ?></title>
  <?php
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
  ?>  

  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/core.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/components.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/pages.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/menu.css" rel="stylesheet" type="text/css">
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/css/responsive.css" rel="stylesheet" type="text/css">
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/modernizr.min.js"></script>

</head>
<body class="fixed-left">


<?php echo $content; ?>

<!-- END wrapper -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/detect.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/fastclick.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.blockUI.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/waves.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/wow.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/admin/assets/js/jquery.app.js"></script>

</body>
</html>