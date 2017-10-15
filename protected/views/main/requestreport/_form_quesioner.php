<?php
/* @var $this RequestQuesionerController */
/* @var $quesioner RequestQuesioner */
/* @var $form CActiveForm */
?>




<div class="form-normal form-horizontal clearfix">
	<div class="col-lg-12 col-md-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'request-quesioner-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-danger',
			'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
			)); ?>

			<?php echo $form->errorSummary($quesioner, null, null, array('class' => 'alert alert-warning')); ?>



			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($quesioner,'unit'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($quesioner,'unit'); ?>
					<?php echo $form->checkBoxlist($quesioner,'unit',CHtml::listData(Unit::model()->findAll(array('condition'=>'status=1 AND type=1','order'=>'name ASC')),
						'id_unit', 'name'
						),array('class'=>'checkbox-material')); ?>
					</div>

				</div> 

				<table class="table table-responsive table-striped table-hover">
					<TR>

						<TD><b>No.</b></TD>
						<TD></TD>
						<TD><b>Pertanyaan</b></TD>
						<TD><b>SS</b></TD>
						<TD><b>S</b></TD>
						<TD><b>KS</b></TD>
						<TD><b>TS</b></TD>
					</TR>

					<TR>
						<TD>1.</TD>
						<TD>a.</TD>
						<TD>Informasi tentang proses pelayanan SOP/ Prosedur tersebut "seharusnya" tersedia dengan jelas dan lengkap</TD>
						<TD colspan="4">
							<?php
							echo $form->radioButtonList($quesioner,'question_1',
								array('4'=>'','3'=>'','2'=>'','1'=>''),
								array(
									'template'=>'{input}{label}',
									'separator'=>'',
									'labelOptions'=>array(
										'style'=>'padding-right:20px;margin-left:15px'),

									)                              
								);
								?>
							</TD>
						</TR>

						<TR>
							<TD>1.</TD>
							<TD>b.</TD>
							<TD>Informasi tentang proses pelayanan SOP/ Prosedur tersebut "sudah" tersedia dengan jelas dan lengkap</TD>
							<TD colspan="4">
								<?php
								echo $form->radioButtonList($quesioner,'question_2',
									array('4'=>'','3'=>'','2'=>'','1'=>''),
									array(
										'template'=>'{input}{label}',
										'separator'=>'',
										'labelOptions'=>array(
											'style'=>'padding-right:20px;margin-left:15px'),

										)                              
									);
									?>
								</TD>
							</TR>

							<TR>
								<TD>2.</TD>
								<TD>a.</TD>
								<TD>Persyaratan pelayanan yang dibutuhkan "seharusnya" tersedia dengan jelas dan lengkap</TD>
								<TD colspan="4">
									<?php
									echo $form->radioButtonList($quesioner,'question_3',
										array('4'=>'','3'=>'','2'=>'','1'=>''),
										array(
											'template'=>'{input}{label}',
											'separator'=>'',
											'labelOptions'=>array(
												'style'=>'padding-right:20px;margin-left:15px'),

											)                              
										);
										?>
									</TD>
								</TR>

								<TR>
									<TD>2.</TD>
									<TD>b.</TD>
									<TD>Persyaratan pelayanan yang dibutuhkan "sudah" tersedia dengan jelas dan lengkap</TD>
									<TD colspan="4">
										<?php
										echo $form->radioButtonList($quesioner,'question_4',
											array('4'=>'','3'=>'','2'=>'','1'=>''),
											array(
												'template'=>'{input}{label}',
												'separator'=>'',
												'labelOptions'=>array(
													'style'=>'padding-right:20px;margin-left:15px'),

												)                              
											);
											?>
										</TD>
									</TR>


									<TR>
										<TD>3.</TD>
										<TD>a.</TD>
										<TD>Waktu pelayanan yang diberikan "seharusnya" cepat dan sesuai</TD>
										<TD colspan="4">
											<?php
											echo $form->radioButtonList($quesioner,'question_5',
												array('4'=>'','3'=>'','2'=>'','1'=>''),
												array(
													'template'=>'{input}{label}',
													'separator'=>'',
													'labelOptions'=>array(
														'style'=>'padding-right:20px;margin-left:15px'),

													)                              
												);
												?>
											</TD>
										</TR>

										<TR>
											<TD>3.</TD>
											<TD>b.</TD>
											<TD>Waktu pelayanan yang diberikan "sudah" cepat dan sesuai</TD>
											<TD colspan="4">
												<?php
												echo $form->radioButtonList($quesioner,'question_6',
													array('4'=>'','3'=>'','2'=>'','1'=>''),
													array(
														'template'=>'{input}{label}',
														'separator'=>'',
														'labelOptions'=>array(
															'style'=>'padding-right:20px;margin-left:15px'),

														)                              
													);
													?>
												</TD>
											</TR>


											<TR>
												<TD>4.</TD>
												<TD>a.</TD>
												<TD>Biaya atau Tarif yang diberikan "seharusnya" murah dan sesuai</TD>
												<TD colspan="4">
													<?php
													echo $form->radioButtonList($quesioner,'question_7',
														array('4'=>'','3'=>'','2'=>'','1'=>''),
														array(
															'template'=>'{input}{label}',
															'separator'=>'',
															'labelOptions'=>array(
																'style'=>'padding-right:20px;margin-left:15px'),

															)                              
														);
														?>
													</TD>
												</TR>

												<TR>
													<TD>4.</TD>
													<TD>b.</TD>
													<TD>Biaya atau Tarif yang diberikan "sudah" murah dan sesuai</TD>
													<TD colspan="4">
														<?php
														echo $form->radioButtonList($quesioner,'question_8',
															array('4'=>'','3'=>'','2'=>'','1'=>''),
															array(
																'template'=>'{input}{label}',
																'separator'=>'',
																'labelOptions'=>array(
																	'style'=>'padding-right:20px;margin-left:15px'),

																)                              
															);
															?>
														</TD>
													</TR>



													<TR>
														<TD>5.</TD>
														<TD>a.</TD>
														<TD>Penanganan pengaduan, saran dan masukan "seharusnya" cepat dan difasilitasi</TD>
														<TD colspan="4">
															<?php
															echo $form->radioButtonList($quesioner,'question_9',
																array('4'=>'','3'=>'','2'=>'','1'=>''),
																array(
																	'template'=>'{input}{label}',
																	'separator'=>'',
																	'labelOptions'=>array(
																		'style'=>'padding-right:20px;margin-left:15px'),

																	)                              
																);
																?>
															</TD>
														</TR>

														<TR>
															<TD>5.</TD>
															<TD>b.</TD>
															<TD>Penanganan pengaduan, saran dan masukan "sudah" cepat dan difasilitasi</TD>
															<TD colspan="4">
																<?php
																echo $form->radioButtonList($quesioner,'question_10',
																	array('4'=>'','3'=>'','2'=>'','1'=>''),
																	array(
																		'template'=>'{input}{label}',
																		'separator'=>'',
																		'labelOptions'=>array(
																			'style'=>'padding-right:20px;margin-left:15px'),

																		)                              
																	);
																	?>
																</TD>
															</TR>


															<TR>
																<TD>6.</TD>
																<TD>a.</TD>
																<TD>Produk / Jasa spesifikasi jenis layanan "seharusnya" jelas dan mudah didapat</TD>
																<TD colspan="4">
																	<?php
																	echo $form->radioButtonList($quesioner,'question_11',
																		array('4'=>'','3'=>'','2'=>'','1'=>''),
																		array(
																			'template'=>'{input}{label}',
																			'separator'=>'',
																			'labelOptions'=>array(
																				'style'=>'padding-right:20px;margin-left:15px'),

																			)                              
																		);
																		?>
																	</TD>
																</TR>

																<TR>
																	<TD>6.</TD>
																	<TD>b.</TD>
																	<TD>Produk / Jasa spesifikasi jenis layanan "sudah" jelas dan mudah didapat</TD>
																	<TD colspan="4">
																		<?php
																		echo $form->radioButtonList($quesioner,'question_12',
																			array('4'=>'','3'=>'','2'=>'','1'=>''),
																			array(
																				'template'=>'{input}{label}',
																				'separator'=>'',
																				'labelOptions'=>array(
																					'style'=>'padding-right:20px;margin-left:15px'),

																				)                              
																			);
																			?>
																		</TD>
																	</TR>


																	<TR>
																		<TD>7.</TD>
																		<TD>a.</TD>
																		<TD>Petugas / Pelaksana yang melakukan pelayanan "seharusnya" tersedia dengan jelas</TD>
																		<TD colspan="4">
																			<?php
																			echo $form->radioButtonList($quesioner,'question_13',
																				array('4'=>'','3'=>'','2'=>'','1'=>''),
																				array(
																					'template'=>'{input}{label}',
																					'separator'=>'',
																					'labelOptions'=>array(
																						'style'=>'padding-right:20px;margin-left:15px'),

																					)                              
																				);
																				?>
																			</TD>
																		</TR>

																		<TR>
																			<TD>7.</TD>
																			<TD>b.</TD>
																			<TD>Petugas / Pelaksana yang melakukan pelayanan "sudah" tersedia dengan jelas</TD>
																			<TD colspan="4">
																				<?php
																				echo $form->radioButtonList($quesioner,'question_14',
																					array('4'=>'','3'=>'','2'=>'','1'=>''),
																					array(
																						'template'=>'{input}{label}',
																						'separator'=>'',
																						'labelOptions'=>array(
																							'style'=>'padding-right:20px;margin-left:15px'),

																						)                              
																					);
																					?>
																				</TD>
																			</TR>


																			<TR>
																				<TD>8.</TD>
																				<TD>a.</TD>
																				<TD>Kompetensi pelaksana "seharusnya" kompeten dan memenuhi kebutuhan pelanggan</TD>
																				<TD colspan="4">
																					<?php
																					echo $form->radioButtonList($quesioner,'question_15',
																						array('4'=>'','3'=>'','2'=>'','1'=>''),
																						array(
																							'template'=>'{input}{label}',
																							'separator'=>'',
																							'labelOptions'=>array(
																								'style'=>'padding-right:20px;margin-left:15px'),

																							)                              
																						);
																						?>
																					</TD>
																				</TR>

																				<TR>
																					<TD>8.</TD>
																					<TD>b.</TD>
																					<TD>Kompetensi pelaksana "sudah" kompeten dan memenuhi kebutuhan pelanggan</TD>
																					<TD colspan="4">
																						<?php
																						echo $form->radioButtonList($quesioner,'question_16',
																							array('4'=>'','3'=>'','2'=>'','1'=>''),
																							array(
																								'template'=>'{input}{label}',
																								'separator'=>'',
																								'labelOptions'=>array(
																									'style'=>'padding-right:20px;margin-left:15px'),

																								)                              
																							);
																							?>
																						</TD>
																					</TR>


																					<TR>
																						<TD>9.</TD>
																						<TD>a.</TD>
																						<TD>Perilaku pelaksanaan/ petugas "seharusnya" ramah dan sopan</TD>
																						<TD colspan="4">
																							<?php
																							echo $form->radioButtonList($quesioner,'question_17',
																								array('4'=>'','3'=>'','2'=>'','1'=>''),
																								array(
																									'template'=>'{input}{label}',
																									'separator'=>'',
																									'labelOptions'=>array(
																										'style'=>'padding-right:20px;margin-left:15px'),

																									)                              
																								);
																								?>
																							</TD>
																						</TR>

																						<TR>
																							<TD>9.</TD>
																							<TD>b.</TD>
																							<TD>Perilaku pelaksanaan/ petugas "sudah" ramah dan sopan</TD>
																							<TD colspan="4">
																								<?php
																								echo $form->radioButtonList($quesioner,'question_18',
																									array('4'=>'','3'=>'','2'=>'','1'=>''),
																									array(
																										'template'=>'{input}{label}',
																										'separator'=>'',
																										'labelOptions'=>array(
																											'style'=>'padding-right:20px;margin-left:15px'),

																										)                              
																									);
																									?>
																								</TD>
																							</TR>

																							<TR>
																								<TD>10.</TD>
																								<TD>a.</TD>
																								<TD>Maklumat Pelayanan "seharusnya" tersedia jelas dan sesuai dengan harapan pelanggan</TD>
																								<TD colspan="4">
																									<?php
																									echo $form->radioButtonList($quesioner,'question_19',
																										array('4'=>'','3'=>'','2'=>'','1'=>''),
																										array(
																											'template'=>'{input}{label}',
																											'separator'=>'',
																											'labelOptions'=>array(
																												'style'=>'padding-right:20px;margin-left:15px'),

																											)                              
																										);
																										?>
																									</TD>
																								</TR>

																								<TR>
																									<TD>11.</TD>
																									<TD>b.</TD>
																									<TD>Keamanan & Kenyamanan sarana prasarana pelayanan "seharusnya" tersedia dengan baik</TD>
																									<TD colspan="4">
																										<?php
																										echo $form->radioButtonList($quesioner,'question_21',
																											array('4'=>'','3'=>'','2'=>'','1'=>''),
																											array(
																												'template'=>'{input}{label}',
																												'separator'=>'',
																												'labelOptions'=>array(
																													'style'=>'padding-right:20px;margin-left:15px'),

																												)                              
																											);
																											?>
																										</TD>
																									</TR>

																									<TR>
																										<TD>11.</TD>
																										<TD>a.</TD>
																										<TD>Keamanan & Kenyamanan sarana prasarana pelayanan "sudah" tersedia dengan baik</TD>
																										<TD colspan="4">
																											<?php
																											echo $form->radioButtonList($quesioner,'question_22',
																												array('4'=>'','3'=>'','2'=>'','1'=>''),
																												array(
																													'template'=>'{input}{label}',
																													'separator'=>'',
																													'labelOptions'=>array(
																														'style'=>'padding-right:20px;margin-left:15px'),

																													)                              
																												);
																												?>
																											</TD>
																										</TR>

																										<TR>
																											<TD>11.</TD>
																											<TD>b.</TD>
																											<TD>Maklumat Pelayanan "sudah" tersedia jelas dan sesuai dengan harapan pelanggan</TD>
																											<TD colspan="4">
																												<?php
																												echo $form->radioButtonList($quesioner,'question_20',
																													array('4'=>'','3'=>'','2'=>'','1'=>''),
																													array(
																														'template'=>'{input}{label}',
																														'separator'=>'',
																														'labelOptions'=>array(
																															'style'=>'padding-right:20px;margin-left:15px'),

																														)                              
																													);
																													?>
																												</TD>
																											</TR>

																										</table>


																										<div class="form-group">
																											<div class="col-md-12">  
																												<?php echo CHtml::submitButton($quesioner->isNewRecord ? 'Kirim' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
																											</div>
																										</div>

																										<?php $this->endWidget(); ?>

</div></div><!-- form -->