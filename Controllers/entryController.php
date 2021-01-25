<?php
class entryController extends Controller {

	public function index() {
		$model = new Model();
		$helper = new Helper();
		$entry = new Entry();
		$product = new Products();
		//--------------------------------------------------
		$all_entry = $model->Select_All('entry');
		
		$quant_total = $helper->sum_quant_total($all_entry, 'quant_product');
		$select_value_total = $product->select_one_col('entry', 'value_total');
		//Retorna o valor total de todas as entradas
		$value_total = $helper->sum_value_total($select_value_total);

		//---Subtrai a quantidade total de entradas com base na saída
		$all_exits = $model->Select_All('exits');
		$quant_exit = $product->select_one_col('exits', 'quant_exit');
		$sum_quant_exit = $helper->sum_quant_total($quant_exit, 'quant_exit');

		//---Subtrai o valor total de entradas com base na saída
		$select_value_total_exit = $product->select_one_col('exits', 'value_total');
		$sum_value_total_exit = $helper->sum_value_total($select_value_total_exit);				
	
		$itens_total = $model->rowCount('entry');

		//---Envia os dados para a view
		$dados['name_title'] = "Entry | Controle de Estoque";
		$dados['helper'] = $helper;
		$dados['all_entry'] = $all_entry;
		$dados['itens_total'] = $itens_total;
		$dados['quant_total'] = $quant_total;
		$dados['value_total'] = $value_total;

		$this->load_template('entry', $dados);
	}
}