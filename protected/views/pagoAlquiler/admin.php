<?php
$this->breadcrumbs=array(
	'Pago Alquilers'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PagoAlquiler','url'=>array('index')),
array('label'=>'Create PagoAlquiler','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pago-alquiler-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Pago Alquilers</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'pago-alquiler-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_pago_alquiler',
		'id_contrato',
		'fecha_pago',
		'monto_pagado',
		'saldo_pendiente',
		'fecha_ultimo_pago',
		/*
		'monto_alquiler',
		'id_proyecto',
		'id_edificio',
		'id_apartamento',
		'id_cliente',
		'num_recibo',
		'concepto',
		'monto',
		'observacion',
		'id_meses',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
