<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eav-attribute-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'entity_type'); ?>
		<?php echo $form->textField($model,'entity_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'entity_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value_type'); ?>
		<?php echo $form->textField($model,'value_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'input_type'); ?>
		<?php echo $form->textField($model,'input_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'input_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_required'); ?>
		<?php echo $form->textField($model,'is_required'); ?>
		<?php echo $form->error($model,'is_required'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_unique'); ?>
		<?php echo $form->textField($model,'is_unique'); ?>
		<?php echo $form->error($model,'is_unique'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_value'); ?>
		<?php echo $form->textArea($model,'default_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->