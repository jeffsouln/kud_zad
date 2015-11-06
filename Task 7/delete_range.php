<?php
require_once "includes/DB.php";
require_once "includes/Form.class.php";

//instancira klasu form i poziva metod delete_range
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$form = new Form;
	$id = $_GET['id'];
	if (isset($_GET['del_met_id'])) {
		$del_met_id = $_GET['del_met_id'];
		$form->delete_last_range($id,$del_met_id);
	} else {
		$form->delete_range($id);
	}
}