<?php
class entryController extends Controller {

	public function index() {
		$model = new Model();
		$helper = new Helper();
		$entry = new Entry();
		$product = new Products();
		
		//Verificando se fez o login caso contrario redireciona para login
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) { 
			header("Location: ".BASE_URL."/login");
		}
		//--------------------------------------------------------------------------
		$all_entry = $model->Select_All('entry');

		//---Soma o valor total de todas as entradas
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

		//---Retorna as entras que a quantidade é maior que zero
		$select_entry = $entry->select_entry_products();
	
		$itens_total = $model->rowCount('entry');

		//---Envia os dados para a view
		$dados['name_title'] = "Entry | Controle de Estoque";
		$dados['helper'] = $helper;
		$dados['all_entry'] = $select_entry;
		$dados['itens_total'] = $itens_total;
		$dados['quant_total'] = $quant_total;
		$dados['value_total'] = $value_total;

		$this->load_template('entry', $dados);
	}

	public function search() {
		$fetch = new Search_form();
		$helper = new Helper();
		$result = array();

		$search = $_POST['search'];
		//Busca
		$result = $fetch->search('entry', 'name_product', 'name_supplier', $search);
		
		//Envia os dados para a view
		$dados['name_title'] = " | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['result'] = $result;

		$this->load_template('search_entry', $dados);
	}
}