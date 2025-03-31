jQuery.noConflict();
jQuery(document).ready(function(){

    $("#actualizar").attr('disabled', true);

    $(".editar").on('click', function(e){

        e.preventDefault();

        $("#nombreEditar").val('');
        $("#precioEditar").val('');
        $("#idProducto").val('');

        var id = $(this).attr('data-value').split(',')[0];
        var nombre = $(this).attr('data-value').split(',')[1];
        var precio = $(this).attr('data-value').split(',')[2];

        if( id === null || id === '' ){

            $("#actualizar").attr('disabled', true);

            Swal.fire({

                icon: 'error',
                title: 'Error de lectura',
                allowOutsideClick: false,
                showConfirmButton: true,

            });

            $("#actualizar").attr('disabled', true);

        }else{

            $("#nombreEditar").val( nombre );
            $("#precioEditar").val( precio );
            $("#idProducto").val( id );

            $("#actualizar").attr('disabled', false);

        }

    });

    $(".comprar").on('click', function(){

        var id = $(this).attr('data-value').split(',')[0];
        var nombre = $(this).attr('data-value').split(',')[1];
        var precio = $(this).attr('data-value').split(',')[2];

        if( id === null || id === '' ){

            $("#comprar").attr('disabled', true);

            Swal.fire({

                icon: 'error',
                title: 'Error de lectura',
                allowOutsideClick: false,
                showConfirmButton: true,

            });

            $("#comprar").attr('disabled', true);

        }else{

            $("#nombreComprar").val( nombre );
            $("#precioComprar").val( precio );
            $("#idProductoComprar").val( id );

            $("#comprar").attr('disabled', false);

        }
        
    });

    $(".vender").on('click', function(){

        var id = $(this).attr('data-value').split(',')[0];
        var nombre = $(this).attr('data-value').split(',')[1];
        var precio = $(this).attr('data-value').split(',')[2];

        if( id === null || id === '' ){

            $("#vender").attr('disabled', true);

            Swal.fire({

                icon: 'error',
                title: 'Error de lectura',
                allowOutsideClick: false,
                showConfirmButton: true,

            });

            $("#vender").attr('disabled', true);

        }else{

            $("#nombreVender").val( nombre );
            $("#precioVender").val( precio );
            $("#idProductoVender").val( id );

            $("#vender").attr('disabled', false);

        }
        
    });

});