<?
include("./include/base/conf.php");
	// ini_set("display_errors",1);
	/* データベースクラス */
	$db = new MySQLDatabase();

	/* テンプレート表示クラス */
	$vw = new utl_view();

	/* 汎用関数クラス */
	$sys = new utl_system();
	$vw_ctl = $_REQUEST["vw_ctl"];
	$id = $_REQUEST["id"];


	$pl = 1;

	// if eat then load data
	if($vw_ctl=="homestay"){ 
		get_homestay();
	}else if ($vw_ctl=="tour") {
		get_tour();
	}else if ($vw_ctl=="drink") {
		get_nightlife();
	}
	// if($vw_ctl=="" or $vw_ctl ==null or $vw_ctl =="eat"){ 
	// 	get_restaurant();
	// }
	if($vw_ctl =="eat"){ 
		get_restaurant();
	}
	// Function to get the client IP address
	function get_restaurant(){

		global $db;
		global $id;
		$params = [];
		$locations = [];
		$sql = "SELECT * FROM `restaurant` WHERE 1 and Lat!='' and Lng !='' and Category_id=".$id." ";

		$lat_lng = $db->get_all($sql, $params);
		
		foreach ($lat_lng as $key => $value) {
			if($value["delete"]!=1){
				$tmpjson = [
					"lat" => $value["Lat"],
					"lng" => $value['Lng'],
					"id" => $value["ID"],
					"name"=>$value["Name"],
				];	
				array_push($locations, $tmpjson);
			}
		}
		$json = json_encode($locations);
		echo $json;
	}

	function get_nightlife(){

		global $db;
		global $id;
		$params = [];
		$locations = [];
		$sql = "SELECT * FROM `nightlife` WHERE 1 and Lat!='' and Lng !='' and Category_id=".$id;

		$lat_lng = $db->get_all($sql, $params);
		
		foreach ($lat_lng as $key => $value) {
			if($value["delete"]!=1){
				$tmpjson = [
					"lat" => $value["Lat"],
					"lng" => $value['Lng'],
					"id" => $value["ID"],
					"name"=>$value["Name"],
				];	
				array_push($locations, $tmpjson);
			}
		}
		$json = json_encode($locations);
		echo $json;
	}
	
	// Function to get the client IP address
	function get_homestay(){

		global $db;
		$params = [];
		$locations = [];

		$sql = "SELECT * FROM `hotel` WHERE 1 and Lat!='' and Lng !='' ";

		$lat_lng = $db->get_all($sql, $params);
		
		foreach ($lat_lng as $key => $value) {
			if($value["delete"]!=1){
				$tmpjson = [
					"lat" => $value["Lat"],
					"lng" => $value['Lng'],
					"id" => $value["ID"],
					"name"=>$value["Name"],
				];	
				array_push($locations, $tmpjson);
			}
		}
		$json = json_encode($locations);
		echo $json;
	}

	// Function to get the client IP address
	function get_tour(){

		global $db;
		$params = [];
		$locations = [];

		$sql = "SELECT * FROM `tour` WHERE 1 and Lat!='' and Lng !='' ";

		$lat_lng = $db->get_all($sql, $params);
		
		foreach ($lat_lng as $key => $value) {
			if($value["delete"]!=1){
				$tmpjson = [
					"lat" => $value["Lat"],
					"lng" => $value['Lng'],
					"id" => $value["ID"],
					"name"=>$value["Name"],
				];	
				array_push($locations, $tmpjson);
			}
		}
		$json = json_encode($locations);
		echo $json;
	}
?>