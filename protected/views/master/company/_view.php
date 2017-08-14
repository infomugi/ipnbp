<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="col-xs-12 col-md-6 col-lg-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

					<?php echo CHtml::link(CHtml::encode($data->id_company), array('view', 'id'=>$data->id_company)); ?>
	<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
							'id_company',
		'created_date',
		'update_date',
		'company_code',
		'name',
		'owner',
		'address',
		'email',
		'phone',
		'faximile',
		'postal_code',
		'type',
		'place',
		'classification',
		'province',
		'city',
		'category_id',
		'status',
					),
					)); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
