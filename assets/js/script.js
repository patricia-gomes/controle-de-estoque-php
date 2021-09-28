var quant = document.querySelector('#quant')
var value = document.querySelector('#value')

//Chama a funçao de multiplicar
document.onkeyup = multiply;

function multiply() {
	//Faz a conta de multiplicaçao e substitui a virgula pelo ponto
	let result = parseInt(quant.value) * value.value.replace(',', '.');

	//Exibe o valor total formatado para o padrao monetario brasileiro sem o cifrao
	document.querySelector('#result').value = result.toLocaleString('pt-BR', { minimumFractionDigits: 2});
}