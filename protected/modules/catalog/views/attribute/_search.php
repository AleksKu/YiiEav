<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entity_type'); ?>
		<?php echo $form->textField($model,'entity_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value_type'); ?>
		<?php echo $form->textField($model,'value_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'input_type'); ?>
		<?php echo $form->textField($model,'input_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_required'); ?>
		<?php echo $form->textField($model,'is_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_unique'); ?>
		<?php echo $form->textField($model,'is_unique'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_value'); ?>
		<?php echo $form->textArea($model,'default_value',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->