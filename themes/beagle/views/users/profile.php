<?php
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<div class="col-md-4">
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

<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading panel-heading-divider">Riwayat Aktivitas
    </div>
    <div class="panel-body">
      <ul class="user-timeline">
        <li class="latest">
          <div class="user-timeline-date">Just Now</div>
          <div class="user-timeline-title">Create New Page</div>
          <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
        </li>
        <li>
          <div class="user-timeline-date">Today - 15:35</div>
          <div class="user-timeline-title">Back Up Theme</div>
          <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
        </li>
        <li>
          <div class="user-timeline-date">Yesterday - 10:41</div>
          <div class="user-timeline-title">Changes In The Structure</div>
          <div class="user-timeline-description">Quisque sed est felis. Vestibulum lectus nulla, maximus in eros non, tristique consectetur lorem. Nulla molestie sem quis imperdiet facilisis</div>
        </li>
      </ul>
    </div>
  </div>
</div>