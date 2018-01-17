<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Questions',
	);

$this->pageTitle='Kuesioner '.Question::model()->type($type);
?>


<table class="table table-responsive table-striped table-hover">
	<THEAD>

		<TD><b>No.</b></TD>
		<TD width="50%"><b>Pertanyaan</b>


		</TD>
		<TD width="50%"><b>Jawaban</b>


			<span class="pull-right">
				<b><span class="label label-info">SP</span> = Sangat Puas, <span class="label label-success">P</span> = Puas, <span class="label label-warning">KP</span> = Kurang Puas, <span class="label label-danger">TP</span> = Tidak Puas</b>
			</span>

		</TD>
	</THEAD>
	<TBODY>
		<?php 
		echo CHtml::beginForm(array('master/question/cetak/token/99dfeb2f63c8e708db0c259825b99ce3'));

		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'summaryText'=>'',
			)); 

		echo "</TBODY><TABLE>";
		echo "<HR>";

		echo CHtml::submitButton('Kirim Kuesioner', array('class' => 'btn btn-info btn-flat pull-right')); 
		echo CHtml::endForm();
		?>

