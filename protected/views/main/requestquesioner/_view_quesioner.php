<?php
/* @var $this QuestionController */
/* @var $data Question */
?>

<TR>
	<TD><?php echo CHtml::encode($data->question_sort); ?></TD>
	<TD><?php echo CHtml::encode($data->question); ?></TD>
	<TD><?php echo CHtml::encode(RequestQuesioner::model()->showAnswer($model->answers,$widget->dataProvider->getPagination()->currentPage * $widget->dataProvider->getPagination()->pageSize + $index + 1;)); ?></TD>
</TR>


