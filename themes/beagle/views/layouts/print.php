<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$url = Yii::app()->baseUrl."/"; 
$cs = Yii::app()->getClientScript();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?php echo $baseUrl; ?>/admin/assets/img/logo-fav.png">
  <title><?php echo $this->pageTitle; ?> - <?php echo YII::app()->name; ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<style type="text/css">

  h1,h2{font-family: arial;margin-top: 0px;text-transform: uppercase;}
  .header{text-align: center;line-height: 10px;}
  .content{font-size: 16px;}
  .kotak{width: 100%;}
  h1,h2{line-height: 5px}
  h1{margin-bottom: 14px}
  h2{margin-bottom: 14px;
    letter-spacing: 2px;
    font-size: 14px;
    font-weight: 400;}
    .kiri{width: 55%;float: left;text-align: left;}
    .kanan{width: 45%;float: right;}
    .header-kiri{width: 15%;float: left;}
    .header-kanan{width: 85%;float: right;}  
    .konten-header-kanan{margin-top: 11px;letter-spacing: 2px;text-align: justify center;}  
    .isi, .jadwal{width: 95%;float: right;}
    .judul{font-size: 28px;font-family: tahoma}
    .info{font-size: 13px;
      margin-bottom: 5px;
      letter-spacing: 4px;}
      .subinfo{font-size: 11px;
        margin-bottom: 2px;
        letter-spacing: 0px;}
        body{font-size: 13px;font-family: arial;color:#000000;}
        .line{background: #FFF;padding: 0px;margin-top: 2px}
        .line2{background: #FFF;padding: 1px;margin-top: 2px}
        .line3{background: #FFF;padding: 2px;margin-top: 2px}
        
      </style>
      <body>
        <div id="invoice" style="width: 800px;text-align: center;padding: 10px;height:820px">
          <div class="header-kiri">
            <center>
              <img src="<?php echo Yii::app()->baseUrl; ?>/image/setting/logo.jpg" style="padding:0px 5px;width:110px;"/>
            </center>
          </div>
          <div class="header-kanan">
            <div class="konten-header-kanan">
              <h2>Kementerian Pekerjaan Umum dan Perumahan Rakyat</h2>
              <h2 style="letter-spacing: 8px;font-size: 14px;">Badan Penelitian dan Pengembangan</h2>
              <h2 style="letter-spacing: 0px;font-size: 14px;font-weight: 700;">Satuan Kerja Pusat Penelitian dan Pengembangan Perumahan dan Pemukiman</h2>
              <div class="info">
                Jl. Panyaungan - Cileunyi Wetan - Kabupaten Bandung 40393<br>
              </div>
              <div class="subinfo">
               Telp. (022) 7798393 (4 Saluran) Fax: (022) 7798392 - Email : pnbp.puskim@puskim.pu.go.id - Website : http://puskim.pu.go.id
             </div>
           </div>

         </div>
       </center>  

       <img src="<?php echo Yii::app()->baseUrl; ?>/image/setting/line.png" style="margin-top:-15px;"/>
       <div class="content">
        <?php echo $content; ?>
      </div>
    </div>

    <script>
      window.print();
    </script>

  </body>
  </html>


