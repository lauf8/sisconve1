var metPag = ["À VISTA", "À PRAZO", "CARTÃO DÉBITO", "CARTÃO CRÉDITO", "CARNÊ"];
var spanTxtMP = document.getElementById("met-pag");
var metodoPagamento = document.getElementById("metodo-pagamento");

metodoPagamento.addEventListener("change", () => {
    spanTxtMP.value = metPag[parseInt(metodoPagamento.value)]
});
 
