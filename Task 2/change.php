<?php
require_once 'includes/functions.php';
if (isset($_GET['action'])) { 
	if ($_GET['action'] == "Predhodni mesec"){             //mesec se samjnije za jedan i iscrtava se novi
		$calenadar = Kalendar::getInstance();
    	if ($_GET['month'] > 1) {
    		$calenadar->month = $_GET['month']-1;
    		$calenadar->year = $_GET['year'];
    	} else {
    		$calenadar->month = 12;
    		$calenadar->year = $_GET['year']-1;
    	}
    	$calenadar->render();
    } elseif ($_GET['action'] == "Sledeći mesec") {		   //mesec se povećava za jedan i iscrtava se novi
    	$calenadar = Kalendar::getInstance();
    	if ($_GET['month'] < 12) {
    		$calenadar->month = $_GET['month']+1;
    		$calenadar->year = $_GET['year'];
    	} else {
    		$calenadar->month = 1;
    		$calenadar->year = $_GET['year']+1;
    	}
    	$calenadar->render();
    }
}