<?php
/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * 管理画面インデックスページ
 * 
 * @author Vuongnb
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/

session_start();
//ヘッダ読み込み
include("./include/base/header.php");
//include("./template/header.html");

//ログインチェック
// if( !$_SESSION["login_id"] ){
// 	//非ログイン時
// 	include("./home.php");
// }else{
	//ログイン時

	// include("./connection.php");
	
	//各ページパラメータ
	$cat = htmlspecialchars($_REQUEST['cat']); //メインメニューカテゴリID
	$gid = htmlspecialchars($_REQUEST['gid']); //ページカテゴリID
	if($_SESSION["login_id"] == NULL){
		include("./login.php");
		// return;
	}elseif ($cat==null) {
		include("./menu.php");
	}
	else if($cat){
		//各ページへ
		if($gid){
			// $gid_file = "./" . $gid . ".php";
		}else{
			if($cat==1){
				$gid_file = "./restaurant_management.php";
			}else
			if($cat==2){
				$gid_file = "./restaurant_store.php";
			}else
			if($cat==3){
			//$gid_file = "./success.php";
				// $cat==4;
			}else
			if($cat==4){
				$gid_file = "./login.php";
			}else
			if($cat==5){
				$gid_file = "./hotel_store.php";
			}else
			if($cat==6){
				$gid_file = "./hotel_management.php";
			}else
			if($cat==7){
				$gid_file = "./tour_store.php";
			}else
			if($cat==8){
				$gid_file = "./tour_management.php";
			}else
			if($cat==9){
				$gid_file = "./time_store.php";
			}else
			if($cat==10){
				$gid_file = "./time_management.php";
			}else
			if($cat==11){
				$gid_file = "./nightlife_store.php";
			}else
			if($cat==12){
				$gid_file = "./nightlife_management.php";
			}else
			if($cat==13){
				$gid_file = "./news_store.php";
			}else
			if($cat==14){
				$gid_file = "./news_management.php";
			}
			 
		}
		 include( $gid_file );
	}
 
	
	
// // }

// //フッター読み込み
include("./include/base/footer.php");

?>