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

		<?php
		echo "<table class='table table-responsive table-striped table-hover'>
		<THEAD>
			<TD><b>No.</b></TD>
			<TD width='70%'><b>Pertanyaan</b>
			</TD>
			<TD width='30%'>
				<span class='pull-left'>
					<b>
						<span class='label label-info' style='margin-right:10px;'>SP</span> 
						<span class='label label-success' style='margin-right:25px;'>P</span> 
						<span class='label label-warning' style='margin-right:25px;'>KP</span> 
						<span class='label label-danger' style='margin-right:10px;'>TP</span> 
					</b>
				</span>

			</TD>
		</THEAD>
		<TBODY>";

			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataQuesioner,
				'itemView'=>'_view_quesioner',
				'summaryText'=>'',
				)); 

			echo "</TBODY>";
			echo "<TFOOT><TD colspan='3'><span class='pull-right'>
			<b><span class='label label-info'>SP</span> = Sangat Puas, <span class='label label-success'>P</span> = Puas, <span class='label label-warning'>KP</span> = Kurang Puas, <span class='label label-danger'>TP</span> = Tidak Puas</b></span></TD></TFOOT><TABLE>";
			echo "<HR>";

			?>

			<div class="form-group">
				<div class="col-md-12">  
					<?php echo CHtml::submitButton($quesioner->isNewRecord ? 'Kirim' : 'Edit', array('class' => 'btn btn-info btn-flat pull-right')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>

