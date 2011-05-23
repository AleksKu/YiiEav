<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id'=>$data->code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entity_type')); ?>:</b>
	<?php echo CHtml::encode($data->entity_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::encode($data->label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_type')); ?>:</b>
	<?php echo CHtml::encode($data->value_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('input_type')); ?>:</b>
	<?php echo CHtml::encode($data->input_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_required')); ?>:</b>
	<?php echo CHtml::encode($data->is_required); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_unique')); ?>:</b>
	<?php echo CHtml::encode($data->is_unique); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('default_value')); ?>:</b>
	<?php echo CHtml::encode($data->default_value); ?>
	<br />

	*/ ?>

</div>