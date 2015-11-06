<?php
class Service {
	public function handle(){
		$method = $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			//get request, dobavlja podatke iz baze i vraca JSON. 
			//prednost manje opterecenje baze (jedan upit)
			//mana losa apstrakcija, format JSONa hard kodiran
			case 'GET':
				if (isset($_GET)) {
					$db = DB::getInstance();
					$st = $db->prepare("SELECT data.*, data_from.name AS from_name, data_to.name AS to_name, data_date_sent_formatted.timestamp AS sent_timestamp, data_date_sent_formatted.month AS sent_month, data_date_sent_formatted.day AS sent_day, data_date_sent_formatted.year AS sent_year, data_date_sent_formatted.week AS sent_week, data_date_sent_formatted.dayid AS sent_dayid, data_date_sent_formatted.weekday AS sent_weekday, data_date_sent_formatted.mname AS sent_mname, data_date_sent_formatted.formatted AS sent_formatted,
data_date_read_formatted.timestamp AS read_timestamp, data_date_read_formatted.month  AS read_month, data_date_read_formatted.day  AS read_day, data_date_read_formatted.year  AS read_year, data_date_read_formatted.week  AS read_week, data_date_read_formatted.dayid  AS read_dayid, data_date_read_formatted.weekday  AS read_weekday, data_date_read_formatted.mname  AS read_mname, data_date_read_formatted.formatted  AS read_formatted
										FROM `data` 
										LEFT JOIN `data_from` 
										ON data.from = data_from.id
										LEFT JOIN `data_to`
										ON data.to = data_to.id
										LEFT JOIN `data_date_sent_formatted`
										ON data.date_sent_formatted = data_date_sent_formatted.id
										LEFT JOIN `data_date_read_formatted`
										ON data.date_read_formatted = data_date_read_formatted.id");
					$st->setFetchMode(PDO::FETCH_ASSOC);
					$st->execute();
					while ($rw = $st->fetch()) {
						$res['id'] = $rw['id'];
						$res['from']['id'] = $rw['from'];
						$res['from']['name'] = $rw['from_name'];
						$res['to']['id'] = $rw['to'];
						$res['to']['name'] = $rw['to_name'];
						$res['type']= $rw['type'];
						$res['replyto']= $rw['replyto'];
						$res['date_sent']= $rw['date_sent'];
						$res['date_read']= $rw['date_read'];
						$res['subject']= $rw['subject'];
						$res['message']= $rw['message'];
						$res['message_formatted']= $rw['message_formatted'];
						$res['date_sent_formatted']['id']= $rw['date_sent_formatted'];
						$res['date_sent_formatted']['timestamp']= $rw['sent_timestamp'];
						$res['date_sent_formatted']['month']= $rw['sent_month'];
						$res['date_sent_formatted']['day']= $rw['sent_day'];
						$res['date_sent_formatted']['year']= $rw['sent_year'];
						$res['date_sent_formatted']['week']= $rw['sent_week'];
						$res['date_sent_formatted']['dayid']= $rw['sent_dayid'];
						$res['date_sent_formatted']['weekday']= $rw['sent_weekday'];
						$res['date_sent_formatted']['mname']= $rw['sent_mname'];
						$res['date_sent_formatted']['formatted']= $rw['sent_formatted'];
						if (!empty($rw['date_read_formatted'])) {
							$res['date_read_formatted']['id']= $rw['date_read_formatted'];
						$res['date_read_formatted']['timestamp']= $rw['read_timestamp'];
						$res['date_read_formatted']['month']= $rw['read_month'];
						$res['date_read_formatted']['day']= $rw['read_day'];
						$res['date_read_formatted']['year']= $rw['read_year'];
						$res['date_read_formatted']['week']= $rw['read_week'];
						$res['date_read_formatted']['dayid']= $rw['read_dayid'];
						$res['date_read_formatted']['weekday']= $rw['read_weekday'];
						$res['date_read_formatted']['mname']= $rw['read_mname'];
						$res['date_read_formatted']['formatted']= $rw['read_formatted'];
						} else {
							$res['date_read_formatted'] = [];
						}
						$data['data'][] = $res;
					}
					echo json_encode($data);
				}
				break;

			//osnova za dalju razradu RESTful servisa
			case 'POST':
				echo "post metod";
			break;
			case 'PUT':
				echo "put metod";
				break;
			case 'DELETE':
				echo "delete metod";
			break;
		}
	}
}