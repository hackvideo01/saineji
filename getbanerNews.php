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

	if($vw_ctl=="news"){ 
		// echo '<script>alert("OK");</script>';
		get_baner_news();
	}

	function get_baner_news(){

		global $db;
		$params = [];
		$data = [];

		$todate = date("Y-m-d");
		$sql = "SELECT * FROM `news` WHERE 1 and FromDay<='".$todate."' and ToDay >='".$todate."'";
		$rec = $db->get_all($sql, $params);
		if(is_countable($rec)){
			foreach ($rec as $key => $value) {
			 $sqlupload = "SELECT * FROM `upload_file` WHERE 1 and Type =7 and ID_Mater=".$value["ID"];
			 $recimg = $db->get_all($sqlupload,$params);
			 if(is_countable($recimg)){
			 	foreach ($recimg as $key => $value) {
			 		$tmpjson = [
						"b" => $value["UploadPath"],
						"id"=> $value["ID_Mater"]
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