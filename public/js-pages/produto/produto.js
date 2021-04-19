function deletarProduto(codigo) {
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
        message: 'Excluir o cadastro dessa categoria?',
        callback: function(result) {
            if (result) {
                $.ajax({
                    dataType: 'json',
                    url: 'produto/delete/' + codigo,
                    data: { codigo: codigo, _token: token },
                    type: 'DELETE',
                    beforeSend: function() {

                    },
                    complete: function() {

                    },
                    success: function(data) {
                        if (data.erro == 0) {
                            Main.alert({
                                type: 'success',
                                icon: 'fa fa-check',
                                message: 'Produto excluido com sucesso',
                                closeInSeconds: 3
                            });
                            window.location.reload();
                        } else {
                            Main.alert({
                                type: 'danger',
                                icon: 'fa fa-times',
                                message: 'Erro ao excluir este produto',
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