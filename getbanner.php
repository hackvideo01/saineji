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
	if($vw_ctl=="restaurant"){ 
		get_banner_restaurant();
	}else if ($vw_ctl=="nightlife") {
		get_banner_nightlife();
	} 
	// Function to get the client IP address
	function get_banner_restaurant(){

		global $db;
		global $id;
		$params = [];
		$data = [];
		$todate = date("Y-m-d");
		$sql = "SELECT * FROM `restaurant` WHERE 1 and Flag=1 and FromDay<='".$todate."' and ToDay >='".$todate."'";
		$rec = $db->get_all($sql, $params);
		if(is_countable($rec)){
			foreach ($rec as $key => $value) {
			 $sqlupload = "SELECT * FROM `upload_file` WHERE 1 and Type =5 and ID_Mater=".$value["ID"];
			 $recimg = $db->get_all($sqlupload,$params);
			 if(is_countable($recimg)){
			 	foreach ($recimg as $key1 => $value1) {
			 		$tmpjson = [
						"p" => $value1["UploadPath"],
						"id"=>$value["ID"],
						"name"=>$value["Name"]
					];	
					array_push($data, $tmpjson);
			 	}
			 }
			}
			$json = json_encode($data);
			echo $json;
		}else{
			return;
		}
	}


	function get_banner_nightlife(){
		global $db;
		global $id;
		$params = [];
		$data = [];
		$todate = date("Y-m-d");
		$sql = "SELECT * FROM `nightlife` WHERE 1 and Flag=1 and FromDay<='".$todate."' and ToDay >='".$todate."'";
		$rec = $db->get_all($sql, $params);
		if(is_countable($rec)){
			foreach ($rec as $key => $value) {
				$sqlupload = "SELECT * FROM `upload_file` WHERE 1 and Type =6 and ID_Mater=".$value["ID"];
				$recimg = $db->get_all($sqlupload,$params);
				if(is_countable($recimg)){
					foreach ($recimg as $key1 => $value1) {
						$tmpjson = [
							"p" => $value1["UploadPath"],
							"id"=>$value["ID"],
							"name"=>$value["Name"]
						];	
						array_push($data, $tmpjson);
					}
				}
			}
			$json = json_encode($data);
			echo $json;
		}else{
			return;
		}
	}
?>