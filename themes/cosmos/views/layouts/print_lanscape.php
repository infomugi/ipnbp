<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Template YII oleh Mugi Rachmat - www.infomugi.com">
  <meta name="author" content="Mugi Rachmat">
  <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/image/favicon/favicon.png">
  <script>
    window.print();
  </script>
</head>


<body class="">
  <div id="invoice" style="width: 1200px;height:620px">

      <div class="content">
        <?php echo $content; ?>
      </div>

    </div>
  </body>
  </html>


