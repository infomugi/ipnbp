<?php
/* @var $this CompanyContactController */
/* @var $model CompanyContact */

$this->breadcrumbs=array(
	'Company Contacts'=>array('index'),
	$model->name,
	);

$this->pageTitle='Detail Kontak Personal Perusahaan';
?>

<span class="visible-xs">


	<?php echo CHtml::link('<i class="fa fa-edit"></i>', 
		array('update', 'id'=>$model->id_company_contact,
			), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kontak Personal Perusahaan'));
			?>
			<?php echo CHtml::link('<i class="fa fa-remove"></i>', 
				array('delete', 'id'=>$model->id_company_contact,
					),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kontak Personal Perusahaan'));
					?>

				</span> 

				<span class="hidden-xs">

					
					<?php echo CHtml::link('Edit', 
						array('update', 'id'=>$model->id_company_contact,
							), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Kontak Personal Perusahaan'));
							?>
							<?php echo CHtml::link('Delete', 
								array('delete', 'id'=>$model->id_company_contact,
									),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Kontak Personal Perusahaan'));
									?>

								</span>

								<HR>

									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											'name',
											'address',
											'phone',
											'email',
											array('name'=>'status','value'=>Users::model()->status($model->status)),
											),
											)); ?>

									<STYLE>
										th{width:150px;}
									</STYLE>

