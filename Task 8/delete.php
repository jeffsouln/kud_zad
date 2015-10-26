<?php
// koristi instancu klase iz index.php koja je tamo i konektovana na bazu 
require_once 'index.php';              

//brise iz baze sve zapise kojima polje `country` ima vrednost 'china'
 $db->query("DELETE FROM `user` WHERE `country` = 'china'");