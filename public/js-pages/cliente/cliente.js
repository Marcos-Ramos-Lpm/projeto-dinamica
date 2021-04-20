function deletarCliente(codigo) {
    var token = $('input[name="token"]').val();

    bootbox.confirm({
        buttons: {
            confirm: {
                label: 'Sim <i class="fa fa-check"></i>',
                className: 'btn btn-sm btn-success'
            },
            cancel: {
                label: 'Não <i class="fa fa-times"></i>',
                className: 'btn btn-sm btn-danger'
            }
        },
        message: 'Excluir o cadastro desse cliente?',
        centerVertical: true,
        callback: function(result) {
            if (result) {
                $.ajax({
                    dataType: 'json',
                    url: 'cliente/delete/' + codigo,
                    data: { codigo: codigo, _token: token },
                    type: 'DELETE',
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
                                type: 'success',
                                icon: 'fa fa-check',
                                message: 'Excluido com sucesso',
                                closeInSeconds: 3
                            });
                            window.location.reload();
                        } else {
                            Main.alert({
                                type: 'danger',
                                icon: 'fa fa-times',
                                message: data.mensagem,
                                closeInSeconds: 3
                            });
                        }
                    },
                    error: function() {
                        Main.alert({
                            type: 'danger',
                            icon: 'fa fa-times',
                            message: 'Ocorreu um erro INESPERADO ao tentar excluir o cadastro!',
                            closeInSeconds: 3
                        });
                    }
                });
            }

        }
    });
}