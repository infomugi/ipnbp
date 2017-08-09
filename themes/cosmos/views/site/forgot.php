<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
	'Forgot Password',
  );
  ?>

  <?php
	foreach(Yii::app()->user->getFlashes() as $key =>$message)
	{
		echo '<div class="alert alert-'.$key.'">'.$message.'</div>';
	}
	?>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'forgot-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'htmlOptions' => array('class' => 'conForm', 'role' => 'form')
		)); ?>

      <?php echo $form->errorSummary($forgot, null, null, array('class' => 'alert alert-success alert-bold-border fade in alert-dismissable')); ?>

      <div class="form-group has-feedback lg left-feedback no-label">
       <?php echo $form->labelEx($forgot,'email'); ?>
       <?php echo $form->textField($forgot,'email', array('class' => 'form-control no-border input-lg rounded','placeholder'=>'Alamat Email')); ?>
       <?php echo $form->error($forgot,'email'); ?>
     </div>

    <div class="form-group">
     <?php echo CHtml::submitButton('Reset Password', array('class' => 'btn btn-info btn-lg btn-block')); ?>
   </div>

   <?php $this->endWidget(); ?>

    <p class="text-center">
      <?php echo CHtml::link('Login',array('login'),array('class' => 'text-center','title'=>'Login'));?>
    </p>

    <p class="text-center">or</p>

    <p class="text-center">
      <?php echo CHtml::link('Register',array('register'),array('class' => 'text-center','title'=>'Register'));?>
    </p>







