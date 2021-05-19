<?php
 
	// ini_set("display_errors",1);
	require_once './email.php';
	$send_mail = new sendmail();
	$main_name = "hotel_store";

	$data_post =[];
	$confirm =0;

	// check session image
	
	$view_tpl = "./template/".$main_name.".html"; // テンプレート名設定
	$base_url = "?cat=5";         // URLパラメータ設定

	$data_post["ID"] =$_REQUEST["ID"];
	
	$data_post["Flag"] =1;
	$data_post["AdFlag"] =1;
	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		 postdata();
	}else{
		$_SESSION["data_image"]= null;
	}
	if($_REQUEST['ID']!="hotel")
	{
		 $data_post = getdataByID();
	}
	// save sesion request form 
	// print_r($_SESSION["data"]);
	// html page

	$vw->parts( "base_url", $base_url );
	$vw->parts( "data_post", $data_post );
	/**
		* テンプレート表示
	**/
	$vw->show( $view_tpl );
 
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
		if ($_REQUEST["ID"]=="hotel"){
			
			$password = randomPassword();
   			$tmpuser = before( $_REQUEST['MemberEmail'],"@");
			$username = random_username($tmpuser);

			$sql = "INSERT INTO `hotel`(`Name`, `Introduce_cm`, `Address`, `MemberEmail`, `UserName`, `Password`, `Tel`, `QR`, `Lat`, `Lng`, `Room_number`, `Info_hotel`, `Other`,`Flag`, `AdFlag`, `UpdatedBy`, `CreatedBy`,`UpdatedDate`, `CreatedDate`) VALUES ('"
					 .$_REQUEST['Name']."','"
					 .$_REQUEST['Introduce_cm']."','"
					 .$_REQUEST['Address']."','"
					 .$_REQUEST['MemberEmail']."','"
					 .$username."','"
					 .$password ."','"
					 .$_REQUEST['Tel']."','"
					 .$_REQUEST['QR']."','"
					 .$_REQUEST['Lat']."','"
					 .$_REQUEST['Lng']."','"
					 .$_REQUEST['Room_number']."','"
					 .$_REQUEST['Info_hotel']."','"
					 .$_REQUEST['Other']."','"
					 .$_REQUEST['Flag']."','"
					 .$_REQUEST['AdFlag']."','"
					 .$_SESSION["login_id"]."','"
					 .$_SESSION["login_id"]."',now(),now())";
					 // echo $sql;
			$lastID = $db->execute_getID($sql,$params);
			$sql = "INSERT INTO `user`(`ID_Mater`, `username`, `password`,Email, `role`, `role_name`, `comment`, `createddate`) 
				VALUES ($lastID,'".$username."','".$password."','".$_REQUEST['MemberEmail']."',3,'宿泊のユーザ','".$_REQUEST['Name']."',now())";
			$db->execute( $sql, $params );
			$uploads_dir = './upfiles';
			if(is_countable($data_image)>0 && $lastID >0)
		 	{	
		 		// insert file path 
		 		foreach ($data_image as $key => $value) {
	 				$sql = "INSERT INTO `upload_file`(`ID_Mater`, `UploadName`, `UploadType`, `UploadPath`, `UploadDate`,`Type`) 
					VALUES(".$lastID.",'".$value["UploadName"]."','".$value["UploadType"]."','".$value["UploadPath"]."',now(),2)";
				// echo $sql;
					$db->execute($sql,$params);
					// die();
		 		}
 			}
 			$tmpmail = [];
 			$content= $_REQUEST['Name']."<br>";
 			$content .= date("Y")."年".date("m")."月".date("d")."日  ".date("H")+'7'."時".date("i")."分 <br>";
 			$content.= "宿泊の情報を申し込みました。<br>";
 			$content.= "サイト：".WEB_URL."<br>";
 			$content.= "ログインの情報：<br>";
 			$content.= "&#09;ユーザ：".$username."<br>";
	 		$content.= "&#09;パスワード：".$password."<br>";

 			$tmpmail["content"] = $content;
 			$tmpmail["mail"] = $_REQUEST['MemberEmail'];
			$send_mail->sendmailto_one($tmpmail);

		 	$confirm = 1;
		 	$vw->parts( "confirm", $confirm );

		}else {
			$sql = "update  `hotel` SET ".
					"Name='".$_REQUEST['Name']."',
					Introduce_cm='" .$_REQUEST['Introduce_cm']."',
					Address = '" .$_REQUEST['Address']."',
					MemberEmail= '" .$_REQUEST['MemberEmail']."',
					Tel= '" .$_REQUEST['Tel']."',
					QR= '"  .$_REQUEST['QR']."',
					Lat= '" .$_REQUEST['Lat']."',
					Lng= '" .$_REQUEST['Lng']."',
					Flag= '" .$_REQUEST['Flag']."',
					AdFlag= '" .$_REQUEST['AdFlag']."',
					Room_number= '" .$_REQUEST['Room_number']."',
					Info_hotel= '" .$_REQUEST['Info_hotel']."',
					Other= '" .$_REQUEST['Other']."',
					UpdatedBy= '" .$_SESSION["login_id"]."',
					UpdatedDate= now()  WHERE ID = ".$_REQUEST["ID"];

			$lastID = $db->execute($sql,$params);
			$uploads_dir = './upfiles';
			if(count($data_image)>0 && $_REQUEST["ID"] >0)
		 	{	
		 		// insert file path 
		 		foreach ($data_image as $key => $value) {
		 			if($value["delete"]!=null && $value["delete"]==1){
		 				$sql = "DELETE FROM `upload_file` WHERE ID = ".$value["ID"];
						$db->execute($sql,$params);
		 				
		 			}else if($value["ID"]==null)
		 			{
		 				$sql = "INSERT INTO `upload_file`(`ID_Mater`, `UploadName`, `UploadType`, `UploadPath`, `UploadDate`,`Type`) 
						VALUES(".$_REQUEST["ID"].",'".$value["UploadName"]."','".$value["UploadType"]."','".$value["UploadPath"]."',now(),2)";
		 			}
				// echo $sql;
					$db->execute($sql,$params);
		 		}
 			}
 			// get user data
 			$sql = "SELECT * FROM `user` where ID_Mater=".$_REQUEST["ID"];
			$rec_user = $db->get_one($sql,$params);
 			// if($_SESSION['role'] ==1){
 				$content= $_REQUEST['Name']."<br>";
	 			$content .= date("Y")."年".date("m")."月".date("d")."日  ".date("H")+'7'."時".date("i")."分 <br>";
	 			$content.= "宿泊の情報を編集出来ました。<br>";
	 			$content.= "サイト：".WEB_URL."<br>";
	 			if($rec_user!=null){
	 				$content.= "ログインの情報：<br>";
		 			$content.= "&#09;ユーザ：".$rec_user["username"]."<br>";
	 				$content.= "&#09;パスワード：".$rec_user["password"]."<br>";	
	 			}
	 			$tmpmail["content"] = $content;
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
		$sql = "SELECT * FROM `hotel` where ID=".$_REQUEST["ID"];
		$data_post = $db->get_one($sql,$params);
		$sql = "SELECT * FROM `upload_file` WHERE 1 and Type = 2 and ID_Mater=".$_REQUEST["ID"];
		$rec_img = $db->get_all($sql, $params);
		if(count($rec_img)>0){
			
			$data_post["userImageCount"] =count($rec_img);
			$_SESSION["data_image"] = $rec_img;
			$data_post["data_image"] = $rec_img;
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
