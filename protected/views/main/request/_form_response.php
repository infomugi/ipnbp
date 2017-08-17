<?php
/* @var $this ResponseController */
/* @var $response Response */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'response-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php echo $form->errorSummary($response, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10">

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_date'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($response,'letter_date'); ?>
					<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
						<?php echo $form->textField($response,'letter_date',array('class'=>'form-control')); ?>
						<span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
					</div>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_code'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($response,'letter_code'); ?>
					<?php echo $form->textField($response,'letter_code',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'letter_attachment'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($response,'letter_attachment'); ?>
					<?php echo $form->fileField($response,'letter_attachment',array('class'=>'btn btn-info')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($response,'description'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($response,'description'); ?>
					<?php echo $form->textArea($response,'description',array('class'=>'form-control')); ?>
				</div>

			</div>  


			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($response->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div><!-- form -->


	<h4>Data Surat Tanggapan</h4>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'response-grid',
		'dataProvider'=>$dataResponse,
		// 'filter'=>$model,
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

			array(
				'header'=>'No Revisi',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			'letter_date',
			'letter_code',
			'letter_attachment',
			'description',
			// 'date_send',
			// 'date_feedback',

			array(	
				'name'=>'status',
				'filter'=>array('0'=>'Disable','1'=>'Enable'),
				'value'=>'Users::model()->status($data->status)',
				),

			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
				'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
				'buttons'=>array(
					'update'=>
					array(
						'url'=>'Yii::app()->createUrl("main/response/update", array("id"=>$data->id_response))',
						),
					'delete'=>
					array(
						'url'=>'Yii::app()->createUrl("main/response/delete", array("id"=>$data->id_response))',
						),
					),
				),
			),
			)); ?>


