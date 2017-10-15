<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>
<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-9 col-md-10"> 

		<form id="uploadForm" action="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl."/request/upload/id/".$model->id_request; ?>" method="post">

			<div class="form-group">

				<div class="col-sm-4 control-label">
					Surat Disposisi
				</div>   

				<div class="col-sm-8">

					<input name="userImage" class="btn btn-block btn-lg btn-success btn-flat" type="file" class="inputFile" />
					
				</div>
			</div>  
			
			<div class="form-group">
				<div class="col-md-4">  
				</div>

				<div class="col-sm-8">

					<div id="targetLayer"></div>
					<input type="submit" value="Upload File Disposisi" class="btn btn-success btn-flat pull-right" />

				</div>
			</div>

		</form>

	</div><!-- form -->
</div><!-- form -->

<script type="text/javascript">
	$(document).ready(function (e) {
		$("#uploadForm").on('submit',(function(e) {
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
					$("#targetLayer").html(data);
				},
				error: function() 
				{
				} 	        
			});
		}));
	});
</script>
