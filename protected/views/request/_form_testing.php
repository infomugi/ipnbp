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
		'errorMessageCssClass' => 'parsley-errors-list filled',
		'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
		)); ?>

		<?php //echo $form->errorSummary($testing, null, null, array('class' => 'alert alert-warning')); ?>


		<div class="col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'testing_type'); ?>
				</div>   

				<div class="col-sm-8">

					<div class="input-group">

						
						<?php 
						if(YII::app()->user->record->level==1){

							echo $form->dropDownList($testing, "testing_type",
								CHtml::listData(Testing::model()->findall(array('condition'=>'status=1')),
									'id_testing', 'showTesting'
									),
						// array(),
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
											$("#category").val(data.category);
											$("#time").val(data.time);
											$("#RequestTesting_testing_type").val(data.id_testing);
											$("#RequestTesting_testing_part").val(data.part_id);
											$("#RequestTesting_testing_lab").val(data.category_id);
											$("#RequestTesting_price").val(data.price);
											$("#RequestTesting_testing_total").focus();
										}',),							
									)
								); 

						}else{


							echo $form->dropDownList($testing, "testing_type",
								CHtml::listData(Testing::model()->findall(array('condition'=>'status=1 AND part_id='.YII::app()->user->record->division)),
									'id_testing', 'showTesting'
									),
						// array(),
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
											$("#category").val(data.category);
											$("#time").val(data.time);
											$("#RequestTesting_testing_type").val(data.id_testing);
											$("#RequestTesting_testing_part").val(data.part_id);
											$("#RequestTesting_testing_lab").val(data.category_id);
											$("#RequestTesting_price").val(data.price);
											$("#RequestTesting_testing_total").focus();
										}',),							
									)
								); 

						}
						?> 

						<span data-toggle="modal" data-target="#md-fullWidth" class="input-group-addon btn btn-lg btn-primary"><i class="icon-th mdi mdi-plus"></i></span>
					</div>
					
					<?php echo $form->error($testing,'testing_type'); ?>
				</div>

			</div>

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'testing_part'); ?>
				</div>   

				<div class="col-sm-8">
					<input type="text" class="form-control" id="part" disabled="true">
					<?php echo $form->error($testing,'testing_part'); ?>
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
					<input type="text" class="form-control" id="category" disabled="true">
					<?php echo $form->error($testing,'testing_lab'); ?>
					<div style="display:none;">
						<?php echo $form->textField($testing,'testing_lab',array('class'=>'form-control','hidden'=>true)); ?>
					</div>
				</div>

			</div> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'time'); ?>
				</div>   

				<div class="col-sm-8">
					<input type="text" class="form-control" id="time" disabled="true">

				</div> 
			</div> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'price'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($testing,'price',array('class'=>'form-control')); ?>
					<?php echo $form->error($testing,'price'); ?>
				</div>

			</div>  			


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'testing_total'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->textField($testing,'testing_total',array('class'=>'form-control')); ?>
					<?php echo $form->error($testing,'testing_total'); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
				</div>   

				<div class="col-sm-8">




					<?php
					$memberFormConfig = array(
						'elements'=>array(
							'name'=>array(
								'type'=>'text',
								'class'=>'form-control',
								),
							'price'=>array(
								'type'=>'text',
								'class'=>'form-control',
								),
							));

					$this->widget('ext.multimodelform.MultiModelForm',array(
						'id' => 'id_testing', 
						'formConfig' => $memberFormConfig, 
						'model' => $member, 

						'validatedItems' => $validatedMembers,

						'sortAttribute' => 'name',
						'hideCopyTemplate'=>true,
						'clearInputs'=>false,
						'tableView' => true, 
						'addItemAsButton' => false,
						'showAddItemOnError' => false, 

						'fieldsetWrapper' => array('tag' => 'div',
							'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
							),

						'addItemText' => '<div class="btn btn-success"><i class="mdi mdi-plus"></i> Tambah Biaya</div>',
						'removeText' => '<div class="btn btn-lg btn-danger"><i class="mdi mdi-close"></i> Hapus</div>',

						'data' => $member->findAll('request_testing_id=:request_testing_id', array(':request_testing_id'=>$testing->id_testing)),
						));
						?>

					</div>

				</div>  

				<div class="form-group">
					<div class="col-md-12">  
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
				'id_testing',
				array('name'=>'testing_type','value'=>'$data->Testing->name'),
				array('name'=>'testing_lab','value'=>'$data->Category->name'),
				array('name'=>'testing_part','value'=>'$data->Balai->name'),

			// array(	
			// 	'name'=>'status',
			// 	'filter'=>array('0'=>'Disable','1'=>'Enable'),
			// 	'value'=>'Users::model()->status($data->status)',
			// 	),

				array(
					'class'=>'CButtonColumn',
					'template'=>'{view}{update}{delete}',
					'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
					'buttons'=>array(
						'view'=>
						array(
							'url'=>'Yii::app()->createUrl("main/requesttesting/view", array("id"=>$data->id_testing))',
							),
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


				<!--Form Modals-->
				<div id="md-fullWidth" tabindex="-1" role="dialog" class="modal fade colored-header colored-header-primary">
					<div class="modal-dialog custom-width">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
								<h3 class="modal-title">Tambah Jenis Pengujian</h3>
							</div>
							<div class="modal-body">

								<?php echo $this->renderPartial('_form_testing_create', array('testingcreate'=>$testingcreate)); ?>

							</div>
						</div>
					</div>
				</div>