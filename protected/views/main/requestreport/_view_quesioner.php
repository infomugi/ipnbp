<?php
/* @var $this QuestionController */
/* @var $data Question */
?>

<TR>
	<TD><?php echo CHtml::encode($data->question_sort); ?></TD>
	<TD><?php echo CHtml::encode($data->question); ?></TD>
	<TD colspan="4" class="be-radio">
		<?php echo CHtml::radioButtonList("answers[".$data->question_sort."]","answer".$data->question_sort,
			array(
				"4"=>"",
				"3"=>"",
				"2"=>"",
				"1"=>"",
				// "4"=>"Sangat Puas",
				// "3"=>"Puas",
				// "2"=>"Kurang Puas",
				// "1"=>"Tidak Puas",
				// "SP"=>"Sangat Puas",
				// "P"=>"Puas",
				// "KP"=>"Kurang Puas",
				// "TP"=>"Tidak Puas",
				),
			array(
				'name'=>$data->question_sort,
				'id'=>$data->question_sort,
				'template'=>'{input}{label}',
				'required'=>true,
				'separator'=>'',
				'labelOptions'=>array(
					'style'=>'padding-right:45px;'),

				)  
			); 
			?>
		</TD>
	</TR>


