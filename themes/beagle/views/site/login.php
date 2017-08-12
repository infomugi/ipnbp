<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
  'Login',
  );
  ?>

  <div class="panel panel-default panel-border-color panel-border-color-primary">
    <div class="panel-heading">
      <img src="assets/img/logo-xx.png" alt="<?php echo YII::app()->name; ?>" width="102" height="27" class="logo-img">
    </div>
    <div class="panel-body">

     <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'login-form',
      'enableAjaxValidation'=>false,
      'enableClientValidation' => true,
      'clientOptions' => array(
        'validateOnSubmit' => true,
        ),
      'errorMessageCssClass' => 'label label-info',
      'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
      )); ?>

      <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>


      <div class="form-group">
       <?php echo $form->textField($model,'username', array('class' => 'form-control text-blue', 'placeholder'=>'Username','id'=>'username')); ?>
     </div>
     <div class="form-group">
       <?php echo $form->passwordField($model,'password', array('class' => 'form-control text-blue','placeholder'=>'Password','id'=>'password')); ?>
     </div>
<!--      <div class="form-group row login-tools">
      <div class="col-xs-6 login-remember">
        <div class="be-checkbox">
          <input type="checkbox" id="remember">
          <label for="remember">Remember Me</label>
        </div>
      </div>
      <div class="col-xs-6 login-forgot-password"><a href="pages-login.html#">Forgot Password?</a></div>
    </div> -->
    <div class="form-group login-submit">
     <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-xl')); ?>   
   </div>
   <?php $this->endWidget(); ?>


 </div>
</div>
<!-- <div class="splash-footer"><span>Don't have an account? <a href="pages-login.html#">Sign Up</a></span></div> -->


