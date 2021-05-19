<?php

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

	session_start();
	if(!isset($_SESSION['data_image']))
	{
		$_SESSION['data_image'] = [];
	}

	$data_post = [];
	if($_REQUEST["status"]=="insert"){
		getPathImage();
	}
	if($_REQUEST["status"]=="remove"){
		deleteInSession();
	}
		
	// if(count($_SESSION['data'])>0){
	// 	foreach ($_SESSION['data'] as $key => $value) {
	// 		if($value["action"] == $_REQUEST['action']){

	// 		}else{

	// 		}
	// 	}
	// }
	
	function getPathImage()
	{
		$uploads_dir = './upfiles';
		$data = [];
		$data["action"] = $_REQUEST['action'];
		$data["image"] = [];
		// delete banner 
		foreach ($_SESSION['data_image'] as $key => $value) {
			if($data["action"] ==$value["action"] && $value["action"] == "banner" && $value["ID"]==null){
				// echo " vao day";
					unlink($value["UploadPath"]);
					unset($_SESSION['data_image'][$key]);
			}elseif($data["action"] ==$value["action"] && $value["action"] == "banner"){
				$_SESSION['data_image'][$key]["delete"] =1;
			}
		}
		foreach ($_FILES["userImage"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["userImage"]["tmp_name"][$key];
	        // basename() may prevent filesystem traversal attacks;
	        // further validation/sanitation of the filename may be appropriate
	        $name = basename($_FILES["userImage"]["name"][$key]);
	        // $imageProperties = getimageSize($_FILES['userImage']['tmp_name'][$key]);
	        $filename = checkfile_exist($name,$uploads_dir);
	        
	        $UploadPath = "$uploads_dir/$filename";
	         
	        move_uploaded_file($tmp_name, $UploadPath);
	        $detail = [];
	        $detail["action"] = $_REQUEST['action'];
	        $detail["UploadName"] =$filename;
			$detail["UploadType"] =$_FILES["userImage"]["type"][$key];
			$detail["UploadPath"] = $UploadPath;
			$detail["Type"]		  = $_REQUEST['type'];	
			// echo $
			// array_push($data["image"], $detail);
			array_push($_SESSION['data_image'], $detail);
	    	}
		}
		// array_push($_SESSION['data_image'], $data);
		

		$datajson = [];
			foreach ($_SESSION['data_image'] as $key => $value) {
				// $data = 'data:'.$value["imageType"].';base64' .base64_encode($value['imageData']);
				if($value["delete"]!=1){
					$tmpjson = [
						"UploadName" => $value["UploadName"],
						"UploadType" => $value['UploadType'],
						"Type" => $value["Type"],
						"UploadPath" => $value["UploadPath"],
						"action" => $value["action"]
					];	
					array_push($datajson, $tmpjson);
				}
				
				
			}
			$json = json_encode($datajson);
			echo $json;
	}
	function deleteInSession(){
		try{
			foreach ($_SESSION['data_image'] as $key => $value) {
				// echo " vao day".$value["UploadName"] . $_REQUEST["filename"];
				if($value["UploadName"] == $_REQUEST["filename"]){
					if($value["ID"]){
						// if id exist when disable
						$_SESSION['data_image'][$key]["delete"] =1;
					}else{
						unlink($value["UploadPath"]);
						unset($_SESSION['data_image'][$key]);
					}
				}
				
			}
			// print_r($_SESSION['data_image']);
			$response = [ 
					'success' => true
				];
			echo json_encode($response);
		}catch(Exception $e){
			$response = [ 
					'success' => false,
					'checkid' => false,
					'error' => true,
					'message' => 'WORKER_MASTERテーブルが存在しない'
					];
			// echo json_encode($response);
			$log  = "User: ".date("F j, Y, H:i").PHP_EOL.
					"Attempt: ".$e.PHP_EOL.
					"User: ".$username.PHP_EOL.
					"-------------------------".PHP_EOL;
			/*エラー内容がログファイルに出力*/
			file_put_contents('./log/log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
			return true;
		}
	}
	function checkfile_exist($name,$uploads_dir){
		$actual_name = pathinfo($name,PATHINFO_FILENAME);
		$original_name = $actual_name;
		$extension = pathinfo($name, PATHINFO_EXTENSION);

		$i = 1;
		while(file_exists($uploads_dir."/".$actual_name.".".$extension))
		{           
		    $actual_name = (string)$original_name.$i;
		    $name = $actual_name.".".$extension;
		    $i++;
		}
		return $name;
	}
?>