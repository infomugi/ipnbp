<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
$this->widget('ext.yii-toastr.MugiToastr', array(
	'flashMessagesOnly' => true, 
	'options' => array(
		"closeButton" => true,
		"debug" => true,
		"progressBar"=> true,
		"positionClass" => "toast-bottom-right",
		"showDuration" => "600",
		"hideDuration" => "1000",
		"timeOut" => "15000",
		"extendedTimeOut" => "1000",
		"showEasing" => "swing",
		"hideEasing" => "linear",
		"showMethod" => "fadeIn",
		"hideMethod" => "fadeOut"
		)
	));


$this->breadcrumbs=array(
	'Users',
	);

$this->pageTitle='Otorisasi User';
?>


<div class="panel panel-default panel-table">
	<div class="panel-heading">
		<div class="title"><?php echo $this->pageTitle; ?></div>
	</div>
	<div class="panel-body table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="width:37%;">Pengguna</th>
					<th style="width:36%;">Email</th>
					<th>Date</th>
					<th class="actions">Otorisasi</th>
				</tr>
			</thead>
			<tbody>


				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'summaryText'=>'',
					'itemView'=>'_view',
					)); ?>



				</tbody>
			</table>
		</div>
	</div>

