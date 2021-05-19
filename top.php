<?
/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * 管理画面トップページ
 * 共通お知らせページ
 * 
 * @author Toshihiro Tanaka
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/

 /**
 * 不正ログインチェック
 **/
//logincheck

/**
 * メインネーム
 **/
$main_name = "top";
$tbl_name  = "t_top";

/**
 * 各種設定
 **/
$view_tpl  = "./template/".$main_name.".html";  // テンプレート名設定
$vcnt      = 5;                                 // 1画面に表示する件数

/*-------------------------------------------------------------------*
 * メインコントローラ表示処理
 *-------------------------------------------------------------------*/
/*- 一覧表示 -*/
//getlist();

/**
 * テンプレート表示
 **/
$vw->show( $view_tpl );


/*-------------------------------------------------------------------*
 * 一覧表示
 *-------------------------------------------------------------------*/
function getlist() {

	global $db;
	global $vw;
	global $sys;
	global $vcnt;
	global $tbl_name;
	
	/* 一覧情報取得 */
	$sql = "SELECT
				SQL_CALC_FOUND_ROWS
				*,
				DATE_FORMAT(up_date, '%Y/%m/%d') up_date
			FROM ".$tbl_name;
			
//	$sql = setorder($sql,"edit_date");
	
	$rec = $db->get_all($sql, $params);
	
	//一覧情報テンプレート反映
	$vw->parts( "rec", $rec );

	return;
}


/*-------------------------*
 * オーダー条件設定
 *-------------------------*/
function setorder( $sql,$defstr ) {
	
	if( !$_SESSION[order] ){
		$_SESSION[order] = $defstr." desc";
	}elseif( $_REQUEST[order] ){
		if( $_SESSION[order] == $_REQUEST[order] ){
			$_SESSION[order] = $_REQUEST[order] . " DESC";
		}else{
			$_SESSION[order] = $_REQUEST[order];
		}
	}
	
	if( $_SESSION[order] ) $sql .= " ORDER BY ".$_SESSION[order];
	
	return $sql;
}

?>

