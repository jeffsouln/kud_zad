<?php
require_once "includes/DB.php";
require_once "Form.class.php";

//instancira klasu form i poziva metod delete_range
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$form = new Form;
	$id = $_GET['id'];
	$form->delete_range($id);
}