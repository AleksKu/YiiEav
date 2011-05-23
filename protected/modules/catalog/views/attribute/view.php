<?php
$this->breadcrumbs=array(
	'Eav Attributes'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List EavAttribute', 'url'=>array('index')),
	array('label'=>'Create EavAttribute', 'url'=>array('create')),
	array('label'=>'Update EavAttribute', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete EavAttribute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>View EavAttribute #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'entity_type',
		'label',
		'value_type',
		'input_type',
		'is_required',
		'is_unique',
		'default_value',
	),
)); ?>
