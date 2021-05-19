<?php

	/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
	 * ログイン画面
	 * 
	 * @author Vuongnb
	 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
	
	// $_SESSION["login_id"] = NULL;
	// ini_set("display_errors",1);
	/* ログインセッション情報の初期化 */
	if(!$_SESSION["login_id"]){
		auth_login();	
	}
	/* ログインパスワード情報の送信 */
	$vw->parts( "error_info", $error_info );
	// $vw->parts( "username", htmlspecialchars( $_POST["username"] ) );
	// $vw->parts( "password", htmlspecialchars( $_POST["password"] ) );

	if($_SESSION["login_id"] ){
		echo "<script>window.location.href='./';</script>";
    	exit;
	}
	$vw->show("./template/login.html");
	function auth_login(){
	
	global $sys;
	global $db;
	global $vw;
	global $error_info;
	
	$_SESSION["login_id"] = NULL;
	
	//入力チェック(POSTのときのみ実行)
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if( $_REQUEST["username"] == "" ){ $error_info = "ユーザ名を入力してください"; return false; }
		if( $_REQUEST["password"] == "" ){ $error_info = "パスワードを入力してください"; return false; }
		// echo $error_info;
			//一般ユーザを照会
			$params = [];
			$sql = 'SELECT * FROM user WHERE username="'.$_REQUEST["username"].'"AND password="'.$_REQUEST["password"].'"' ;
			if( $rec_user_info = $db->get_one($sql, $params) ){
				$params = null;
				$_SESSION["login_id"] = $rec_user_info["username"];
				$_SESSION['role'] = $rec_user_info['role'];
				$_SESSION['ID_Mater'] = $rec_user_info['ID_Mater'];
				$_SESSION['Email'] = $rec_user_info['Email'];
				return true;
			}else{
				$error_info = "ユーザ名、パスワードが間違っています。";
				return false;
			}
	}
	return false;
	
}

?>
