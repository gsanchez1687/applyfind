<?php
$this->breadcrumbs=array('Postulantes');

?>
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
?>

<h1 class="robotothin text-primary">Postulantes</h1>
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
)); ?>
