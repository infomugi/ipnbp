<?php
/* @var $this FaqController */
/* @var $data Faq */
?>

<div class="col-sm-12 col-lg-12">
	<div class="panel">
		<div class="panel-body">
			<div class="media-main">
					<h4><?php echo CHtml::link(CHtml::encode($data->question), array('view', 'id'=>$data->id_faq)); ?>

					</h4>
					<p class="text-muted"><?php echo CHtml::encode($data->answer); ?></p>
				</div>

			</div>
		</div>
	</div>		