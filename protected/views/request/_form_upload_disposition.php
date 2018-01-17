<?php
/* @var $this RequestController */
/* @var $disposition Request */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-disposition-form',
			'enableAjaxValidation'=>true,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'parsley-errors-list filled',
			'htmlOptions' => array(
				'onsubmit'=>"return false;",
				'onkeypress'=>" if(event.keyCode == 13){ send(); } ", 
				'class' => 'form-horizontal', 'role' => 'form',)
				)); ?>

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($disposition,'disposition_date'); ?>
					</div>   

					<div class="col-sm-8">
						<div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
							<?php echo $form->textField($disposition,'disposition_date',array('class'=>'form-control')); ?>
							<span class="input-group-addon btn btn-success"><i class="icon-th mdi mdi-calendar"></i></span>
						</div>
						<?php echo $form->error($disposition,'disposition_date'); ?>
					</div>

				</div>  

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($disposition,'disposition_to'); ?>
					</div>   

					<div class="col-sm-8">
						<?php 
						echo $form->dropDownList($disposition, "disposition_to",
							CHtml::listData(Unit::model()->findall(array('condition'=>'type=1')),
								'id_unit', 'name'
								),
							array("empty"=>"-- Disposisi Ke --", 'class'=>'select2 form-control')
							); 
							?> 
							<?php echo $form->error($disposition,'disposition_to'); ?>
						</div>

					</div> 		



					<div class="form-group">
						<div class="col-md-12">  
							<?php echo CHtml::submitButton($disposition->isNewRecord ? 'Kirim Disposisi' : 'Edit', array('class' => 'btn btn-success btn-flat pull-right', 'onclick'=>'send();')); ?>
						</div>
					</div>

					<?php $this->endWidget(); ?>

				</div></div><!-- form -->


				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'request-disposition-grid',
					'dataProvider'=>$dataDisposition,
					'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
					'columns'=>array(

						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							'htmlOptions'=>array('width'=>'10px', 
								'style' => 'text-align: center;')),

						'disposition_date',
						array(	
							'name'=>'disposition_to',
							'value'=>'$data->Balai->name',
							),
						array(	
							'name'=>'last_view',
							'value'=>'RequestDisposition::model()->views($data->last_view)',
							),
						array(	
							'name'=>'status',
							'filter'=>array('0'=>'Terkirim','1'=>'Diterima'),
							'value'=>'RequestDisposition::model()->status($data->status)',
							),

						array(
							'class'=>'CButtonColumn',
							'template'=>'{view}{delete}',
							'buttons'=>array(
								'view'=>
								array(
									'url'=>'Yii::app()->createUrl("main/requestdisposition/view", array("id"=>$data->id_disposition))',
									),
								'delete'=>
								array(
									'url'=>'Yii::app()->createUrl("main/requestdisposition/delete", array("id"=>$data->id_disposition))',
									),
								),
							),
						),
						)); ?>

				<script type="text/javascript">
					function send()
					{
						var data=$("#request-disposition-form").serialize();
						$.ajax({
							type: 'POST',
							url: '<?php echo Yii::app()->createAbsoluteUrl("request/view/id/".$model->id_request); ?>',

							data:data,
							success:function(data){
								$.fn.yiiGridView.update('request-disposition-grid');
								notification("Informasi",data,"primary")
							},
							error: function(data) { 
								notification("Peringatan","Data Tidak Boleh Kosong","warning")
							},
							dataType:'html'
						});

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