$(document).ready(function() {
    Venda.btnAdicionar();
});

var Venda = function() {
    return {

        btnAdicionar: function() {
            $('#adiciona-itens-ao-carrinho').on('click', function() {
                $produto = $('select[name="produto"]').val();
                if ($produto) {
                    Venda.adicionarItemVenda();
                } else {
                    Main.alert({
                        container: '#adicionar-venda',
                        type: 'warning',
                        icon: 'fa fa-times',
                        message: 'Atenção, informe um produto para adicionar',
                        closeInSeconds: 3
                    });
                }

            });


        },
        adicionarItemVenda: function() {
            var tr = $('#lista tr:last').data('item') ? $('#lista tr:last').data('item') : 0;
            var cont = tr + 1;


            var produto = $('#produto :selected').text();
            var produto = $('#produto').val();

            Venda.getProduto(produto, cont);
        },
        removerItemVenda: function(tr) {
            $("#lista tr[data-item=" + tr + "]").remove();
            $("#lista tr").each(function(i, item) {
                i++;
                $(item).attr(`data-item`, i);
                $(item).children().children().attr('data-tr', i).attr('onclick', `Venda.removerItemVenda(${i})`);
                $(item.firstChild).text(i);
            });
        },
        btnRemover: function(item) {
            let btn = `<button type=\"button\" data-tr="${item}" onclick=\"Venda.removerItemVenda(${item})\" class=\"btn btn-xs btn-warning\"><i class=\"fas fa-trash-alt\"></i></button>`;
            return btn;
        },
        getProduto: function(codigo, cont) {
            $.ajax({
                dataType: 'json',
                url: 'venda',
                data: { codigo: codigo },
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data) {
                        var html = '';
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr data-item=' + cont + '>';
                            html += '<td>' + cont + '</td>';
                            html += '<td>' + data[i].produto + '</td>';
                            html += '<td><input type="number" name="qtdProduto" min="1" value="1" onchange="Venda.calcularValor(' + cont + ',' + data[i].valor_produto + ')"/></td>';
                            html += '<td>' + data[i].valor_produto + '</td>';
                            html += '<td><label id="valor">R$:' + data[i].valor_produto + '</label></td>';
                            html += '<td></td>';
                            html += '</tr>';

                            $('#lista').append(html);

                        }
                    }
                },
            });
        },
        calcularValor: function(cont, valor) {
            var qtd = $('input[name="qtdProduto"]').val();

            var valor = parseFloat(valor) * qtd;
            alert(cont);


            $('input[name="valortotal"]').val(valor);
            $('input[name="valor-pagar"]').val(valor);

        },

    }
}();