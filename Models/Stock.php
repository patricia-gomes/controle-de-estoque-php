<?php
class Stock extends Model {

	//Retorna os produtos com estoque baixo
	public function low_stock() {
		$query = $this->pdo->query("SELECT * FROM entry WHERE quant_product <= 5 LIMIT 5");
		$query->execute();

		if($query->rowCount() > 0) {
			return $query->fetchAll();
		}
	}

	public function quant_product_equal_zero($low_stock) {
		$model = new Model();

		if(!empty($low_stock)) {
			foreach ($low_stock as $value) {
				//Se a quantidade do produto estiver vazio deleta
				if(empty($value['quant_product'])) {
					$model->Delete_With_Where('entry', array('id'=> $value['id']));
				} else { return false; }
			}
		}
	}
	//Retorna os produtos que vão para a lista validade esgotando
	public function validity_running_out($all_entry) {
		$dados = array();
		if(!empty($all_entry)) {
			foreach ($all_entry as $key => $value) {
				/*A classe DateTime para calcular a diferença entre a data de validade e a data atual */
				date_default_timezone_set('America/Porto_Velho');
				//Verifica se o produto tem data de validade
				if(!empty($value['expirion_date'])) {
					$current_date  = new DateTime( date('Y-m-d') );
					$expirion_date = new DateTime($value['expirion_date']);
					//Método diff retorna o intervalo entre a data atual e a da validade
					$interval  = $current_date->diff($expirion_date);

					/*Verifica quais os produtos que falta 7 dias ou menos para vencer a validade */
					if($interval->d <= 7) {
						/*Monta o array com as informaçães que queremos */
						$dados[$key]['name_product'] =  $value['name_product'];
						$dados[$key]['quant_days'] = $interval->d;
						$dados[$key]['expirion_date'] = $value['expirion_date'];
					}
				}
			}
		}
		return $dados;
	}

}