<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register new Account';
$this->breadcrumbs=array(
	'Register new Account',
  );
  ?>

  <?php
  foreach(Yii::app()->user->getFlashes() as $key =>$message)
  {
    echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
  }
  ?>

  <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation' => true,
    'clientOptions' => array(
      'validateOnSubmit' => true,
      ),
    'htmlOptions' => array('class' => 'conForm', 'role' => 'form')
    )); ?>

      <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-success alert-bold-border fade in alert-dismissable')); ?>

      <div class="form-group has-feedback lg left-feedback no-label">
        <?php echo $form->labelEx($model,'first_name'); ?>
        <?php echo $form->textField($model,'first_name', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'First Name')); ?>
        <?php echo $form->error($model,'first_name'); ?>
      </div>

      <div class="form-group has-feedback lg left-feedback no-label">
       <?php echo $form->labelEx($model,'last_name'); ?>
       <?php echo $form->textField($model,'last_name', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Last Name')); ?>
       <?php echo $form->error($model,'last_name'); ?>
     </div>


     <div class="form-group has-feedback lg left-feedback no-label">
       <?php echo $form->labelEx($model,'email'); ?>
       <?php echo $form->textField($model,'email', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Email Address')); ?>
       <?php echo $form->error($model,'email'); ?>
     </div>

     <div class="form-group has-feedback lg left-feedback no-label">
       <?php echo $form->labelEx($model,'username'); ?>
       <?php echo $form->textField($model,'username', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Username')); ?>
       <?php echo $form->error($model,'username'); ?>
     </div>

     <div class="form-group has-feedback lg left-feedback no-label">
      <?php echo $form->labelEx($model,'password'); ?>
      <?php echo $form->passwordField($model,'password', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Password')); ?>
      <?php echo $form->error($model,'password'); ?>
    </div>

     <div class="form-group has-feedback lg left-feedback no-label">
      <?php echo $form->labelEx($model,'repeat_password'); ?>
      <?php echo $form->passwordField($model,'repeat_password', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Repeat Password')); ?>
      <?php echo $form->error($model,'repeat_password'); ?>
    </div>    

    <div class="form-group">
     <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-info btn-lg btn-perspective btn-block')); ?>
   </div>

   <?php $this->endWidget(); ?>

   <p class="text-center">
    <?php echo CHtml::link('Forgot Password',array('forgot'),array('class' => 'text-center','title'=>'Forgot Password'));?>
  </p>

  <p class="text-center">or</p>

  <p class="text-center">
    <?php echo CHtml::link('Login',array('login'),array('class' => 'text-center','title'=>'Login'));?>
  </p>


