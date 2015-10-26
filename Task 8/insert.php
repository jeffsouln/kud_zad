<?php
// koristi instancu klase iz index.php koja je tamo i konektovana na bazu 
require_once 'index.php';

//upis novog rekorda
 $db->query("INSERT INTO `user` VALUES (NULL,'Dusan Jevtic','dusan.jevtic@mij.rs','Serbia')");
