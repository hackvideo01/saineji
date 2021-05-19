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

$sql = "SELECT * FROM `news` WHERE ID=".$id;

$news_detail = $db->get_all($sql,$params);

// echo "<pre>";
// print_r($restaurant_img);
// echo "</pre>";

include "./template/news_qrcode.html";

?>