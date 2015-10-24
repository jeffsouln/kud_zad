<?php
require_once('includes/DB.php');
require_once('includes/functions.php');

$sender = NewsLetter::getInstance();
$sender->send();
