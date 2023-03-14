<h2  class=""><?php echo Yii::t("es","Ofertas de Empleo Applyfind "); ?><?php echo Yii::app()->params['pais']; ?></h2>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){  
    $.fn.yiiListView.update('trabajoslistview', {        
        data: $(this).serialize()
      
    });
    return false;
});
");

//$dataProvider->sort->defaultOrder='id DESC';
?>

<div class="search-form">
    <?php  $this->renderPartial('_search',array('model'=>$model)); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'id'=>'trabajoslistview', 
        'sortableAttributes'=>array(
        'id'=>'cronologico'          
        ),      
));
?>