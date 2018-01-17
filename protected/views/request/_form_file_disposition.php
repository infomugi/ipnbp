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

					<input name="userImage" class="form-control xs-mb-15" type="file" class="inputFile" />

				</div>
			</div>  

		</form>

	</div><!-- form -->
</div><!-- form -->


