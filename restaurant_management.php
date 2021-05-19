<?php
	/*-*∞∞∞∞∞∞∞∞∞∞∞*-*
		*
		* @Author: Vuongnb
		* お店管理画面
		*
	*-*∞∞∞∞∞∞∞∞∞∞∞*-*/
	 // ini_set("display_errors",1);
	
	/**
		* 不正ログインチェック
	**/
	//logincheck
	
	/**
		* メインネーム
	**/
	$main_name = "restaurant_management";
	$tbl_name = "restaurant";
	
	/**
		* コントローラ・表示モード取得
	**/
	/**
		* 各種設定
	**/
	$view_tpl = "./template/".$main_name.".html"; // テンプレート名設定
	$base_url = "?cat=1" ;         // URLパラメータ設定
	$vcnt     = 10;                               // 1画面に表示する件数
	$err_info = Array();                          // エラーメッセージ
	
	// when detail btn click save session
	$_SESSION["url_dataview"] = $base_url;

	/**
		* デフォルト表示モード
	**/
	 
	// call data
	get_list();
	// getStatus();
	/**
		* 表示モード反映
	**/
	//$vw->parts( "ap_ctl", $ap_ctl );
	$vw->parts( "vw_ctl", $vw_ctl );
	
	/**
		* 基本URL反映
	**/
	$vw->parts( "base_url", $base_url );
	$vw->parts( "html_title", $html_title );
	$vw->parts( "prev", $prev );
	$vw->parts( "next", $next );
	$vw->parts( "status", $status );
	
	/**
		* テンプレート表示
	**/
	$vw->show( $view_tpl );
	
	/*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*
		* 一覧表示
	*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*/
	function get_list() 
	{
		global $db;
		global $vw;
		global $sys;
		global $vcnt;
		global $tbl_name;
		global $allcnt;
		
		$params = [];
		
		
		/*- 一覧情報取得 -*/
		$sql = "SELECT * FROM " . $tbl_name." WHERE 1 ";
		$check_sql = $db->get_rowcount($sql,$params);
		$vw->parts( "check_sql", $check_sql );

		// ソート制御 を 追加
		$sql_where = "";
		if($_REQUEST['Name']!=null){
			$sql_where.=" and Name like '%".$_REQUEST['Name']."%'";
		}
		if($_REQUEST['Address']!=null){
			$sql_where.=" and Address like '%".$_REQUEST['Address']."%'";
		}
		if ($_REQUEST['col'] != "" AND $_REQUEST['order'] != "")
		{
			$sql_where .= " ORDER BY " . $_REQUEST['col'] . " " . $_REQUEST['order'];
		}
		else
		{
			$sql_where .= " ORDER BY  CreatedDate DESC";
			// $_REQUEST['col'] = "";
			// $_REQUEST['order'] = "";
		}
		$sql .=$sql_where;
		$rec = $db->get_all($sql, $params);
		foreach ($rec as $key => $value) {
			$sql_img = "select * from upload_file where Type = 5 and ID_Mater = ".$value["ID"];
			$res_img = $db->get_one($sql_img,$params);
			if($res_img !=null){
				$rec[$key]["UploadPath"] = $res_img["UploadPath"];
			}else{
				$sql_img = "select * from upload_file where Type = 1 and ID_Mater = ".$value["ID"];
				$res_img = $db->get_one($sql_img,$params);
				if($res_img !=null){
					$rec[$key]["UploadPath"] = $res_img["UploadPath"];
				}
			}
		}
		
		$num_row = $db->get_rowcount($sql,$params);
		$vw->parts( "num_row", $num_row );

		$params = [];
		
		/*- ページネーション -*/
		$sql_cnt = "SELECT count(*) cnt FROM ".$tbl_name." WHERE 1 ".$sql_where;
		$vw->parts( "pagejs", $sys->page_navi_js($sql_cnt, 2) );
		$allcnt = $db->get_one($sql_cnt,$params);
		
		if($allcnt) $pcnt = ceil( $allcnt['cnt'] / $vcnt );
		
		/*- テンプレート一覧表示整形用関数 -*/
		$vw->parts( "pcnt", $pcnt );
		$vw->parts( "vcnt", $vcnt );
		
		/*- 一覧情報テンプレート反映 -*/
		$vw->parts( "rec", $rec );
		return;
	}
	 function convert_status($status){
         $res ="";
            switch ($status) {
                case 0:
                    $res="未着手";
                    break;
                case 1:
                    $res="下書済";
                    break;
                case 2:
                    $res="チェック待ち";
                    break;
                case 3:
                    $res="投稿済み";
                    break;
                default:
                    $res="未着手";
                    break;
            };
        return $res;
    }
	function getStatus(){
		global $db;
		global $vw;
		$params = [];
		$sql =  "select * from status where 1";
		$rec_status = $db->get_all($sql, $params);
		$vw->parts( "rec_status", $rec_status );
		return;
	}
	 
	?>																															