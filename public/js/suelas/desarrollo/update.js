jQuery.noConflict();
jQuery(document).ready(function(){

    $("#editar").on('click', function(e){

        e.preventDefault();

        let procesamiento;
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({

            title: 'Actualizando material',
            html: 'Un momento por favor: <b></b>',
            timer: 9975,
            allowOutsideClick: false,
            didOpen: ()=>{

                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                procesamiento = setInterval(()=>{

                    b.textContent = Swal.getTimerLeft();

                }, 100);

                $.ajax({

                    type: 'POST',
                    url: '/suela/desarrollo/actualizar',
                    data:{

                        'material' : $("#materialEditar").val(),
                        'cantidad' : $("#cantidadEditar").val(),
                        'descripcion' : $("#descripcionMaterialEditar").val(),
                        'id' : $("#idMaterialSuela").val(),
                        '_token' : csrfToken,

                    },
                    dataType: 'json',
                    encode: true

                }).done(function(respuesta){

                    if( respuesta.exito ){

                        Swal.fire({

                            icon: 'success',
                            title: 'Material actualizado',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 1999,
                            timerProgressBar: true,

                        }).then((resultado)=>{

                            if( resultado.dismiss == Swal.DismissReason.timer ){

                                window.location.href = '/suela/desarrollo/'+$("#idSuela").val();

                            }

                        });

                    }else{

                        Swal.fire({

                            icon: 'error',
                            title: respuesta.mensaje,
                            allowOutsideClick: false,
                            showConfirmButton: true

                        }).then((resultado)=>{

                            if( resultado.isConfirmed ){

                                window.location.href = '/suela/desarrollo/'+$("#idSuela").val();

                            }

                        });

                    }

                });

            },
            willClose: ()=>{

                clearInterval(procesamiento);

            }

        }).then((resultado)=>{

            if( resultado.dismiss == Swal.DismissReason.timer ){

                Swal.fire({

                    icon: 'warning',
                    title: 'Hubo un inconveniente. Trata de nuevo.',
                    allowOutsideClick: false,
                    showConfirmButton: true

                }).then((resultado)=>{

                    if( resultado.isConfirmed ){

                        window.location.href = '/suela/desarrollo/'+$("#idSuela").val();

                    }

                });

            }

        });

    });
    
});