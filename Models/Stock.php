<?php
class Stock extends Model {


	public function low_stock($all_entry) {
		if(!empty($all_entry)) {

		    $result = array();
		    foreach($all_entry as $key => $values_quant) {
		    	//Verifica quais os registros são igual ou menor que 5
			    if($values_quant['quant_product'] <= 5) {
		            $result[$key] = $values_quant;
		        }
		    }
		    return  $result;
		}
	}

	public function quant_product_equal_zero($low_stock) {
		$model = new Model();
		foreach ($low_stock as $key => $value) {
			if($value['quant_product'] == 0) {
				$model->Delete_With_Where('entry', array('id'=> $value['id']));
			} else { return false; }
		}
	}

}