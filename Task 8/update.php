<?php
// koristi instancu klase iz index.php koja je tamo i konektovana na bazu 
require_once 'index.php';

//upit menja polje fullname 
 $db->query("UPDATE `user` SET `fullname`='Dusan Duki Jevtic' WHERE `fullname` = 'Dusan Jevtic'");