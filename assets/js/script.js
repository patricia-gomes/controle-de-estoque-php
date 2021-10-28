var quant = document.querySelector('#quant')
var value = document.querySelector('#value')

//Chama a funçao de multiplicar
document.onkeyup = multiply;

function multiply() { 

	/*Faz a conta de multiplicaçao e substitui a virgula pelo ponto e nao permite carecteres de letras ou especial */
	let result = parseInt(quant.value) * value.value.replace(',', '.');

	//Exibe o valor total formatado para o padrao monetario brasileiro sem o cifrao
	document.querySelector('#result').value = result.toLocaleString('pt-BR', { minimumFractionDigits: 2});
}

const masks = {
	cnpj(valueCnpj) {
		return valueCnpj
		.replace(/\D/g, '')//Substitui qualqquer carectere que nao seja numero por uma string vazia
		.replace(/(\d{2})(\d)/, '$1.$2')//Quando o terceiro numero for digitado adiciona antes um ponto
		.replace(/(\d{3})(\d)/, '$1.$2')
		.replace(/(\d{3})(\d)/, '$1/$2')/*No quarto digito substitui por uma barra */
		.replace(/(\d{4})(\d)/, '$1-$2')/*No quinto digito inseri um traço*/
	},

	cel(valueCel) {
		return valueCel
			.replace(/\D/g, '')
			.replace(/(\d{2})(\d)/, '($1) $2')/*Coloca um parentese entre o primeiro e o segundo numero */
			.replace(/(\d{5})(\d)/, '$1-$2')/*No sexto digito inseri um traço*/
	}
}
//Percorre todos os elementos input do meu form
document.querySelectorAll('input').forEach(($input) => {
	const field = $input.dataset.input

	//Captura o valor dos input e envia para a funçao masks
	$input.addEventListener('input', (e) => {
		e.target.value = masks[field](e.target.value)
	}, false)
})
