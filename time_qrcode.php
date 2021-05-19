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

if (isset($_GET['Category_id'])) {
	$Category_id = $_GET['Category_id'];
}
if (isset($_GET['direction'])) {
	$direction = $_GET['direction'];
}

$sql = "SELECT * FROM `time` WHERE Category_id=".$Category_id;

$time_detail = $db->get_all($sql,$params);

// echo "<pre>";
// print_r($restaurant_img);
// echo "</pre>";

include "./template/time_qrcode.html";

?>