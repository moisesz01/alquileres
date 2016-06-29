<?php 
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'apartamento-form',
	'enableAjaxValidation'=>false,


)); ?>

<style type="text/css">
.form-inline .form-group > div.col-xs-8 {
    padding-left: 0;
    padding-right: 0;
}
// vertical align label
.form-inline label {
    line-height: 34px;
}

.form-inline .form-control {
    width: 100%;
}

@media (min-width: 768px) {
  .form-inline .form-group {
    margin-bottom: 15px;
  }
}
</style>
<script>

$(function(){

         $('select#Apartamento_id_cliente').change(function () { 

      //  $('select#Apartamento_id_cliente').blur(function() {
         //   var id_cliente=(document.getElementById('Apartamento_id_cliente').value);
 //alert("ff");
          var x = $('#Apartamento_id_cliente').val();
                   alert(x);
         
            //   alert(x);
              $.ajax({
                          url: "<?php echo Yii::app()->createUrl('cliente/existecliente')?>",
                          data: {"id_cliente":x},
                          success: function(data){
                                  $nombre=$("#nombre").val(data);
                         }
              });
         });
    
    
});
</script>

<?php echo $form->errorSummary($model); ?>

<!-- INICIO COMBOS DEPENDIENTES -->

<button type="button" class="btn btn-warning">DATOS PROYECTO</button>
<br/>
<div class="row">
    <?php echo $form->labelEx($model,'id_proyecto'); ?>
    <?php echo $form->dropDownList($model,'id_proyecto',
                   CHtml::listData(Proyecto::model()->findAll(),'id_proyecto','nom_proyecto'),
                        array(
                          'class'=>'form-control',
                            'ajax'=>array(
                              'type'=>'GET',
                              'url'=>CController::createUrl('apartamento/Selectdos'),
                              'update'=>'#'.CHtml::activeId($model,'id_edificio'),
                              'beforeSend' => 'function(){
                               $("#Apartamento_id_edificio").find("option").remove();
                               $("#Apartamento_id_apartamento").find("option").remove();
                               }',  
                            ),'prompt'=>'Seleccione'
                            
                            
                        )
                        //array()
                        ); ?>
    <?php echo $form->error($model,'id_proyecto'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model,'id_edificio'); ?>
    <?php 
                $lista_dos = array();
                if(isset($model->id_edificio)){
                $id_uno = intval($model->id_proyecto); 
                $lista_dos = CHtml::listData(Edificio::model()->findAll("id_proyecto = '$id_uno'"),'id_edificio','nom_edificio');
                }                
                echo $form->dropDownList($model,'id_edificio',$lista_dos,
                        array(
                            'class'=>'form-control',
                            'ajax'=>array(
                              'type'=>'POST',
                              'url'=>CController::createUrl('apartamento/Selecttres'),
                              'update'=>'#'.CHtml::activeId($model,'id_apartamento'),
                              'beforeSend' => 'function(){
                              $("#Apartamento_id_apartamento").find("option").remove();
                               }',   
                                
                            ),
                            
                            'prompt'=>'Seleccione')
                        ); ?>
            
            
            
            
            
    <?php echo $form->error($model,'id_edificio'); ?>
  </div>
        
        
        
        

  <div class="row">
    <?php echo $form->labelEx($model,'id_apartamento'); ?>
    <?php 
                $lista_tres = array();
                if(isset($model->id_nivel_tres)){
                $id_dos = intval($model->id_nivel_dos); 
                $lista_tres = CHtml::listData(Apartamento::model()->findAll("id_edificio = '$id_dos'"),'id_apartamento','nom_apartamento');
                }
                echo $form->dropDownList($model,'id_apartamento',$lista_tres,
                        array(
                          'class'=>'form-control',
                          'prompt'=>'Seleccione')
                        ); ?>
    <?php echo $form->error($model,'id_apartamento'); ?>
  </div>

<!-- FIN COMBOS DEPENDIENTES -->
<br/>
<button type="button" class="btn btn-warning">ACTIVO</button>
  <div class="row">
  <div class="col-xs-3">
  
    <?php
        $this->widget(
        'booster.widgets.TbSwitch',
        array(
            'name' => 'testToggleButton1',
            'options' => array(
                'size' => 'small', //null, 'mini', 'small', 'normal', 'large
                'onColor' => 'success', // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                'offColor' => 'danger',  // 'primary', 'info', 'success', 'warning', 'danger', 'default'
            ),
        )
    );
    ?>
  </div>
</div>
  <br/><br/>


<button type="button" class="btn btn-warning">DATOS CLIENTE</button>
<br/><br/>
<div class="alert alert-info" role="alert">
  <a href="#" class="alert-link">Busque el Nombre del Cliente para obtener sus datos</a>
</div>
  <div class="form-group">

  
  <div>
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_cliente',
                      'asDropDownList' => true,
                      'data' => CHtml::listData(Cliente::model()->findAll(), 'id_cliente', 'nom_cliente'),
                      'options' => array(
                      'placeholder' => "NOMBRE DEL INQUILINO",
                        'allowClear'=>true,
                        'minimumInputLength'=>2,
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:90px',
                      ),
                    ));
        ?>
  </div> 
<br/><br/>
  <div class="col-xs-4">
      <label for="ex1">Nombre Cliente</label>
      <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre Cliente">
  </div>
  <div class="col-xs-4">
      <label for="ex2">Apellido </label>
      <input class="form-control" id="ex2" type="text" placeholder="Apellido Cliente">
  </div>
  <div class="col-xs-5">
      <label for="ex3">Cedula</label>
      <input class="form-control" id="ex3" type="text" placeholder="XXXX">
  </div>
 </div>




<?php $this->endWidget(); ?>