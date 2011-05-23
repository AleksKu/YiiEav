<?php
$this->breadcrumbs=array(
	'Eav Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EavAttribute', 'url'=>array('index')),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>Create EavAttribute</h1>

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<div class="form">
<?php echo $form; ?>
</div>