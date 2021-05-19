<?
include("./include/base/conf.php");
// ini_set("display_errors",1);
/* データベースクラス */
$db = new MySQLDatabase();

/* テンプレート表示クラス */
$vw = new utl_view();

/* 汎用関数クラス */
$sys = new utl_system();

$params = [];

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

$sql = "SELECT * FROM `hotel` WHERE id=".$id;

$hotel_detail = $db->get_all($sql,$params);

// print_r($restaurant_detail);

$sql1 = "SELECT * FROM `upload_file` WHERE 1  and Type=2 and ID_Mater=".$id;


$hotel_img = $db->get_all($sql1,$params);

// echo "<pre>";
// print_r($restaurant_img);
// echo "</pre>";

include "./template/hotel_modal.html";

?>