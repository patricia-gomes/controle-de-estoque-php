<?php
class exitController extends Controller {

	public function index() {
		$model = new Model();
		$helper = new Helper();
		$product = new Products();

		$all_dados = $model->Select_All('exits');
		$itens_total = $model->rowCount('exits');
		$quant_total = $helper->sum_quant_total($all_dados, 'quant_exit');
		$value_total = $product->select_one_col('exits', 'value_total');
		//Retorna o valor total de todas as entradas
		$value_total = $helper->sum_value_total($value_total);

		$dados['name_title'] = "Exit | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['all_dados'] = $all_dados;
		$dados['itens_total'] = $itens_total;
		$dados['quant_total'] = $quant_total;
		$dados['value_total'] = $value_total;


		$this->load_template('exit', $dados);
	}

	public function insert() {
		$model = new Model;
		$helper = new Helper();

		if(!empty($_POST['id'])) {
			$data_product = $model->Select_With_Where('entry', array('id'=>$_POST['id']));
		}

		$dados['name_title'] = "Exit Form | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['data_product'] = $data_product;

		$this->load_template('exit_form', $dados);
	}

	public function register() {
		$model = new Model;

		if(!empty($_POST['id_entry']) && !empty($_POST['quant']) && !empty($_POST['name']) && !empty($_POST['value']) && !empty($_POST['value_total'])) {

			$value_product = str_replace(',', '.', $_POST['value']);
			$value_total = str_replace(',', '.', $_POST['value_total']);
			date_default_timezone_set('America/Porto_Velho');

			//Busca o id do produto na tabela products pelo nome
			$info_product = $model->Select_With_Where('products', array('name'=>$_POST['name']));
			foreach ($info_product as $value) {
				$id_product = $value;
			}
			//Insere na tabela exits
			$model->Insert('exits', array('name_product'=> $_POST['name'], 'value_product'=> $value_product, 'quant_exit'=> $_POST['quant'], 'id_entry'=> $_POST['id_entry'], 'value_total'=> $value_total, 'id_product'=> $id_product['id'], 'date_exit'=> date("Y-m-d H:i:s")));
			$this->change_records_entry();
			header('Location: '.BASE_URL.'/exit');
		}
	}

	//Altera os registros de Entry para atualizar
	public function change_records_entry() {
		$entry = new Entry();
		$model = new Model();
		$product = new Products();

		//Pega o id máximo da tabela Exits
		if($entry->IdMax()) {
			$last_id_exits = $entry->IdMax();
		} else { $last_id_exits = NULL; }
		
		/*Pega todos os dados das tabelas: exits e entry com base no "último ID" */
		if(!is_null($last_id_exits)) { 
			$info_exits  = $model->Select_With_Where('exits', array('id'=>$last_id_exits));
			$info_entry = $entry->selectSpecificDadosEntry($info_exits);
		}
		//--Antes de subtrair verifica se os dados que precisa não estão vazios
		if(!empty($info_entry) && !empty($info_exits)) {
			$all_ids_entry = $product->select_one_col('entry', 'id');
			$quant_entry = $product->select_one_col('entry', 'quant_product');

			//Retorna o resultado da quantidade de um produto
			$update_result_quant_product = $entry->SubtractQuantInt($info_entry['quant_product'], $info_exits[0]['quant_exit']);

			//Retorna o resultado do valor total de um produto
			$update_result_value_total_prduct = $entry->SubtractValueMoney($info_entry['value_total'], $info_exits[0]['value_total']);

			//-Update na coluna quant_product da tabela entry
			$model->Update_With_Where('entry',			
				array('quant_product'=> $update_result_quant_product),
				array('id'=> $info_entry['id']));

			//Atualizando o valor total de um produto
			$model->Update_With_Where('entry',
				array('value_total'=> $update_result_value_total_prduct),
				array('id'=> $info_entry['id']));

			/*Remove o registro que a subtração retornou zero da tabela entry */
			if(!empty($update_result_quant_product)) {
				if($update_result_quant_product == 0) {
					$model->Delete_With_Where('entry', array('id'=> $info_entry['id']));
				}
			}
		}
	}
}