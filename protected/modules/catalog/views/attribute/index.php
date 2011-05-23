<?php
$this->breadcrumbs=array(
	'Eav Attributes',
);

$this->menu=array(
	array('label'=>'Create EavAttribute', 'url'=>array('create')),
	array('label'=>'Manage EavAttribute', 'url'=>array('admin')),
);
?>

<h1>Eav Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
