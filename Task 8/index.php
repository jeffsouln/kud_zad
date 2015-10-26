<?php

require_once 'db/mysql.php';

//instancira se klasa Db_Mysql
$db = new Db_Mysql(array(
    'dbname' => 'shift_planning_test',
    'username' => 'root',
    'password' => '',
    'host' => 'localhost'
));

//ostvaruje se konekcija na bazu
$db->connect();









