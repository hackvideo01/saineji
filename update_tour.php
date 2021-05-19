<?php
	
	// ini_set("display_errors",1);
	include("./include/base/conf.php");
	require_once './email.php';
	$send_mail = new sendmail();
	$confirm =0;
	/* データベースクラス */
	$db = new MySQLDatabase();

	/* テンプレート表示クラス */
	$vw = new utl_view();

	/* 汎用関数クラス */
	$sys = new utl_system();



	$action = $_REQUEST["action"];
	
	if($_POST["action"] == "delete"){
	
	 	$dataID = $_POST["id"];
		if( $dataID !=null){
			change_status((int)$dataID);	
		}
	}

	if($_POST["action"] == "saveimg"){
		$dataID = $_POST["id"];
		save_img($dataID);
	}
	function change_status($ID){
		global $db;
		global $vw ,$send_mail;
		$params = [];

		$sql =  "DELETE FROM `tour` WHERE  ID = ".$ID;

		$rec = $db->execute($sql, $params);
		// if($rec==1)
		// {

			$sql = "SELECT * FROM `upload_file` WHERE  1 and Type =3 and ID_Mater = ".$ID;
			$rec_upload = $db->get_all($sql,$params);
			if(is_countable($rec_upload)){
				foreach ($rec_upload as $key => $value) {
					unlink($value["UploadPath"]);
				}
			}
			$sql =  "DELETE FROM `upload_file` WHERE  1 and Type =3 and ID_Mater = ".$ID;
			$rec = $db->execute($sql, $params);

			$sql =  "DELETE FROM `user` WHERE 1 and role=4 and  ID_Mater = ".$ID;
			$rec = $db->execute($sql, $params);
		// }
		return;
	}
	// function save_img ($ID){
	// 	global $db;
	// 	global $vw;
	// 	$params = [];

	// 	$sql ="select * from output_images  where IDData = ".$ID;
	// 	$rec = $db->get_all($sql, $params);
	// 	print_r($rec);
	// 	$datajson = [];
	// 	foreach ($rec as $key => $value) {
	// 		// $data = 'data:'.$value["imageType"].';base64' .base64_encode($value['imageData']);
	// 		$tmpjson = [
	// 			"name" => $value["imageName"],
	// 			"data" => $value['imageData'],
	// 			"type" => $value["imageType"]
	// 		];
	// 		// file_put_contents( 'C:\Users\admin\Downloads\image.jpg',  $value['imageData'] );
	// 		array_push($datajson, $tmpjson);
	// 		// save image
	// 		// $imageName ="\\Downloads\\". $value["imageName"];
	// 		// file_put_contents( $imageName,  $value['imageData'] );
	// 	}
	// 	$json = json_encode($datajson); 
	// 	echo $json;
	// 	return $rec;
	// }

?>