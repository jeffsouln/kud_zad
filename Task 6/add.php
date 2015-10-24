<?php 
require_once('includes/DB.php');
require_once('includes/functions.php');

//ukoliko su prosledjenji podatci metodom POST dobavlja se instanca klase NewsLetter i poziva metoda save() za upis podatak u bazu
if (isset($_POST)){
	$email = NewsLetter::getInstance();
	$email->address = $_POST['tb_address'];
	$email->content = $_POST['ta_content'];
	$email->save();
}