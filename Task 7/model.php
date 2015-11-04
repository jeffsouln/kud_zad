<?php
require_once "includes/DB.php";
require_once "includes/Form.class.php";

$company = 1;						//za potrebe primera u produkciji bi se ova promenljiva dobijala iz sesije

$form = new Form;
$form->get_model($company);