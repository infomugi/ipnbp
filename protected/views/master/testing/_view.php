<?php
/* @var $this TestingController */
/* @var $data Testing */

$datay=Category::model()->findByAttributes(array('name'=>$data->lab_name));
$data->lab_id = $datay->id_category;
$data->save();


?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">
			    
			    <?php echo $datax->lab_id; ?>

		
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'part_name',
							'id_testing',
		'code',
		'name',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
