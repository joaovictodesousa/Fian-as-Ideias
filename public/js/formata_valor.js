var numerosInput = document.getElementById("valor");

numerosInput.addEventListener("input", function () {
    // Chamando a função formatarValor() sempre que houver uma entrada
    formatarValor();

    // Limitando o número de caracteres no campo de valor
    if (numerosInput.value.length > 11) {
        numerosInput.value = numerosInput.value.slice(0, 11);
    }
});

function formatarValor() {
    // Obtém o valor digitado no input
    let valor = document.getElementById('valor').value;

    // Remove todos os caracteres não numéricos (exceto ponto decimal, se houver)
    valor = valor.replace(/\D/g, '');

    // Formata o valor como dinheiro (adicionando ponto decimal e vírgula)
    valor = (parseFloat(valor) / 100).toFixed(2).replace('.', ',');

    // Atualiza o valor formatado no input
    document.getElementById('valor').value = valor;
}