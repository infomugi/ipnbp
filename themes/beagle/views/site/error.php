<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle='Error '.$code;
$this->breadcrumbs=array(
  'Error',
  );
  ?>


  <div class="error-number"><?php echo $code; ?></div>
  <div class="error-description"><?php echo CHtml::encode($message); ?></div>
  <div class="error-goback-button">
    <?php echo CHtml::link('Kembali ke Dashboard', 
      array('site/dashboard',
        ), array('class' => 'btn btn-xl btn-primary', 'title'=>'Kembali'));
        ?>
      </div>
      <div class="footer">&copy; <?php echo date('Y'); ?> - <?php echo YII::app()->name; ?></div>

