/* Function General para el Box Swicth Boostrap con Ajax*/
function GridviewBoxSwitch(idGridview, urlpath) {

    $('.onoffswitch-checkbox').click(function() {
        
        /* Obtengo el ID del Box presionado*/
        var idchx = $(this).attr('id');
        
        /* Obtengo el Checkbox correspondiente a la seleccion */
        if ($('#' + idchx).is(':checked')) {
            /* Si es Checked el valor es 1 */
            var estatus = 1;
        } else {
            /* Si no es Checked el valor es 0 */
            var estatus = 0;
        }
       

        /* Ajuste de la ruta con los valores */
        var ruta = urlpath + '?it=' + idchx + '&s=' + estatus;

        /* Proceso de Envio de Ajax mediante Jquery */
        jQuery.ajax({'type': 'POST',
            'url': ruta,
            'cache': false,
            'data': jQuery(this).parents('form').serialize(),
            'success': function(html) {
                /* Uddate del Gridview */
                jQuery('#' + idGridview).yiiGridView('update');
            }});
    });

}