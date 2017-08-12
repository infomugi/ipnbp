	<tr>
		<td class="user-avatar"> 
			<img class="thumb-lg img-circle" src="<?php echo Yii::app()->baseUrl; ?>/image/avatar/<?PHP echo $data->image; ?>" alt="">
			<?php echo CHtml::link(CHtml::encode($data->username), array('profile', 'view'=>$data->username)); ?> </td>
			<td><?php echo CHtml::encode($data->email); ?></td>
			<td><?php echo CHtml::encode($data->last_visit); ?></td>
			<td class="actions">

				
				<?php if($data->level==1){ ?>

					<?php echo CHtml::link('<i class="icon mdi mdi-shield-security"></i>', 
						array('setuser', 'id'=>$data->id_user), 
						array('class' => 'icon', 'title'=>'Jadikan Staff')
						);
					?>		

					<?php }else{ ?>

						<?php echo CHtml::link('<i class="icon mdi mdi-shield-check"></i>', 
							array('setadmin', 'id'=>$data->id_user), 
							array('class' => 'icon', 'title'=>'Jadikan Administrator')
							);
						?>	

						<?php } ?>	

					</td>
				</tr>


