<?php
/* @var $this RequestReportController */
/* @var $report RequestReport */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-report-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
		)); ?>

		<?php echo $form->errorSummary($report, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-lg-9 col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'upload_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'upload_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'upload_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'accept_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'accept_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($report,'accept_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'description'); ?>
					<?php echo $form->textArea($report,'description',array('class'=>'form-control')); ?>
				</div>

			</div>  

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($report,'file'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($report,'file'); ?>
					<?php echo $form->fileField($report,'file',array('class'=>'btn btn-info')); ?>
				</div>

			</div>  



			<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($report->isNewRecord ? 'Submit' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

	</div></div><!-- form -->


	<h4>Data Permohonan Pengujian</h4>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'report-grid',
		'dataProvider'=>$dataReport,
				// 'filter'=>$model,	
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			array(	
				'name'=>'upload_date',
				'value'=>'Request::model()->timeNull($data->upload_date)',
				),

			array(	
				'name'=>'accept_date',
				'value'=>'Request::model()->timeNull($data->accept_date)',
				),


			'description',
			'file',

			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
				'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
				'buttons'=>array(
					'view'=>
					array(
						'url'=>'Yii::app()->createUrl("main/requestreport/view", array("id"=>$data->id_report))',
						),
					'update'=>
					array(
						'url'=>'Yii::app()->createUrl("main/requestreport/update", array("id"=>$data->id_report))',
						),
					'delete'=>
					array(
						'url'=>'Yii::app()->createUrl("main/requestreport/delete", array("id"=>$data->id_report))',
						),
					),
				),
			),
			)); ?>



			
			
