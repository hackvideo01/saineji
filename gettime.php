<?
include("./include/base/conf.php");
// ini_set("display_errors",1);
/* データベースクラス */
$db = new MySQLDatabase();

/* テンプレート表示クラス */
$vw = new utl_view();

/* 汎用関数クラス */
$sys = new utl_system();

$name = $_REQUEST["name"];

$direction = $_REQUEST["direction"];

if ($name=="shinkansen") {
	get_shinkansen();
}

if ($name=="itosen") {
	get_itosen();
}

if ($name=="JR") {
	get_JR();
}

if ($name=="bus") {
	get_bus();
}


function get_shinkansen(){

		global $db;
		global $direction;
		$params = [];
		$time = [];
		$sql = "SELECT * FROM `time` WHERE Category_id = 1";

		$gettime = $db->get_all($sql, $params);
		// print_r($shinkansen);
		
		foreach ($gettime as $key => $value) {

			if ($gettime!="") {
				$tmpjson = [
					"category_id" => $value['Category_id'],
				];	
			}
				
			array_push($time, $tmpjson);
		}

		$json = json_encode($time);
		echo $json;
	}

// echo "<pre>";
// print_r($restaurant_img);
// echo "</pre>";

function get_itosen(){

		global $db;
		global $direction;
		$params = [];
		$time = [];
		$sql = "SELECT * FROM `time` WHERE Category_id = 2";

		$gettime = $db->get_all($sql, $params);
		// print_r($shinkansen);
		
		foreach ($gettime as $key => $value) {

			if ($gettime!="") {
				$tmpjson = [
					"category_id" => $value['Category_id'],
				];	
			}
				
			array_push($time, $tmpjson);
		}

		$json = json_encode($time);
		echo $json;
	}

	function get_JR(){

		global $db;
		global $direction;
		$params = [];
		$time = [];
		$sql = "SELECT * FROM `time` WHERE Category_id = 3";

		$gettime = $db->get_all($sql, $params);
		// print_r($shinkansen);
		
		foreach ($gettime as $key => $value) {

			if ($gettime!="") {
				$tmpjson = [
					"category_id" => $value['Category_id'],
				];	
			}
				
			array_push($time, $tmpjson);
		}

		$json = json_encode($time);
		echo $json;
	}

	function get_bus(){

		global $db;
		global $direction;
		$params = [];
		$time = [];
		$sql = "SELECT * FROM `time` WHERE Category_id = 4";

		$gettime = $db->get_all($sql, $params);
		// print_r($shinkansen);
		
		foreach ($gettime as $key => $value) {

			if ($gettime!="") {
				$tmpjson = [
					"category_id" => $value['Category_id'],
				];	
			}
				
			array_push($time, $tmpjson);
		}

		$json = json_encode($time);
		echo $json;
	}
?>