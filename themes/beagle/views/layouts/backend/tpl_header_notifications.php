<div class="title">Pemberitahuan Baru <span class="badge"><?php echo $total; ?></span></div>

<div class="list">
	<div class="be-scroller">
		<div class="content">
			<ul>

				<?php 
				if(YII::app()->user->record->level==1){

					foreach (Activities::getNotifications() as $data) { ?>

						<?php if($data['notification_status']==1){ ?>
							<li class="notification notification-unread" title="Belum Dilihat">
								<a href="<?php echo YII::app()->baseUrl."/site/notificationsadmin/activity/".$data['activity_id']."/object/".$data['object_id']."/id/".$data['id_activities']."/status/1"; ?>">
									<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
									<div class="notification-info">
										<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> <?php echo Activities::activityDescription($data['activity_id']); ?> <b><?php echo $data['description']; ?></b></div><span class="date format-date"><?php echo $data['created_date']; ?></span>
									</div>
								</a>
							</li>
							<?php }else{ ?>

								<li class="notification notification-read" title="Sudah Dilihat">
									<a href="<?php echo YII::app()->baseUrl."/site/notificationsadmin/activity/".$data['activity_id']."/object/".$data['object_id']."/id/".$data['id_activities']."/status/2"; ?>">
										<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
										<div class="notification-info">
											<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> <?php echo Activities::activityDescription($data['activity_id']); ?> <b><?php echo $data['description']; ?></b></div><span class="date format-date"><?php echo $data['created_date']; ?></span>
										</div>
									</a>
								</li>

								<?php } ?>

								<?php 
							} 

						}else{

							foreach (Activities::getNotificationsDisposition(YII::app()->user->record->division) as $data) {
								?>

								<?php if($data['notification_status']==1){ ?>

									<li class="notification notification-unread" title="Belum Dilihat">
										<a href="<?php echo YII::app()->baseUrl."/site/notificationsmember/activity/".$data['activity']."/object/".$data['object']."/id/".$data['id']."/status/1"."/subject/".$data['subject'];; ?>">
											<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
											<div class="notification-info">
												<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> <?php echo Activities::activityDescription($data['activity']); ?> <b><?php echo $data['description_notification']; ?></b></div><span class="date format-date"><?php echo $data['date_notification']; ?></span>
											</div>
										</a>
									</li>

									<?php }else{ ?>

										<li class="notification notification-read" title="Sudah Dilihat">
											<a href="<?php echo YII::app()->baseUrl."/site/notificationsmember/activity/".$data['activity']."/object/".$data['object']."/id/".$data['id']."/status/1"."/subject/".$data['subject'];; ?>">
												<div class="image"><img src="<?php echo $url; ?>/image/avatar/<?php echo $data['image']; ?>" alt="Avatar"></div>
												<div class="notification-info">
													<div class="text"><span class="user-name"> <?php echo $data['name']; ?></span> <?php echo Activities::activityDescription($data['activity']); ?> <b><?php echo $data['description_notification']; ?></b></div><span class="date format-date"><?php echo $data['date_notification']; ?></span>
												</div>
											</a>
										</li>

										<?php 
									} 
								} 
							}
							?>	

						</ul>
					</div>
				</div>
			</div>
			<div class="footer"> <a href="<?php echo $url; ?>request/admin">Lihat Semua Permohonan</a></div>