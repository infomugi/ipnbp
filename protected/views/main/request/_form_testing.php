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


		<div class="col-lg-9 col-md-10"> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($testing,'testing_part'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($testing,'testing_part'); ?>
					<?php 
					echo $form->dropDownList($testing, "testing_part",
						CHtml::listData(Unit::model()->findall(array('condition'=>'status=1 AND type=1')),
							'id_unit', 'name'
							),
						array("empty"=>"-- Pilih Balai --", 'class'=>'select2 form-control')
						); 
						?> 
					</div>

				</div>  


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
							array("empty"=>"-- Pilih Jenis Pengujian --", 'class'=>'select2 form-control')
							); 
							?> 
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($testing,'testing_lab'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($testing,'testing_lab'); ?>
							<?php 
							echo $form->dropDownList($testing, "testing_lab",
								CHtml::listData(Unit::model()->findall(array('condition'=>'status=1 AND type=2')),
									'id_unit', 'name'
									),
								array("empty"=>"-- Pilih Lab Pengujian --", 'class'=>'select2 form-control')
								); 
								?> 
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