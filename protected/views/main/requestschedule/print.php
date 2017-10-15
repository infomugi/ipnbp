<?php
/* @var $this RequestScheduleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Request Schedules',
	);

$this->pageTitle='Print - Laporan Pengujian';
?>
<style type="text/css">
	.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background-color:#000; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000000; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #000000; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #8C8C8C;background: #EBEBEB;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #F5F5F5;border: 1px solid #8C8C8C;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #000000) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #000000 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#000000');background-color:#8C8C8C; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #000000; color: #F5F5F5; background: none; background-color:#8C8C8C;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>
<div class="datagrid">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'schedule-grid',
		'dataProvider'=>$dataProvider,
	// 'filter'=>$model,	
		'summaryText'=>'',
		'itemsCssClass' => 'table-responsive table table-striped table-hover table-vcenter',
		'columns'=>array(

			array(
				'header'=>'No',
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				'htmlOptions'=>array('width'=>'10px', 
					'style' => 'text-align: center;')),

			array(	
				'header'=>'Nama Perusahaan',
				'value'=>'Company::model()->name($data->Request->company_id)',
				),		

			array(	
				'header'=>'Status Pengujian',
				'value'=>'RequestSchedule::model()->status($data->status)',
				),

			array(	
				'header'=>'Jenis Pengujian',
				'value'=>'$data->Testing->name',
				),

			array(	
				'header'=>'Tanggal Uji',
				'value'=>'Request::model()->date($data->start_date)." s/d ".Request::model()->date($data->end_date)',
				),

// 			array(	
// 				'header'=>'Tanggal Laporan',
// 				'value'=>'',
// 				),

// 			array(	
// 				'header'=>'Tanggal disampaikan ke Pelanggan',
// 				'value'=>'',
// 				),


			),
			)); ?>

		</div>