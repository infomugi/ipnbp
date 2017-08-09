<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Login';
$this->breadcrumbs=array(
	'Login',
  );
  ?>

  <?php
  foreach(Yii::app()->user->getFlashes() as $key =>$message)
  {
    echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
  }
  ?>  

  <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array(
      'validateOnSubmit' => true,
      ),
    'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
    )); ?>


    <div class="wrapper-page">
      <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading "> 
          <div class="bg-overlay"></div>
          <h3 class="text-center m-t-10 text-white"> Sign In </h3>
        </div> 

        <div class="panel-body">
          
         <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-success alert-bold-border fade in alert-dismissable')); ?>
         
         <div class="form-group">
          <div class="col-xs-12">
           <?php echo $form->textField($model,'username', array('class' => 'form-control input-lg','placeholder'=>'Username')); ?>
         </div>
       </div>

       <div class="form-group">
        <div class="col-xs-12">
         <?php echo $form->passwordField($model,'password', array('class' => 'form-control input-lg','placeholder'=>'Password')); ?>
       </div>
     </div>
     
     <div class="form-group text-center m-t-40">
      <div class="col-xs-12">

        <?php echo CHtml::submitButton('Login', array('class' =>'btn btn-primary btn-lg btn-block waves-light')); ?>
        
      </div>
    </div>

  </div>                                 
  
</div>
</div>

<?php $this->endWidget(); ?>
