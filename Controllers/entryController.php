<?php
class entryController extends Controller {

	public function index() {
		$model = new Model();
		$helper = new Helper();
		$product = new Products();

		$all_entry = $model->Select_All('entry');
		$itens_total = $model->rowCount('entry');
		$col_name_product = 'quant_product';
		
		$quant_total = $helper->sum_quant_total($all_entry, $col_name_product);
		$value_total = $product->sum_value_total('entry', 'value_total');
		//Retorna o valor total de todas as entradas
		$value_total = $helper->sum_value_total($value_total);

		//Envia os dados para a view
		$dados['name_title'] = "Entry | Controle de Estoque";
		$dados['helper'] = $helper;
		$dados['all_entry'] = $all_entry;
		$dados['itens_total'] = $itens_total;
		$dados['quant_total'] = $quant_total;
		$dados['value_total'] = $value_total;

		$this->load_template('entry', $dados);
	}
}