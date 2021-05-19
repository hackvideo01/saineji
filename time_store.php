<?php
 
	// ini_set("display_errors",1);
	require_once './email.php';
	$send_mail = new sendmail();
	$main_name = "time_store";

	$data_post =[];
	$confirm =0;
	$category = [];
	// check session image

	
	$view_tpl = "./template/".$main_name.".html"; // テンプレート名設定
	$base_url = "?cat=9";         // URLパラメータ設定

	$data_post["ID"] =$_REQUEST["ID"];
	
	$data_post["Flag"] = 1;

	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		 postdata();
	}

	if($_REQUEST['ID']!="time")
	{
		 $data_post = getdataByID();
	}

	// if($_REQUEST['ID']!="time")
	// {
	// 	 $data_post = getdataByID();
	// }
	// save sesion request form 
	// print_r($_SESSION["data"]);
	// html page

	$category = timeCategory();
	// print_r($category);

	$vw->parts( "category", $category );

	$vw->parts( "base_url", $base_url );
	$vw->parts( "data_post", $data_post );
	/**
		* テンプレート表示
	**/
	$vw->show( $view_tpl );

	function timeCategory(){
		global $db;
		// global $categoly;
		$params = [];

		$sql = "SELECT * FROM `category_time` WHERE 1";

		$category = $db->get_all($sql,$params);

		return $category;
		// print_r($categoly);
	}
 
	function postdata(){
		global $ds;
		global $db;
		global $confirm;
		global $vw;
		global $data_post;
		$params =[];
		// check request exits?
		if ($_REQUEST["ID"]=="time"){
			
			// $password = randomPassword();
   // 			$tmpuser = before( $_REQUEST['MemberEmail'],"@");
			// $username = random_username($tmpuser);

			$sqlCategory = "SELECT * FROM `category_time` WHERE id=".$_REQUEST["Category_id"];

			$data_category = $db->get_one($sqlCategory,$params);

			$categoryName = $data_category["Name"];

			$sql = "INSERT INTO `time`(`Category_id`, `Category`, `QR_1`, `QR_2`, `Flag`, `UpdatedBy`, `CreatedBy`, `UpdatedDate`,`CreatedDate`) VALUES ('"
					 .$_REQUEST['Category_id']."','"
					 .$categoryName."','"
					 .$_REQUEST['QR_1']."','"
					 .$_REQUEST['QR_2']."','"
					 .$_REQUEST['Flag']."','"
					 .$_SESSION["login_id"]."','"
					 .$_SESSION["login_id"]."',now(),now())";
					 // echo $sql;
			$lastID = $db->execute_getID($sql,$params);
			// $sql = "INSERT INTO `user`(`ID_Mater`, `username`, `password`,Email, `role`, `role_name`, `comment`, `createddate`) 
			// 	VALUES ($lastID,'".$username."','".$password."','".$_REQUEST['MemberEmail']."',3,'時刻表のユーザ','".$_REQUEST['Name']."',now())";
			// $db->execute( $sql, $params );
			
 		// 	$tmpmail = [];
 		// 	$content= $_REQUEST['Name']."<br>";
 		// 	$content .= date("Y")."年".date("m")."月".date("d")."日  ".date("H")+'7'."時".date("i")."分 <br>";
 		// 	$content.= "時刻表の情報を申し込みました。<br>";
 		// 	$content.= "サイト：".WEB_URL."<br>";
 		// 	$content.= "ログインの情報：<br>";
 		// 	$content.= "&#09;ユーザ：".$username."<br>";
	 	// 	$content.= "&#09;パスワード：".$password."<br>";

 		// 	$tmpmail["content"] = $content;
 		// 	$tmpmail["mail"] = $_REQUEST['MemberEmail'];
			// $send_mail->sendmailto_one($tmpmail);

		 	$confirm = 1;
		 	$vw->parts( "confirm", $confirm );

		}else {
			$sqlCategory = "SELECT * FROM `category_time` WHERE id=".$_REQUEST['Category_id'];

			$data_category = $db->get_one($sqlCategory,$params);

			$categoryName = $data_category["Name"];

			$sql = "update  `time` SET ".
				   "
				   	Category_id='".$_REQUEST['Category_id']."',
				    Category='".$categoryName."',
					QR_1= '"  .$_REQUEST['QR_1']."',
					QR_2= '" .$_REQUEST['QR_2']."',
					Flag= '" .$_REQUEST['Flag']."',
					UpdatedBy= '" .$_SESSION["login_id"]."',
					UpdatedDate= now()  WHERE ID = ".$_REQUEST["ID"];

			$lastID = $db->execute($sql,$params);

 			// get user data
 		// 	$sql = "SELECT * FROM `user` where ID_Mater=".$_REQUEST["ID"];
			// $rec_user = $db->get_one($sql,$params);
 			// if($_SESSION['role'] ==1){
 			// 	$content= $_REQUEST['Name']."<br>";
	 		// 	$content .= date("Y")."年".date("m")."月".date("d")."日  ".date("H")+'7'."時".date("i")."分 <br>";
	 		// 	$content.= "時刻表の情報を編集出来ました。<br>";
	 		// 	$content.= "サイト：".WEB_URL."<br>";
	 		// 	if($rec_user!=null){
	 		// 		$content.= "ログインの情報：<br>";
		 	// 		$content.= "&#09;ユーザ：".$rec_user["username"]."<br>";
	 		// 		$content.= "&#09;パスワード：".$rec_user["password"]."<br>";	
	 		// 	}
	 		// 	$tmpmail["content"] = $content;
	 		// 	$tmpmail["mail"] = $_REQUEST['MemberEmail'];
				// $send_mail->sendmailto_one($tmpmail);
 			// }
		 	$confirm = 1;
		 	$vw->parts( "confirm", $confirm );
		}
	}

	function getdataByID(){
		global $ds;
		global $db;
		global $data_image;
		global $vw;
		$params =[];
		$sql = "SELECT * FROM `time` where ID=".$_REQUEST["ID"];
		$data_post = $db->get_one($sql,$params);
		// $sql = "SELECT * FROM `upload_file` WHERE ID_Mater=".$_REQUEST["ID"];
		// $rec_img = $db->get_all($sql, $params);
		// if(count($rec_img)>0){
			
		// 	$data_post["userImageCount"] =count($rec_img);
		// 	$_SESSION["data_image"] = $rec_img;
		// 	$data_post["data_image"] = $rec_img;
		// }
		return $data_post ;
		
	}
	
	// random password
	 function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	}

	function checkusername ($newname)
    {
		global $db;
	 
		$params =[];
		
		$sql = "SELECT * FROM `user` where username='".$newname."'";
		$data_post = $db->get_one($sql,$params);
		return $data_post;
    }
    // random create username
	function random_username($username) {
		$newname =  $username.mt_rand(0,1000);
		while (checkusername($newname)==null) {
			return  $newname;
		}
	}
	// get user from email 
	function before ($inthat,$str )
    {
        return substr($inthat, 0, strpos($inthat, $str));
    }
?>
