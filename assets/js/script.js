$(document).ready(function() {

	//Multiplica a quantidade e o preço do produto em saída
	$('#quant').on('keyup', function() {
		var quant = $('#quant').val();
		var value = $('#form_exit').find( "input[name='value']" ).val();
		//substitui a vírgula por ponto para fazer a multiplicação
		value = value.replace(',', '.');

		var result = quant * value;
		
		//Retorna o valor total para o campo
		$('#result').val(result);
		//Substitui o ponto pela vírgula
		$('#result').each(function(){ 
			var newresul = $(this).val().replace('.', ',');
			$(this).val(newresul);
		});
	});

	//Multiplica a quantidade e o preço do produto em entrada
	$('#quant,#value').on('keyup', function() {
		var quant = $('#quant').val();
		var value = $('#value').val();

		//substitui a vírgula por ponto para fazer a multiplicação
		value = value.replace(',', '.');

		var result = quant * value;

		//Retorna o valor total para o campo
		$('#result').val(result);
		//Substitui o ponto pela vírgula
		$('#result').each(function(){ 
			var newresul = $(this).val().replace('.', ',');
			$(this).val(newresul);
		});
	});
});