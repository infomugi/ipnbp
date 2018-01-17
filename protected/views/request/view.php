<?php
/* @var $this RequestController */
/* @var $model Request */
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
	'Requests'=>array('admin'),
	$model->id_request,
	);

$this->pageTitle='Detail Permohonan Pengujian - '.$model->code;
?>

<div id="accordion1" class="panel-group accordion">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Permohonan - <?php echo $model->code; ?> - <?php echo $model->Company->name; ?></a></h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">


				<?php 

				if($model->letter_attachment!=""){
					echo CHtml::link('<i class="icon mdi mdi-download"></i> Surat Permohonan',
						array('downloadrequest', 'id'=>$model->id_request),
						array('class' => 'btn btn-primary btn-md'));
				}else{
					echo "<button class='btn btn-warning btn-disabled'>Surat Permohonan belum di Upload</button>";
				}

				if($model->disposition_letter!=""){
					echo CHtml::link('<i class="icon mdi mdi-download"></i>  Surat Disposisi',
						array('downloaddisposition', 'id'=>$model->id_request),
						array('class' => 'btn btn-primary pull-right btn-md'));
				}else{
					echo "<div id='show-disposition' class='pull-right label label-warning'>Surat Disposisi belum di Upload</div>";
				}



				echo "<hr>";

				if(YII::app()->user->record->level==1){

					echo $this->renderPartial('_form_update', array('model'=>$model));
					echo "<hr>";
					
					if($model->disposition_letter!=""){

						echo $this->renderPartial('_form_upload_disposition', 
							array(
								'model'=>$model,
								'disposition'=>$disposition,
								'dataDisposition'=>$dataDisposition
								));


					}else{

						echo "<div id='showDisposition' style='display: none'>";
						echo $this->renderPartial('_form_upload_disposition', 
							array(
								'model'=>$model,
								'disposition'=>$disposition,
								'dataDisposition'=>$dataDisposition
								));
						echo "</div>";

					}
					
				}else{

					
					$this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array("class"=>"table"),
						'attributes'=>array(
							'code',
							'date',
							array('name'=>'company_id','value'=>$model->Company->name),
							array('name'=>'company_id','value'=>$model->Company->address),
							array('name'=>'company_id','value'=>$model->Company->email),
							'letter_date',
							'letter_code',
							'letter_subject',
							),
						)); 

				}

				?>

				<STYLE>
					th{width:150px;}
				</STYLE>

			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" class="collapsed" aria-expanded="false"><i class="icon mdi mdi-chevron-down"></i> Detail Pengujian</a></h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">

				<?php echo $this->renderPartial('detail', array('model'=>$model,'dataTesting'=>$dataTesting)); ?>


			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="false" class=""><i class="icon mdi mdi-chevron-down"></i> Tindak Lanjut Permohonan</a></h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false" style="">
			<div class="panel-body">


				<?php 

				if(YII::app()->user->record->level==1){
					include "_tab_admin.php";
				}else{
					include "_tab_balai.php";
				}

				?>

			</div>
		</div>
	</div>


</div>


<script type="text/javascript">
	$(document).ready(function (e) {
		$("#uploadForm").on('change',(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/request/upload/id/".$model->id_request; ?>",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#show-disposition").removeClass("label label-warning");
					$("#show-disposition").html(data);
					$("#showDisposition").show();
					notification("Informasi","File Surat Disposisi Berhasil di Perbaharui","primary")
				},	        
			});
		}));
	});
</script>
