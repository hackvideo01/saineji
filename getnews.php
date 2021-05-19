<?
include("./include/base/conf.php");
// ini_set("display_errors",1);
/* データベースクラス */
$db = new MySQLDatabase();

/* テンプレート表示クラス */
$vw = new utl_view();

/* 汎用関数クラス */
$sys = new utl_system();

$id = $_REQUEST["id"];

if ($_REQUEST["id"]) {
	// echo '<script>alert("OK");</script>';
	get_news();
}

function get_news(){

		global $db;
		global $id;
		$params = [];
		$news = [];

		$sql = "SELECT * FROM `news` WHERE ID =".$id;

		$getnews = $db->get_all($sql, $params);
		// print_r($shinkansen);
		
		foreach ($getnews as $key => $value) {

			if ($getnews!="") {
				$tmpjson = [
					"qr" => $value['QR']
				];	
			}
				
			array_push($news, $tmpjson);
		}

		$json = json_encode($news);
		echo $json;
	}

// echo "<pre>";
// print_r($restaurant_img);
// echo "</pre>";

?>