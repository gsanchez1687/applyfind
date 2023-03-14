<div class="jumbotron">
  <h1>Mi Empresa <?php  echo Yii::app()->params['pais']; ?></h1>
  <p>Esta herramienta permite encontrar las ofertas de trabajo dentro de la empresa en diferentes partes del mundo</p>
  <p><a href="<?php echo Yii::app()->request->baseUrl; ?>/trabajos/index" class="btn btn-primary btn-lg">Entrar</a></p>
</div>
<div class="jumbotron">
  
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="text-center thumbnail">
                <i class="fa fa-search fa-5x"></i>
                <div class="caption">
                    <h4>Encuentra</h4>
                   

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="text-center thumbnail">
               <i class="fa fa-pencil-square-o fa-5x"></i>
                <div class="caption">
                    <h4>Postulate</h4>
                    

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="text-center thumbnail">
                <i class="fa fa-paper-plane-o fa-5x"></i>
                <div class="caption">
                    <h4>Envia tu CV</h4>
                    

                </div>
            </div>
        </div>
    </div>    
</div>
