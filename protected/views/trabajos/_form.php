<script>

$( document ).ready(function() {
     $(".oculto").hide();
});

function mostrando_detalles(){
     $(".oculto").toggle();    
}
   
</script>
<script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array('id'=>'trabajos-form','enableAjaxValidation'=>false)); ?>
    <?php echo $form->errorSummary($model); ?>  
    <br />
    <div class="row table-bordered text-center">
        
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'departamento_id'); ?>
            <?php echo $form->dropDownList($model,'departamento_id',CHtml::listData(Departamentos::model()->findAll(''), 'id', 'nombre'),array('data-placeholder'=>'Seleccione','class'=>'chosen-select','tabindex'=>'1')); ?>
            <?php echo $form->error($model,'departamento_id'); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model,'pais_id'); ?>
            <?php echo $form->dropDownList($model,'pais_id',CHtml::listData(Paises::model()->findAll('activo = 1'), 'id', 'nombre'),array('data-placeholder'=>'Seleccione','class'=>'chosen-select','tabindex'=>'1')); ?>
            <?php echo $form->error($model,'pais_id'); ?>
        </div>
        &nbsp;
    </div>
    <br />
   

    <div class="row">
        <?php echo $form->labelEx($model,'titulo'); ?>
        <?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'titulo'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'tag'); ?>
        <?php echo $form->textField($model,'tag',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'tag'); ?>
    </div>
    <br />

    
    <div class="row">
        <?php echo $form->labelEx($model,'descripcion'); ?>
        <?php echo $form->textArea($model,'descripcion',array('rows'=>3, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
        <?php echo $form->error($model,'descripcion'); ?>
    </div>
    

<div class="oculto">
        
    
        <div class="row">
            <?php echo $form->labelEx($model,'proposito'); ?>
            <?php echo $form->textArea($model,'proposito',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'proposito'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'funcion'); ?>
            <?php echo $form->textArea($model,'funcion',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'funcion'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'formacion'); ?>
            <?php echo $form->textArea($model,'formacion',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'formacion'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'conocimiento'); ?>
            <?php echo $form->textArea($model,'conocimiento',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'conocimiento'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'experiencia'); ?>
            <?php echo $form->textArea($model,'experiencia',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'experiencia'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'habilidad'); ?>
            <?php echo $form->textArea($model,'habilidad',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'habilidad'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'beneficio'); ?>
            <?php echo $form->textArea($model,'beneficio',array('rows'=>2, 'cols'=>50,'class'=>'form-control ckeditor')); ?>
            <?php echo $form->error($model,'beneficio'); ?>
        </div>
        <br />
        <div class="row">
            <?php echo $form->labelEx($model,'salario'); ?>
            <?php echo $form->textField($model,'salario',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'salario'); ?>
        </div>
</div><!--fin del oculto-->
<br />
    <div class="well well-sm">
       <?php echo CHtml::Button('mas detalles',array('class'=>'mostrando_detallles btn btn-primary','onclick'=>'mostrando_detalles()')); ?>	
    </div>
    
    <br />
    <div class="row">
                
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $form->labelEx($model,'cantidad_vacante'); ?> </div>
                <div class="panel-body">
                    <?php echo $form->textField($model, 'cantidad_vacante',array('class' => 'form-control')); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                        'name' => 'cantidad_vacante',
                        'value' => 1, // default selection 
                        'event' => 'change',
                        'options' => array(
                            'min' => 1, //minimum value for slider input
                            'max' => 10, // maximum value for slider input
                            'animate' => true,
                            'range' => 'max',
                            // on slider change event 
                            'slide' => 'js:function(event,ui){$("#Trabajos_cantidad_vacante").val(ui.value);}',
                        ),
                        // slider css options
                        'htmlOptions' => array(
                            'style' => 'width:200px;background-color:red;'                           
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'cantidad_vacante'); ?>
                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">  <?php echo $form->labelEx($model,'tiempo_experiencia'); ?></div>
                <div class="panel-body">
                    <?php echo $form->textField($model, 'tiempo_experiencia',array('class' => 'form-control')); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                        'name' => 'tiempo_experiencia',
                        'value' => 1, // default selection 
                        'event' => 'change',
                        'options' => array(
                            'min' => 1, //minimum value for slider input
                            'max' => 10, // maximum value for slider input
                            'animate' => true,
                            'range' => 'max',
                            // on slider change event 
                            'slide' => 'js:function(event,ui){$("#Trabajos_tiempo_experiencia").val(ui.value);}',
                        ),
                        // slider css options
                        'htmlOptions' => array(
                            'style' => 'width:200px;background-color:red;'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'tiempo_experiencia'); ?>
                </div>
            </div>
        </div>

    </div>
    
      <div class="row">
       
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"> <?php echo $form->labelEx($model,'edad_min'); ?></div>
                <div class="panel-body">
                    <?php echo $form->textField($model, 'edad_min', array('size' => 2, 'maxlength' => 2,'class'=>'form-control')); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                        'name' => 'edad_min',
                        'value' => 1, // default selection 
                        'event' => 'change',
                        'options' => array(
                            'min' => 20, //minimum value for slider input
                            'max' => 50, // maximum value for slider input
                            'animate' => true,
                            'range' => 'max',
                            // on slider change event 
                            'slide' => 'js:function(event,ui){$("#Trabajos_edad_min").val(ui.value);}',
                        ),
                        // slider css options
                        'htmlOptions' => array(
                            'style' => 'width:200px;background-color:red;'
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'edad_min'); ?>
                   
                </div>              
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $form->labelEx($model,'edad_max'); ?> </div>
                <div class="panel-body">
                    <?php echo $form->textField($model, 'edad_max', array('size' => 2, 'maxlength' => 2,'class'=>'form-control')); ?>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiSliderInput', array(
                        'name' => 'edad_max',
                        'value' => 1, // default selection 
                        'event' => 'change',
                        'options' => array(
                            'min' => 20, //minimum value for slider input
                            'max' => 60, // maximum value for slider input
                            'animate' => true,
                            'range' => 'max',
                            // on slider change event 
                            'slide' => 'js:function(event,ui){$("#Trabajos_edad_max").val(ui.value);}',
                        ),
                        // slider css options
                        'htmlOptions' => array(
                            'style' => 'width:200px;background-color:red;'
                        ),
                    ));
                    ?>
        <?php echo $form->error($model,'edad_max'); ?>
                </div>
            </div>
        </div>

    </div>
    
    <div class="row table-bordered text-center">
        
        <div class="col-md-4">
        <?php echo $form->labelEx($model,'genero_id'); ?>
        <?php echo $form->dropDownList($model,'genero_id',CHtml::listData(Generos::model()->findAll(), 'id', 'sexo'),array('data-placeholder'=>'Seleccione','tabindex'=>'1')); ?>
        <?php echo $form->error($model,'genero_id'); ?>
        </div>
        <div class="col-md-4">
        <?php echo $form->labelEx($model,'activo'); ?>
        <?php echo $form->dropDownList($model,'activo',Active::getListActive()); ?>
        <?php echo $form->error($model,'activo'); ?>
        </div>
        <div class="col-md-4">
        <?php echo $form->labelEx($model,'prioridad'); ?>
        <?php echo $form->dropDownList($model,'prioridad',Active::getListPrioridad()); ?>
        <?php echo $form->error($model,'prioridad'); ?>
        </div>
        
    </div>
    <br /><br />
    <div class="btn-group">
        <?php echo CHtml::Button(Yii::app()->params['cancel-text'],array('class'=>Yii::app()->params['cancel-btn'],'onclick'=>'history.back(-1)')); ?>	
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->params['Create-text'] : Yii::app()->params['Save-text'],array('class'=>Yii::app()->params['form-btn'])); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->