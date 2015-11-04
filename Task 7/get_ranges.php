<?php
require_once "includes/DB.php";
require_once "includes/Form.class.php";

//instancira klasu form i poziva metod get_ranges() i prosledjuje id delivery method-ee
if (isset($_GET['delivery_method_id']) && is_numeric($_GET['delivery_method_id'])) {
	$form = new Form;
	$id = $_GET['delivery_method_id'];
	$form->get_ranges($id);
}


