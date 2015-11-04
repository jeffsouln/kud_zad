<?php
require_once "includes/DB.php";
require_once "includes/Form.class.php";

if (isset($_POST)) {
	$form = new Form;
}
foreach ($_POST as $delivery_method) {
	foreach ($delivery_method as $delivery_method_id => $value) {

	//provara koja polja sadrzi promenljiva _POST i u zavisnosti pozivaju se metode instance klase form
	//validacija polja pre poziva metoda
		if (array_key_exists('fixed_price', $value) && (is_numeric($value['fixed_price']) || is_null($value['fixed_price']))) {
			$form->update_fixed_price($delivery_method_id,$value['fixed_price']);
		}
	
		if (array_key_exists('url', $value)) {
			$url = filter_var($value['url'], FILTER_SANITIZE_URL);
			if (filter_var($url, FILTER_VALIDATE_URL) && (is_numeric($value['w_from']) || is_null($value['w_from'])) && (is_numeric($value['w_to']) || is_null($value['w_to']))){
				$form->update_options($delivery_method_id,$url,$value['w_from'],$value['w_to'],$value['notes']);
			}
		}
	
		if (array_key_exists('range', $value)) {
			foreach ($value['range'] as $range_id => $range_data) {
				if ((is_numeric($range_data['from']) || is_null($range_data['from'])) && (is_numeric($range_data['to']) || is_null($range_data['to'])) && (is_numeric($range_data['price']) || is_null($range_data['price']))) {
					if (is_numeric($range_id)) {
						$form->update_range($range_id, $range_data['from'], $range_data['to'], $range_data['price']);			
					}	else {
						$form->insert_range($delivery_method_id, $range_data['from'], $range_data['to'], $range_data['price']);
					}	
				}	
			
			}
		}
	}
}

