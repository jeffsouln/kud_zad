<?php
// koristimo biblioteku PHP Simple HTML DOM Parser
include "simple_html_dom.php";
$niz = array();
$html = file_get_html($_POST['tb_url']);						//kreira DOM  iy url-a
foreach ($html->find($_POST['tb_item']) as $value) {			//trazi po kriterijumu
 	$niz[] = $value->innertext;									//vraca text uz kriterijum, u daljem razvoju obezbediti korisniku da bira rezultat 
 } 
 echo json_encode($niz);										//salje JSON string


