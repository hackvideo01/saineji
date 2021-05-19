<?php
include("./include/base/conf.php");
// ini_set("display_errors",1);
/* データベースクラス */
$db = new MySQLDatabase();

/* テンプレート表示クラス */
$vw = new utl_view();

/* 汎用関数クラス */
$sys = new utl_system();

/* セッションスタート */
session_start();

// $error_info = Array();

// // echo "header(string)";

// echo $_SESSION["login_id"];
// /* ログイン認証 */
// if(!$_SESSION["login_id"]) auth_login();

// /* コンテントタイプをutf-8で出力 */
// header("Content-type: text/html; charset=utf-8");

// if( $_SESSION["login_id"] && $_REQUEST['gid']!="login"  ){
// 	//ヘッダーを出力
	$vw -> show( "./template/inc/header.html" );
// 	//メニューを出力
// 	$vw -> parts( "LOGIN_NAME", $_SESSION[loginuser] );
// 	$vw -> parts( "LOGIN_PERM", $_SESSION[loginperm] );
// 	$vw -> parts( "SITE_ROOT", SITE_ROOT );
// 	$vw -> show( "./template/inc/menu.html" );
// }else{
// 	//ログイン画面へ　セッション初期化
// 	$_SESSION["login_id"] = NULL;
// 	$_SESSION["login_user"] = NULL;
// 	$_SESSION["mst_id"] = NULL;
// }

// /*------------------*/
// /* ログイン認証処理 */
// /*------------------*/
// function auth_login(){
	
// 	global $sys;
// 	global $db;
// 	global $vw;
// 	global $error_info;
	
// 	$_SESSION["login_id"] = NULL;
// 	$_SESSION["login_user"] = NULL;
	
// 	//入力チェック(POSTのときのみ実行)
// 	if ($_POST["login"]){

// 		if( $_REQUEST["account"] == "" ){ $error_info = "ユーザ名を入力してください"; return false; }
// 		if( $_REQUEST["password"] == "" ){ $error_info = "パスワードを入力してください"; return false; }
		
// 		//マスタユーザーの照会
// 		if($_REQUEST["account"]=="gadmin" && $_REQUEST["password"]=="gadmin"){
// 			$_SESSION["mst_id"] = "1";
			
// 		}else{
		
// 			//一般ユーザを照会
// 			$sql = "SELECT * FROM t_user WHERE user_name=? AND password=?";
// 			$params[] = array( $_REQUEST["account"], PDO::PARAM_STR );
// 			$params[] = array( $_REQUEST["password"], PDO::PARAM_STR );
			
// 			if( $rec_user_info = $db->get_one($sql, $params) ){
				
// 				$params = null;
// 				$_SESSION["login_id"] = $rec_user_info["user_id"];
// 				$_SESSION["login_user"] = $rec_user_info["disp_name"];
				
// 				// ユーザ情報をsessionに入れる
				
// 				// 権限ロールの取得
			
			
				
// 	//			if( $rec["type"] == 1 ){
// 	//				$_SESSION["loginperm"] = "system";
// 	//			}else{
// 	//				$_SESSION["loginperm"] = "web";
// 	//			}
// 				return true;
// 			}else{
// 				$error_info = "ユーザ名、パスワードが間違っています";
// 				return false;
// 			}
// 		}
// 	}
// 	return false;
	
// }

// function error_msg($msg)
// {
// 	echo "ERROR hoiku " . $msg;
// 	exit;
// }
	
// function auth_error()
// {
// 	echo "権限不足";
// 	exit;
// }
?>