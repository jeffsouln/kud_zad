<?php
// koristi instancu klase iz index.php koja je tamo i konektovana na bazu 
require_once 'index.php';

//upit izlistava u primitivnoj tabeli zapise iz baze kojima se polje `email` zavrsava sa ".org"
$rez = $db->query("SELECT * FROM `user` WHERE `email` LIKE '%.org'");
while ($rw = $db->fetch($rez)) {
		echo "<div style = 'border: 1px solid black; margin: 2px;'>" . $rw['email'] . " </div>";
}
