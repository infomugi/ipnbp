<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id_question,
	);

$this->pageTitle='Detail Question';
?>

<span class="hidden-xs">

	<?php echo CHtml::link('Add',
		array('create'),
		array('class' => 'btn btn-primary btn-flat','title'=>'Add Question'));
		?>
		<?php echo CHtml::link('Manage',
			array('admin'),
			array('class' => 'btn btn-primary btn-flat','title'=>'Manage Question'));
			?>
			<?php echo CHtml::link('Edit', 
				array('update', 'id'=>$model->id_question,
					), array('class' => 'btn btn-info btn-flat', 'title'=>'Edit Question'));
					?>
					<?php echo CHtml::link('Delete', 
						array('delete', 'id'=>$model->id_question,
							),  array('class' => 'btn btn-danger btn-flat', 'title'=>'Hapus Question'));
							?>

						</span>

						<HR>

							<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$model,
								'htmlOptions'=>array("class"=>"table"),
								'attributes'=>array(
									'question_sort',
									'question',
									'question',

									),
									)); ?>