<?php
/* @var $this LaporanController */
/* @var $model Laporan */

$this->breadcrumbs=array(
	'Request Reports'=>array('admin'),
	$model->id_report,
	);

$this->pageTitle="Survei Kepuasan Pelanggan";
?>

<!-- Main Content Start -->
<div class="main main-raised">

    <div class="section-padding section-basic">
        <div class="container">
            <div class="row margin-bottom-80 text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="title wow fadeInUp"><?php echo $request->Company->name; ?><br> <?php echo $request->letter_subject; ?></h3>
                    <div class="section-divider"></div>
                    <p class="description wow fadeInUp">Kuesioner Kualitas Layanan Penerapan Kebijakan Mutu</p>
                </div>
            </div><!-- /.row -->



            <?php echo $this->renderPartial('_form_quesioner_dynamic', array('model'=>$model,'quesioner'=>$quesioner,'dataQuesioner'=>$dataQuesioner)); ?>


        </div>
    </div>
</div>
<!-- End Main Content -->



