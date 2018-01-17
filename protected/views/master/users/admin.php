<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Kelola',
	);

$this->pageTitle='Kelola Pengguna';
?>

<span class="visible-xs">

	<?php echo CHtml::link('<i class="icon mdi mdi-plus"></i>',
		array('create'),
		array('class' => 'btn btn-primary pull-right btn-md','title'=>'Tambah Pengguna'));
		?>			

	</span> 

	<span class="hidden-xs">

		<?php echo CHtml::link('Tambah Pengguna',
			array('create'),
			array('class' => 'btn btn-primary pull-right btn-flat','title'=>'Tambah Pengguna'));
			?>			

		</span>

		<HR>

			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'users-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),


					'username',
					'email',

					array(	
						'name'=>'level',
						'filter'=>array('1'=>'Administrator','2'=>'Staff','3'=>'Balai'),
						'value'=>'Users::model()->level($data->level)',
						),

					array(
						'header'=>'Edit Password',
						'class'=>'CButtonColumn',
						'template'=>'{Edit}',
						'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'Edit'=>
							array(
								'url'=>'Yii::app()->createUrl("master/users/password", array("id"=>$data->id_user))',
								'imageUrl'=>YII::app()->baseUrl.'/image/setting/lock.png',
								),
							),
						),					

					array(
						'class'=>'CButtonColumn',
						'template'=>'{view}',
						'htmlOptions'=>array('width'=>'70px', 'style' => 'text-align: center;'),
						'buttons'=>array(
							'view'=>
							array(
								'url'=>'Yii::app()->createUrl("master/users/view", array("id"=>$data->id_user))',
								),
							),
						),

					),
					)); ?>

