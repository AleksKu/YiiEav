<?php
$this->breadcrumbs=array(
	'Eav Attributes'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List EavAttribute', 'url'=>array('index')),
	array('label'=>'Create EavAttribute', 'url'=>array('create')),
	array('label'=>'View EavAttribute', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>Update EavAttribute <?php echo $model->code; ?></h1>

<div class="form">
<?php echo $form; ?>
</div>