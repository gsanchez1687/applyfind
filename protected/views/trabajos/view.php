<h5 class="text-default"><b><?php echo $model->titulo; ?></b></h5>
<hr>

<h5 class="text-default"><b>Sobre la oferta</b></h5>
<?php echo "Publicado: ".Trabajos::fecha($model->creado); ?> (<?php echo Trabajos::tiempoTranscurridoFechas(date("Y-m-d H:i:s"), $model->fecha_contratacion) ?>)
<br />
<b>Salario</b>
<ul>
	<li><?php echo $model->salario; ?></li>
</ul>
<b>Descripcion</b>
<ul>
	<li><?php echo $model->descripcion; ?></li>
</ul>
<b>Requerimientos</b>
<ul>
	<li>Educación Mínima: Educación Técnico/Profesional</li>
	<li>Disponibilidad de Viajar: No</li>
	<li>Disponibilidad de Cambio de Residencia: No</li>
</ul>
<div  class="btn-group">
        <?php echo CHtml::link('Volver', array('/trabajos/'), array('class' => 'btn btn-default')); ?>      
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><?php  echo  Yii::t("es","Postularme"); ?> <i class="fa fa-arrow-right"></i></button>          
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-default" id="myModalLabel"><b>Formulario de Postulacion</b></h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                  <div class="form">
                      
                 
                  <?php $form = $this->beginWidget('CActiveForm', array('id' => 'postulantes-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'),)); ?>

                  <p class="note">Fields with <span class="required">*</span> are required.</p>

                  <?php echo $form->errorSummary($postulante); ?>

                  <div class="row">
                      <?php echo $form->labelEx($postulante, 'nombre'); ?>
                      <?php echo $form->textField($postulante, 'nombre', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                      <?php echo $form->error($postulante, 'nombre'); ?>
                  </div>

                  <div class="row">
                      <?php echo $form->labelEx($postulante, 'apellido'); ?>
                      <?php echo $form->textField($postulante, 'apellido', array('class' => 'form-control')); ?>
                      <?php echo $form->error($postulante, 'apellido'); ?>
                  </div>

                  <div class="row">
                      <?php echo $form->labelEx($postulante, 'telefono_personal'); ?>
                      <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $postulante,"attribute" => "telefono_personal","mask" => '(99) 9999-999-9999',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
                      <?php echo $form->error($postulante, 'telefono_personal'); ?>
                  </div>

                  <div class="row">
                      <?php echo $form->labelEx($postulante, 'email'); ?>
                      <?php echo $form->textField($postulante, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                      <?php echo $form->error($postulante, 'email'); ?>
                  </div>

                  <div class="row">
                      <label>Formatos Permitidos: .pdf</label>
                      <label>El archivo no puede ser mayor a 3M</label>
                      <?php echo CHtml::activeFileField($postulante, 'file'); ?>
                      <?php echo $form->error($postulante, 'file'); ?>
                  </div>
                  
                  <div  class="btn-group col-md-12">                   
                      <?php echo CHtml::submitButton($postulante->isNewRecord ? 'Enviar' : 'Enviar', array('class' => 'btn btn-primary btn-lg btn-block')); ?> 
                  </div>

                  <?php $this->endWidget(); ?>
                  </div>
              </div>
          </div>
      </div>
     
    </div>
  </div>
</div>
