						<!-- ========== Left Sidebar Start ========== -->
						<div class="left side-menu">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 307px;">
								<div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 307px;">
									<div class="user-details">
										<div class="pull-left">
											<img src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo Users::model()->showAvatar(YII::app()->user->id); ?>" alt="" class="thumb-md img-circle">
										</div>
										<div class="user-info">
											<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?PHP echo YII::app()->user->name; ?><span class="caret"></span></a>
												<?php
												$this->widget('zii.widgets.CMenu', array(
													'htmlOptions' => array('class' => 'dropdown-menu'),
													'encodeLabel'=>FALSE,
													'items' => array(
														array('label' => '<i class="fa fa-user"></i> Profile', 'url' => array('/users/profile','view'=>YII::app()->user->record->username), 'visible' => !Yii::app()->user->isGuest),
														array('label' => '<i class="fa fa-cog"></i> Settings', 'url' => array('/organization/profile'), 'visible' => !Yii::app()->user->isGuest && YII::app()->user->record->level==1),
														array('label' => '<i class="fa fa-power-off"></i> Logout', 'url' => array('/site/logout','id'=>YII::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
														array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
														)
													));
													?>    
												</div>
												<p class="text-muted m-0"><?PHP echo Users::model()->active(YII::app()->user->record->active); ?></p>
											</div>
										</div>

										<div id="sidebar-menu">
											<ul>
												<li><a href="<?php echo Yii::app()->baseUrl; ?>/dashboard" class="waves-effect waves-light">
													<i class="fa fa-th-large"></i><span>Dashboard</span></a>
												</li>


												<li><a href="<?php echo Yii::app()->baseUrl; ?>/registration/admin" class="waves-effect waves-light">
													<i class="fa fa-user"></i><span>Registration</span></a>
												</li>
												<li><a href="<?php echo Yii::app()->baseUrl; ?>/message/admin" class="waves-effect waves-light">
													<i class="fa fa-envelope"></i><span>Message</span></a>
												</li>

												<li class="has_sub">
													<a href="#" class="waves-effect"><i class="fa fa-simplybuilt"></i><span>Event</span><span class="pull-right"><i class="md md-add"></i></span></a>
													<ul class="list-unstyled">
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/event/view" class="waves-effect waves-light">
															<i class="fa fa-simplybuilt"></i><span>Event</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/speaker/" class="waves-effect waves-light">
															<i class="fa fa-bullhorn"></i><span>Speaker</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/schedule/admin" class="waves-effect waves-light">
															<i class="fa fa-calendar"></i><span>Schedule</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/partner/" class="waves-effect waves-light">
															<i class="fa fa-briefcase"></i><span>Partner</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/gallery/" class="waves-effect waves-light">
															<i class="fa fa-image"></i><span>Gallery</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/pricelist/admin" class="waves-effect waves-light">
															<i class="fa fa-money"></i><span>Price</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/category" class="waves-effect waves-light">
															<i class="fa fa-tags"></i><span>Category</span></a>
														</li>
														<li><a href="<?php echo Yii::app()->baseUrl; ?>/faq/admin" class="waves-effect waves-light">
															<i class="fa fa-twitch"></i><span>FAQ</span></a>
														</li>					
													</ul>
												</li>	

											</ul>
										</div>

									</div>
								</div>
							</div>

							<!-- Left Sidebar End -->
