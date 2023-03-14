<?php
if ($data->prioridad == 1) {
	$color = 'color-trabajo';
} else
	$color = 'sin-color-trabajo';
?>

<div class="view  <?php //echo $color; ?>">
	<div class="row">
		<div class="col-md-10">
			<h5 class="text-uppercase  texto-titulo">
				<b> <?php echo CHtml::link($data->titulo, array('/trabajos/view/'.$data->slug)); ?></b>
			</h5>
		</div>
		<div class="text-right col-md-2 "> <?php echo CHtml::image(Yii::app()->baseUrl.'/images/logos/logo.png?v=1', 'logo',array('width'=>'100px')); ?></div>
	</div>
	<p><b><?php echo $data->descripcion; ?></b></p>
	<p><?php echo $data->departamento->nombre." - ".$data->pais->nombre; ?></p>
	
	<div class="row">
  <div class="col-md-10">
  <p><i class="fa fa-clock-o"></i> <?php echo "Publicado: ".Trabajos::fecha($data->creado); ?> (<?php echo Trabajos::tiempoTranscurridoFechas(date("Y-m-d H:i:s"), $data->fecha_contratacion) ?>)</p>
  </div>
		<div class="text-right col-md-2">
  	 <?php echo CHtml::link('Ver mas',array('/trabajos/view/'.$data->slug), array('class' => 'btn  btn-primary')); ?>
  </div>
	</div>
	
	
	
</div>