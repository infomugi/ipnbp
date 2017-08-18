<?php
/* @var $this RequestTestingController */
/* @var $testing RequestTesting */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'request-testing-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		'errorMessageCssClass' => 'label label-danger',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php echo $form->errorSummary($testing, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'testing_type'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($testing,'testing_type'); ?>
					<?php 
					echo $form->dropDownList($testing, "testing_type",
						CHtml::listData(Testing::model()->findall(array('condition'=>'status=1')),
							'id_testing', 'name'
							),
						array(
							"empty"=>"- Pilih Jenis Pengujian -", 
							'class'=>'form-control select2',
							'ajax' => array(
								'type'=>'POST',
								'dataType'=>'json',
								'url'=>CController::createUrl('main/requesttesting/search'),
								'data' => "js:{data:$(this).val()}",
								'success'=>'function(data){
									$("#name").val(data.name);
									$("#part").val(data.part);
									$("#lab").val(data.lab);
									$("#RequestTesting_testing_type").val(data.id_testing);
									$("#RequestTesting_testing_part").val(data.part_id);
									$("#RequestTesting_testing_lab").val(data.lab_id);
									$("#RequestTesting_testing_total").focus();
								}',),							
							)
						); 
						?> 
					</div>

				</div>

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($testing,'testing_part'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($testing,'testing_part'); ?>
						<input type="text" class="form-control" id="part" disabled="true">
						<div style="display:none;">
							<?php echo $form->textField($testing,'testing_part',array('class'=>'form-control','hidden'=>true)); ?>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($testing,'testing_lab'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($testing,'testing_lab'); ?>
						<input type="text" class="form-control" id="lab" disabled="true">
						<div style="display:none;">
							<?php echo $form->textField($testing,'testing_lab',array('class'=>'form-control','hidden'=>true)); ?>
						</div>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($testing,'testing_total'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($testing,'testing_total'); ?>
						<?php echo $form->textField($testing,'testing_total',array('class'=>'form-control')); ?>
					</div>

				</div>  

				<div class="form-group">
					<div class="col-md-12">  
					</br></br>
					<?php echo CHtml::submitButton($testing->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div>
	</div><!-- form -->


	<h4>Data Permohonan Pengujian</h4>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'testing-grid',
		'dataProvider'=>$dataTesting,
				// 'filter'=>$model,	
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

					// array(
					// 	'header'=>'No',
					// 	'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					// 	'htmlOptions'=>array('width'=>'10px', 
					// 		'style' => 'text-align: center;')),

			array('name'=>'testing_type','value'=>'$data->Testing->name'),
			array('name'=>'testing_lab','value'=>'$data->Lab->name'),
			array('name'=>'testing_part','value'=>'$data->Balai->name'),

			// array(	
			// 	'name'=>'status',
			// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
			// 	'value'=>'Users::model()->status($data->status)',
			// 	),

			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
				'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
				'buttons'=>array(
					'update'=>
					array(
						'url'=>'Yii::app()->createUrl("main/requesttesting/update", array("id"=>$data->id_testing))',
						),
					'delete'=>
					array(
						'url'=>'Yii::app()->createUrl("main/requesttesting/delete", array("id"=>$data->id_testing))',
						),
					),
				),
			),
			)); ?>