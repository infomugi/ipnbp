  <?php
  $baseUrl = Yii::app()->theme->baseUrl; 
  ?>  

  <div class="profile">
    <div class="row gutter-sm">
      <div class="col-md-4 col-sm-5">
        <div class="p-about m-b-20">
          <div class="pa-padding">
            <div class="pa-avatar">
              <img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $model->image; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
            </div>
            <div class="pa-name">
             <?php echo CHtml::encode($model->first_name . " " . $model->last_name); ?> 
             <?php if($model->verified==1): ?>
              <i class="zmdi zmdi-check-circle text-success m-l-5"></i> 
            <?php endif; ?>
          </div>
          <div class="pa-text"><?php echo CHtml::encode($model->job); ?></div>

          <div class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle btn btn-warning waves-effect waves-light" href="#"><i class="zmdi zmdi-settings"></i> Edit Akun <span class="caret"></span></a>
            <?php
            $this->widget('zii.widgets.CMenu', array(
              'htmlOptions' => array('class' => 'dropdown-menu dropdown-menu-left'),
              'encodeLabel'=>FALSE,
              'items' => array(
                array('label' => '<i class="fa fa-user"></i> Profile', 'url' => array('/users/update','view'=>YII::app()->user->name), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '<i class="fa fa-camera"></i> Avatar', 'url' => array('changeimage','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '<i class="fa fa-image"></i> Cover', 'url' => array('changecover','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '<i class="fa fa-lock"></i> Password', 'url' => array('changepassword','id'=>$model->id_user), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '<i class="fa fa-power-off"></i> Logout', 'url' => array('/site/logout','id'=>YII::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                )
              ));
              ?>    
            </div>

          </div>
          <div class="pa-stat">
            <div class="row no-gutter">
              <div class="pas-item col-xs-6">
                <div class="pas-number"><?php echo CHtml::encode($model->last_visit); ?></div>
                <div class="pas-text">Login Terakhir</div>
              </div>
              <div class="pas-item col-xs-6">
                <div class="pas-number"><?php echo CHtml::encode($model->ipaddress); ?></div>
                <div class="pas-text">IP Address</div>
              </div>
            </div>
          </div>
        </div>

        <div class="p-info m-b-20">
          <h4 class="m-y-0">Kontak</h4>
          <hr>
          <div class="pi-item">
            <div class="pii-icon">
              <i class="zmdi zmdi-phone"></i>
            </div>
            <div class="pii-value"><?php echo CHtml::encode($model->phone); ?> </div>
          </div>
          <div class="pi-item">
            <div class="pii-icon">
              <i class="zmdi zmdi-email"></i>
            </div>
            <div class="pii-value"><?php echo CHtml::encode($model->email); ?></div>
          </div>
          <div class="pi-item">
            <div class="pii-icon">
              <i class="zmdi zmdi-home"></i>
            </div>
            <div class="pii-value"><?php echo CHtml::encode($model->location); ?></div>
          </div>
        </div>

      </div>
      <div class="col-md-8 col-sm-7">
        <div class="p-content">

         <div class="panel panel-default panel-table">
           <div class="panel-heading">
            <h3 class="panel-title"> Profile <?php echo $model->first_name; ?></h3>
          </div>
          <BR>
            <?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>
          </div>

        </div>
      </div>
    </div>
  </div>
