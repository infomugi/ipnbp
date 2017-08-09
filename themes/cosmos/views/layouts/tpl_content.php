
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">

  <!-- Start content -->
  <div class="content">
    <div class="container">

      <!-- Page-Title -->
      <div class="row hidden-xs">
        <div class="col-sm-12">
          <h4 class="pull-left page-title"><?php echo CHtml::encode($this->pageTitle); ?></h4>
          <span class="hidden-xs">
            <ol class="breadcrumb pull-right">
              <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                  'links'=>$this->breadcrumbs,
                  'homeLink'=>CHtml::link('Dashboard'),
                  )); ?><!-- breadcrumbs -->
                <?php endif?>
              </ol>
            </span>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-body">

            <?php echo $content; ?>

          </div>
        </div>


      </div>
      <!-- container -->
    </div>

    <!-- content -->
    <footer class="footer text-right hidden-xs"><?php echo date('Y'); ?> © <?php echo CHtml::encode(Yii::app()->name); ?>.</footer>

  </div>

  <!-- ============================================================== -->
  <!-- End Right content here -->
</div>
<!-- /Right-bar -->

</div>
