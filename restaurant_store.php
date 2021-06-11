<?php
 
	// ini_set("display_errors",1);
	require_once './email.php';
	$send_mail = new sendmail();
	$main_name = "restaurant_store";
	$tbl_name = "restaurant";

	$data_post =[];
	$category = [];
	$confirm =0;
	// check session image
	
	$view_tpl = "./template/".$main_name.".html"; // テンプレート名設定
	$base_url = "?cat=2";         // URLパラメータ設定

	$data_post["ID"] =$_REQUEST["ID"];
	$data_post["Flag"] =1;

	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		 postdata();
	}else{
		$_SESSION["data_image"]= null;
	}
	if($_REQUEST['ID']!="new")
	{
		 $data_post = getdataByID();
	}
	// save sesion request form 
	// print_r($_SESSION["data"]);
	// html page
	$category = eatCategory();
	// print_r($category);

	$vw->parts( "category", $category );

	$vw->parts( "base_url", $base_url );
	$vw->parts( "data_post", $data_post );
	/**
		* テンプレート表示
	**/
	$vw->show( $view_tpl );
	
	function eatCategory(){
		global $db;
		// global $categoly;
		$params = [];

		$sql = "SELECT * FROM `category_restaurant` WHERE 1";

		$category = $db->get_all($sql,$params);

		return $category;
		// print_r($categoly);
	}

 
	function postdata(){
		global $ds;
		global $db;
		global $confirm;
		global $vw;
		global $send_mail;
		global $data_post;
		$data_image =  $_SESSION["data_image"];
		$params =[];
		// check request exits?
		if ($_REQUEST["ID"]=="new"){
			$password = randomPassword();
   			$tmpuser = before( $_REQUEST['MemberEmail'],"@");
			$username = random_username($tmpuser);

			$sqlCategory = "SELECT * FROM `category_restaurant` WHERE id=".$_REQUEST['Category_id']." ";

			$data_category = $db->get_one($sqlCategory,$params);

			$categoryName = $data_category["Name"];

			$sql = "INSERT INTO `restaurant`( `Category_id`, `Category`, `Name`, `Introduce_cm`, `Address`, `Time_work`, `MemberEmail`, `UserName`, `Password`, `Tel`, `Text1`, `Text2`, `Text3`, `Text4`, `Text5`,   `QR_1`, `QR_2`, `Lat`, `Lng`,  `Flag`,FromDay,ToDay, `UpdatedBy`, `CreatedBy`,`UpdatedDate`,  `CreatedDate`)
				 VALUES  ('"
				 	 .$_REQUEST['Category_id']."','"
				 	 .$categoryName."','"
					 .$_REQUEST['Name']."','"
					 .$_REQUEST['Introduce_cm']."','"
					 .$_REQUEST['Address']."','"
					 .$_REQUEST['Time_work']."','"
					 .$_REQUEST['MemberEmail']."','"
					 .$username."','"
					 .$password ."','"
					 .$_REQUEST['Tel']."','"
					 .$_REQUEST['Text1']."','"
					 .$_REQUEST['Text2']."','"
					 .$_REQUEST['Text3']."','"
					 .$_REQUEST['Text4']."','"
					 .$_REQUEST['Text5']."','"
					 .$_REQUEST['QR_1']."','"
					 .$_REQUEST['QR_2']."','"
					 .$_REQUEST['Lat']."','"
					 .$_REQUEST['Lng']."','"
					 .$_REQUEST['Flag']."','"
					 .$_REQUEST['FromDay']."','"
					 .$_REQUEST['ToDay']."','"
					 .$_SESSION["login_id"]."','"
					 .$_SESSION["login_id"]."',now(),now())";
			$lastID = $db->execute_getID($sql,$params);
			$sql = "INSERT INTO `user`(`ID_Mater`, `username`, `password`,Email, `role`, `role_name`, `comment`, `createddate`) 
				VALUES ($lastID,'".$username."','".$password."','".$_REQUEST['MemberEmail']."',2,'お店のユーザ','".$_REQUEST['Name']."',now())";
			$db->execute( $sql, $params );
			$uploads_dir = './upfiles';
			if(is_countable($data_image)>0 && $lastID >0)
		 	{	
		 		// insert file path 
		 		foreach ($data_image as $key => $value) {
		 			$Type = $value["Type"];
	 				$sql = "INSERT INTO `upload_file`(`ID_Mater`, `UploadName`, `UploadType`, `UploadPath`, `UploadDate`,`Type`) 
					VALUES(".$lastID.",'".$value["UploadName"]."','".$value["UploadType"]."','".$value["UploadPath"]."',now(),$Type)";
				// echo $sql;
					$db->execute($sql,$params);
		 		}
 			}
 			$tmpmail = [];
 			$subject= "熱海観光マップ「愛PHONE」管理画面の情報を送らせていただきます。"; 
 			$content= $_REQUEST['Name']."　様<br><br>";
 			$content.= "以下のURLに管理画面を設定しました。<br>";
 			$content.= "サイト：".WEB_URL."<br>";
 			$content.= "&#09;アカウント名：".$username."<br>";
	 		$content.= "&#09;パスワード：".$password."<br><br>";

	 		$content.= "アカウント名、パスワードを入力してお店の情報を更新することが出来ます。<br>
						ご確認のほどよろしくお願いいたします。<br><br><br>";

			$content.= "ご不明な点ございましたらご連絡ください。<br>
						対応時間　平日9:00～17:00<br>
						三谷（みたに）まで<br>
						TEL:055-976-5511<br>";

 			$tmpmail["content"] = $content;
 			$tmpmail["subject"] = $subject;
 			$tmpmail["mail"] = $_REQUEST['MemberEmail'];
			$send_mail->sendmailto_one($tmpmail);

		 	$confirm = 1;
		 	$vw->parts( "confirm", $confirm );

		}else {

			$sqlCategory = "SELECT * FROM `category_restaurant` WHERE id=".$_REQUEST['Category_id']." ";

			$data_category = $db->get_one($sqlCategory,$params);

			$categoryName = $data_category["Name"];

			$sql = "update  `restaurant` SET ".
					"Name='".$_REQUEST['Name']."',
					Category='" .$categoryName."',
					Category_id='" .$_REQUEST['Category_id']."',
					Introduce_cm='" .$_REQUEST['Introduce_cm']."',
					Address = '" .$_REQUEST['Address']."',
					Time_work='" .$_REQUEST['Time_work']."',
					MemberEmail= '" .$_REQUEST['MemberEmail']."',
					Tel= '" .$_REQUEST['Tel']."',
					Text1= '" .$_REQUEST['Text1']."',
					Text2= '" .$_REQUEST['Text2']."',
					Text3= '" .$_REQUEST['Text3']."',
					Text4= '" .$_REQUEST['Text4']."',
					Text5= '" .$_REQUEST['Text5']."',
					QR_1= '" .$_REQUEST['QR_1']."',
					QR_2= '"  .$_REQUEST['QR_2']."',
					Lat= '" .$_REQUEST['Lat']."',
					Lng= '" .$_REQUEST['Lng']."',
					Flag= '" .$_REQUEST['Flag']."',
					FromDay= '" .$_REQUEST['FromDay']."',
					ToDay= '" .$_REQUEST['ToDay']."',
					UpdatedBy= '" .$_SESSION["login_id"]."',
					UpdatedDate= now()  WHERE ID = ".$_REQUEST["ID"];
			$lastID = $db->execute($sql,$params);
			$uploads_dir = './upfiles';
			if(count($data_image)>0 && $_REQUEST["ID"] >0)
		 	{	
		 		// insert file path 
		 		foreach ($data_image as $key => $value) {
		 			if($value["delete"]!=null && $value["delete"]==1){
		 				// delete file from forder
		 				unlink($value["UploadPath"]);
		 				// delete file from db
		 				$sql = "DELETE FROM `upload_file` WHERE ID = ".$value["ID"];
						$db->execute($sql,$params);
		 				
		 			}else if($value["ID"]==null)
		 			{
		 				$Type = $value["Type"];
		 				$sql = "INSERT INTO `upload_file`(`ID_Mater`, `UploadName`, `UploadType`, `UploadPath`, `UploadDate`,`Type`) 
						VALUES(".$_REQUEST["ID"].",'".$value["UploadName"]."','".$value["UploadType"]."','".$value["UploadPath"]."',now(),$Type)";
		 			}
				// echo $sql;
					$db->execute($sql,$params);
		 		}
 			}
 			// get user data
 			$sql = "SELECT * FROM `user` where role=2 and ID_Mater=".$_REQUEST["ID"];
			$rec_user = $db->get_one($sql,$params);
 			// if($_SESSION['role'] ==1){
				$subject= "お店の情報を更新しました。";
 				$content= $_REQUEST['Name']."　様<br><br>";
	 			// $content .= date("Y")."年".date("m")."月".date("d")."日  ".date("H")+'7'."時".date("i")."分 <br>";
	 			$content.= "お店の情報が更新されました。<br><br>";
	 			$content.= "【ログイン情報】※<br>";
	 			$content.= "サイト：".WEB_URL."<br>";
	 			if($rec_user!=null){
		 			$content.= "&#09;アカウント名：".$rec_user["username"]."<br>";
	 				$content.= "&#09;パスワード：".$rec_user["password"]."<br><br>";	
	 			}
	 			$content.= "アカウント名、パスワードを入力してお店の情報を更新することが出来ます。<br>
						ご確認のほどよろしくお願いいたします。<br><br><br>";

				$content.= "ご不明な点ございましたらご連絡ください。<br>
						対応時間　平日9:00～17:00<br>
						三谷（みたに）まで<br>
						TEL:055-976-5511<br>";
	 			$tmpmail["content"] = $content;
	 			$tmpmail["subject"] = $subject;
	 			$tmpmail["mail"] = $_REQUEST['MemberEmail'];
				$send_mail->sendmailto_one($tmpmail);
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
		$sql = "SELECT * FROM `restaurant` where ID=".$_REQUEST["ID"];
		$data_post = $db->get_one($sql,$params);
		$sql = "SELECT * FROM `upload_file` WHERE 1 and Type = 1 and ID_Mater=".$_REQUEST["ID"];
		$rec_img = $db->get_all($sql, $params);
		if(is_countable($rec_img)>0){
			$data_post["userImageCount"] =count($rec_img);
			$_SESSION["data_image"] = $rec_img;
			$data_post["data_image"] = $rec_img;
		}
		// get image banner
		$sql = "SELECT * FROM `upload_file` WHERE 1 and Type = 5 and ID_Mater=".$_REQUEST["ID"];
		$rec_img = $db->get_one($sql, $params);

		if(is_countable($rec_img)>0){
			$rec_img["action"] ="banner";
			array_push($_SESSION["data_image"] ,$rec_img);
			array_push($data_post["data_image"] ,$rec_img);
		}
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
