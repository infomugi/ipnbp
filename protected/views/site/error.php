<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle='Error ' . $code;
$this->breadcrumbs=array(
    'Error',
    );
    ?>

            <h1><?php echo $code; ?>!</h1>
            <h2>Error <?php echo $code; ?> : <?php echo CHtml::encode($message); ?></h2>
    