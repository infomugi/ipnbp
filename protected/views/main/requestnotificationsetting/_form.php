<?php
/* @var $this RequestnotificationsettingController */
/* @var $model RequestNotificationSetting */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
	function notificationForm(form, data, hasError){

		notification("Informasi","Data Notifikasi Berhasil di Perbaharui","primary");

		if (!hasError){
			$.post(form.attr('action'), form.serialize(), function(res){
				if (res.result)
					console.log(res.data);
			});
		}
		return false;
	}

	function notification(heading,data,color){
		$.extend(
			$.gritter.options, {
				position: "bottom-right"
			});
		$.gritter.add({
			title: heading,
			text: data,
			class_name: "color "+ color + ""
		});
	}

</script>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-notification-setting-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				'afterValidate'=>'js:notificationForm',
				),
			'errorMessageCssClass' => 'parsley-errors-list filled',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>




			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'email'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'disposition_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'disposition_reminder'); ?>
					<?php echo $form->textField($model,'disposition_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'response_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'response_reminder'); ?>
					<?php echo $form->textField($model,'response_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'invoice_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'invoice_reminder'); ?>
					<?php echo $form->textField($model,'invoice_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'report_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'report_reminder'); ?>
					<?php echo $form->textField($model,'report_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'report_info_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'report_info_reminder'); ?>
					<?php echo $form->textField($model,'report_info_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'report_send_reminder'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'report_send_reminder'); ?>
					<?php echo $form->textField($model,'report_send_reminder',array('class'=>'form-control')); ?>
				</div>

			</div>  

			<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Edit Notifikasi', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

	</div>
</div><!-- form -->


<h4><i class="mdi mdi-file"></i> Log Reminder</h4>
<?php 
$dataProvider=new CActiveDataProvider('RequestNotification',array('criteria'=>array('order'=>'id_notification DESC')));
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'request-notification-grid',
	'dataProvider'=>$dataProvider,
    //'filter'=>$model,
	'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
	'columns'=>array(

		array(
			'header'=>'No',
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'10px', 
				'style' => 'text-align: center;')),

		'send_date',
		array('name'=>'request_id','value'=>'$data->Request->letter_subject'),
		array('name'=>'description','value'=>'$data->description','type' => 'raw'),
		array('name'=>'type','value'=>'RequestNotification::model()->nameReminder($data->type)'),

		),
		)); ?>



