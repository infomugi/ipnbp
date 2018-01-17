<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<form id="uploadForm-request" action="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/request/uploadRequest/id/".$model->id_request; ?>" method="post">

			<div class="form-group">
				<div class="col-sm-4 control-label">
					Surat Permohonan
				</div>   

				<div class="col-sm-8">
					
					<input id="file-request" name="userImage" class="form-control xs-mb-15" type="file" class="inputFile" />
					
					<div id="show-request"></div>
				</div>
			</div>  

		</form>

	</div><!-- form -->
</div><!-- form -->

<script type="text/javascript">
	$(document).ready(function (e) {
		$("#uploadForm-request").on('change',(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/request/uploadRequest/id/".$model->id_request; ?>",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#show-request").html(data);
					notification("Informasi","File Surat Permohonan Berhasil di Perbaharui","primary")

				},
				error: function() 
				{
				} 	        
			});
		}));
	});


</script>
