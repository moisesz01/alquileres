<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	$model->id_gestion=>array('view','id'=>$model->id_gestion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Gestion','url'=>array('index')),
	array('label'=>'Create Gestion','url'=>array('create')),
	array('label'=>'View Gestion','url'=>array('view','id'=>$model->id_gestion)),
	array('label'=>'Manage Gestion','url'=>array('admin')),
	);
	?>

	<h1>Update Gestion <?php echo $model->id_gestion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>