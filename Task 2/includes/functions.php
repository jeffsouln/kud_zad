<?php

class Kalendar {										

    private static $_instance = null;
    public static function getInstance()
    {
        if (self::$_instance == null)
        {
            self::$_instance = new Kalendar();
        }
        return self::$_instance;
    }

    public $date;
	public $day;
	public $month;
	public $year;

	public function __construct(){
		$this->date = new DateTime;
		$this->day = $this->date->format('d');
		$this->month = $this->date->format('m');
		$this->year = $this->date->format('Y');
	}

	public function render(){																// metoda koja iscrtava kalendar
		$start = date('w',mktime(0,0,0,$this->month,1,$this->year));						// pozicija prvoj u mesecu koji se crta
		$days_in_month = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);		// broj dana u mesec koji se crta
		$same_week = 7;																		// promenljiva vodi računa o kraju nedelje
		echo "<table>";
		echo "<tr><td>Mesec: </td><th id='month-title'>$this->month</th><td>Godina: </td><th id='year-title'>$this->year</th></tr>";
		echo "<tr><td>Nedlja</td><td>Ponedeljak</td><td>Utorak</td><td>Sreda</td><td>Četvrtak</td><td>Petak</td><td>Subota</td><tr>";
		echo "<tr>";
		for ($i=0; $i < $start ; $i++) { 													// prazna polja pre prvog u mesecu
			echo "<td></td>";
			$same_week--;
		}
		for ($i=1; $i <= $days_in_month ; $i++) { 
			if ($i==$this->date->format('j') && $this->month == $this->date->format('m') && $this->year == $this->date->format('Y')) {
				echo "<td id='today'>$i</td>";               // današnji dan dobija id "today"
			} else {
				echo "<td>$i</td>";
			}	
			$same_week--;									 
			if (!$same_week) {								 // ukoliko je kraj nedelje, novi red
			echo "</tr><tr>";
			$same_week = 7;
			}
		}
		echo "</tr></table>";
	}
}