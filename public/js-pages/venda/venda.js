$(document).ready(function() {
    Venda.btnAdicionar();
});

var Venda = function() {
    return {
        btnAdicionar: function() {
            $('#adiciona-itens-ao-carrinho').on('click', function() {
                Venda.adicionarItemVenda();
            });
        },
        adicionarItemVenda: function() {
            var tr = $('#lista tr:last').data('item') ? $('#lista tr:last').data('item') : 0;
            var cont = tr + 1;
            var html = '';

            html += `<tr data-item=\"${cont}\">`;
            html += `<td>${cont}</td>`;
            html += `<td>Martelo</td>`;
            html += `<td><input type="number" name="qtdProduto[]" min="1" value="1"/></td>`;
            html += `<td>R$:12,99</td>`;
            html += `<td>R$:24,98</td>`;
            html += `<td>${this.btnRemover(cont)}</td>`;
            html += `</tr>`;

            $('#lista').append(html);
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
    }
}();