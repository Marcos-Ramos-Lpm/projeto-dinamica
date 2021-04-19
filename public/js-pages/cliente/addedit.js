$(document).ready(function() {
    $('.addedit').on('click', function(e) {
        var codigo = $('input[name="cliente_id"]').val();
        var token = $('input[name="_token"]').val();
        bootbox.confirm({
            buttons: {
                confirm: {
                    label: 'Sim <i class="fa fa-check text-success"></i>',
                    className: 'btn btn-sm btn-secondary'
                },
                cancel: {
                    label: 'Não <i class="fa fa-times text-danger"></i>',
                    className: 'btn btn-sm btn-secondary'
                }
            },
            message: 'Confirma o registro desse serviço?',
            centerVertical: true,
            callback: function(result) {
                $('#addedit-formulario').submit();
                if (result) {
                    $.ajax({
                        dataType: 'json',
                        url: '/cliente/addedit/' + codigo,
                        type: 'post',
                        data: { _token: token },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {

                        },
                        complete: function() {

                        },
                        success: function(data) {
                            if (data.erro == 0) {
                                Main.alert({
                                    type: 'danger',
                                    message: 'Ocorreu um erro inesperado ao adicionar o cliente.',
                                    icon: 'fa fa-times',
                                    closeInSeconds: 3
                                });
                            } else {
                                Main.alert({
                                    type: 'danger',
                                    message: 'Ocorreu um erro inesperado ao adicionar um novo cliente.',
                                    icon: 'fa fa-times',
                                    closeInSeconds: 3
                                });
                            }
                        },
                        error: function() {
                            Main.alert({
                                type: 'danger',
                                message: 'Ocorreu um erro inesperado ao adicionar um novo cliente.',
                                icon: 'fa fa-times',
                                closeInSeconds: 3
                            });
                        }
                    });
                }
            }
        });

    });

});