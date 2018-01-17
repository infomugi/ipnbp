<?php
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<div class="col-md-4 col-xs-4 col-lg-12">
	<div class="user-display">
		<div class="user-display-bg"><img src="<?php echo Yii::app()->baseUrl; ?>/image/cover/<?PHP echo $model->cover; ?>" alt="Profile Background"></div>
		<div class="user-display-bottom">
			<div class="user-display-avatar">
				<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->image; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
			</div>
			<div class="user-display-info">
				<div class="name"> <?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?> <?php if($model->verified==1): ?><i class="fa fa-check-circle"></i> <?php endif; ?></div>
				<div class="nick"><span class="mdi mdi-account"></span> <?php echo CHtml::encode($model->username); ?></div>
			</div>

		</div>
		<div class="user-info-list panel panel-default">
			<div class="panel-heading panel-heading-divider">About Me<span class="panel-subtitle"><?php echo CHtml::encode($model->job); ?></span></div>
			<div class="panel-body">
				<table class="no-border no-strip skills">
					<tbody class="no-border-x no-border-y">
						<tr>
							<td class="icon"><span class="mdi mdi-case"></span></td>
							<td class="item">Ocupation<span class="icon s7-portfolio"></span></td>
							<td><?php echo CHtml::encode($model->Division->name); ?></td>
						</tr>
						<tr>
							<td class="icon"><span class="mdi mdi-cake"></span></td>
							<td class="item">Birthday<span class="icon s7-gift"></span></td>
							<td><?php echo CHtml::encode($model->birth); ?></td>
						</tr>
						<tr>
							<td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
							<td class="item">Mobile<span class="icon s7-phone"></span></td>
							<td><?php echo CHtml::encode($model->phone); ?></td>
						</tr>
						<tr>
							<td class="icon"><span class="mdi mdi-globe-alt"></span></td>
							<td class="item">Location<span class="icon s7-map-marker"></span></td>
							<td><?php echo CHtml::encode($model->location); ?></td>
						</tr>
						<tr>
							<td class="icon"><span class="mdi mdi-pin"></span></td>
							<td class="item">Email<span class="icon s7-mail"></span></td>
							<td><?php echo CHtml::encode($model->email); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<div class="col-md-8 col-xs-4 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading panel-heading-divider">Riwayat Aktivitas
		</div>
		<div class="panel-body">
			<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>
		</div>
	</div>
</div>