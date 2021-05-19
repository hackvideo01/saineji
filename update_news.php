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

		$sql =  "DELETE FROM `news` WHERE  ID = ".$ID;

		$rec = $db->execute($sql, $params);
		// if($rec==1)
		// {

			$sql = "SELECT * FROM `upload_file` WHERE  1 and Type =5 and ID_Mater = ".$ID;
			$rec_upload = $db->get_all($sql,$params);
			if(is_countable($rec_upload)){
				foreach ($rec_upload as $key => $value) {
					unlink($value["UploadPath"]);
				}
			}
			$sql =  "DELETE FROM `upload_file` WHERE 1 and Type =5 and ID_Mater = ".$ID;
			$rec = $db->execute($sql, $params);

			$sql =  "DELETE FROM `user` WHERE 1 and role=6 and  ID_Mater = ".$ID;
			$rec = $db->execute($sql, $params);
		// }
		return;
	}

?>