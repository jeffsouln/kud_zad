<?php

//Klasaa form sadrzi sve metode za CRUD podataka iz forme
// metode get_model()                     povlaci podatke o metodama kompanije
//		  get_ranges()                    povlaci vrednosti sve "ranges" po id-u delivery method-a
//		  get_options()                   povlaci vrednosti "options" po id-u delivery method-a
//		  update_fixed_price()            menja vrednosti u bazi polja "fixed_price" po id-u delivery method-a
//		  update_options()                unosi sve vrednosti u tabelu "options" id-u delivery method-a
//		  insert_range()                  unosi sve vrednosti u tabelu "ranges" id-u delivery method-a
//		  update_range()                  menja vrednosti u bazi svih polja u tabeli "ranges" po id-u delivery method-a
//		  delete_ranges()                 brise redi iz tabele "ranges" po id-u delivery method-a
//   

class Form {

//povlaci podatke o metodama kompanije
	public function get_model($company){
		$db = DB::getInstance();
		$st = $db->prepare("SELECT * FROM `delivery_methods` WHERE `company` = :company");
		$st->bindParam(':company', $company);
		$st->setFetchMode(PDO::FETCH_ASSOC);
		$st->execute();
		while ($rw = $st->fetch()) {
			$res[] = $rw;
		}
		echo json_encode($res);
	}

//povlaci vrednosti sve "ranges" po id-u delivery method-a
	public function get_ranges($id){
		$db = DB::getInstance();
		$st = $db->prepare("SELECT `range_id`, `from`, `to`, `price` FROM `ranges` WHERE `delivery_method` = :id");
		$st->bindParam(':id', $id);
		$st->setFetchMode(PDO::FETCH_ASSOC);
		$st->execute();
		while ($rw = $st->fetch()) {
			$res[] = $rw;
		}
		echo json_encode($res);
	}

//povlaci vrednosti "options" po id-u delivery method-a
	public function get_options($id){
		$db = DB::getInstance();
		$st = $db->prepare("SELECT `delivery_url`, `w_to`, `w_from`, `notes` FROM `options` WHERE `delivery_method` = :id");
		$st->bindParam(':id', $id);
		$st->setFetchMode(PDO::FETCH_ASSOC);
		$st->execute();
		$res = $st->fetch();
		echo json_encode($res);
	}

//menja vrednosti u bazi polja "fixed_price" po id-u delivery method-a
	public function update_fixed_price($id,$price){
		$db = DB::getInstance();
		$st = $db->prepare("UPDATE `delivery_methods` SET `fixed_price`=:price, `range_set`= '0' WHERE `delivery_method_id` = :id");
		$st->bindParam(':price', $price);
		$st->bindParam(':id', $id);
		$st->execute();
	}

//unosi sve vrednosti u tabelu "options" id-u delivery method-a
	public function update_options($id,$url,$w_from,$w_to,$notes){
		$db = DB::getInstance();
		$st = $db->prepare("UPDATE `options` SET `delivery_url`=:url, `w_from`=:w_from, `w_to`=:w_to, `notes`=:notes WHERE `delivery_method` = :id");
		$st->bindParam(':url', $url);
		$st->bindParam(':w_from', $w_from);
		$st->bindParam(':w_to', $w_to);
		$st->bindParam(':notes', $notes);
		$st->bindParam(':id', $id);
		$st->execute();
	}

//unosi sve vrednosti u tabelu "ranges" id-u delivery method-a
	public function insert_range($del_met_id,$from,$to,$price){
		$db = DB::getInstance();
		$st = $db->prepare("INSERT INTO `ranges`(`range_id`, `delivery_method`, `from`, `to`, `price`) VALUES ('',:del_met_id,:from_range,:to_range,:price)");
		$st->bindParam(':del_met_id', $del_met_id);
		$st->bindParam(':from_range', $from);
		$st->bindParam(':to_range', $to);
		$st->bindParam(':price', $price);
		$st->execute();

		$st = $db->prepare("UPDATE `delivery_methods` SET `range_set`= '1' WHERE `delivery_method_id` = :id");
		$st->bindParam(':id', $del_met_id);
		$st->execute();
	}

//menja vrednosti u bazi svih polja u tabeli "ranges" po id-u delivery method-a
	public function update_range($id,$from,$to,$price){
		$db = DB::getInstance();
		$st = $db->prepare("UPDATE `ranges` SET `from`=:from_range,`to`=:to,`price`=:price WHERE `range_id`=:id");
		$st->bindParam(':id', $id);
		$st->bindParam(':from_range', $from);
		$st->bindParam(':to', $to);
		$st->bindParam(':price', $price);
		$st->execute();
	}

//brise redi iz tabele "ranges" po id-u delivery method-a
	public function delete_range($id){
		$db = DB::getInstance();
		$st = $db->prepare("DELETE FROM `ranges` WHERE `range_id`=:id");
		$st->bindParam(':id', $id);
		$st->execute();
	}
}