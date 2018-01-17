<?php
/* @var $this RequestQuesionerController */
/* @var $quesioner RequestQuesioner */
/* @var $form CActiveForm */
?>




<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-12 col-md-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-quesioner-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($quesioner, null, null, array('class' => 'alert alert-warning')); ?>



			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($quesioner,'unit'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($quesioner,'unit'); ?>
					<?php echo $form->checkBoxlist($quesioner,'unit',CHtml::listData(Unit::model()->findAll(array('condition'=>'status=1 AND type=1','order'=>'name ASC')),
						'id_unit', 'name'
						),array('class'=>'checkbox-material')); ?>
					</div>

				</div> 

				<div class="form-group">
					<div class="col-md-12">  
						<?php echo CHtml::submitButton($quesioner->isNewRecord ? 'Kirim' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>

</div></div><!-- form -->