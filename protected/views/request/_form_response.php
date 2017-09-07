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
		'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
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

				<div class="col-sm-4 control-label">
				</div>   

				<div class="col-sm-8">
				

			<?php

	// see http://www.yiiframework.com/doc/guide/1.1/en/form.table
	// Note: Can be a route to a config file too,
	//       or create a method 'getMultiModelForm()' in the member model
	
	$memberFormConfig = array(
		  'elements'=>array(
			'letter_attachment'=>array(
				'type'=>'text',
				'class'=>'form-control',
				'maxlength'=>40,
			),
		));
	
	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_response_detail', //the unique widget id
			'formConfig' => $memberFormConfig, //the form configuration array
			'model' => $member, //instance of the form model
	
			//if submitted not empty from the controller,
			//the form will be rendered with validation errors
			'validatedItems' => $validatedMembers,
	
	        //array of member instances loaded from db
			// 'data' => $member->findAll('response_id=:response_id', array(':response_id'=>$response->id_response)),
	'data' => $member->findAll('response_id=:response_id', array(':response_id'=>$response->id_response)),
			'sortAttribute' => 'id_response_detail',
	        'hideCopyTemplate'=>true,
	        'clearInputs'=>false,
	        'tableView' => true, 
	        'addItemAsButton' => false,
	        'showAddItemOnError' => false, 
	        'fieldsetWrapper' => array('tag' => 'div',
	            'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
	        ),
	        'addItemText' => '<div class="btn btn-info btn-flat btn-small btn-sm"><i class="icon-plus"></i> Add Payment Terms</div>',
			'removeHtmlOptions' => array('class' => 'btn btn-danger btn-flat btn-small', 'style' => 'margin-top: -13px;margin-bottom: -1px;'),
));
?> 



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
			'description',

			array(      
				'class'=>'CLinkColumn',      
				'header'=>'Surat Tanggapan',      
				'label'=>'Download',  
				'urlExpression'=>'Yii::app()->request->baseUrl."/image/files/response/".$data["letter_attachment"]',      
				), 

			// 'date_send',
			// 'date_feedback',
			// 'letter_attachment',
			// array(	
			// 	'name'=>'status',
			// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
			// 	'value'=>'Users::model()->status($data->status)',
			// 	),

			array(
				'class'=>'CButtonColumn',
				'template'=>'{view}{update}{delete}',
				'htmlOptions'=>array('width'=>'100px', 'style' => 'text-align: center;'),
				'buttons'=>array(
					'view'=>
					array(
						'url'=>'Yii::app()->createUrl("main/response/view", array("id"=>$data->id_response))',
						),
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


