<?php
/*-*∞∞∞∞∞∞∞∞∞∞∞*-*
 * 汎用関数クラス
 * 
 * @author Toshihiro Tanaka
 *-*∞∞∞∞∞∞∞∞∞∞∞*-*/
class utl_system{
	
	function utl_system(){
	}
	
	
	/**---------------------------------------------------------------
	 ページナビゲーション
	 ---------------------------------------------------------------*/
	function page_navi_js($sql, $mode=1) {
		global $db;
		global $vcnt;
		
		$retstr = "";
		$pagecnt = 0;
		//レコード数を取得
		if( $mode == 2 )
		{
			$params = [];
			$rec = $db->get_one($sql,$params);
			$rcnt = $rec["cnt"];
		}
		else
		{
			$rec = $db->get_rowcount($sql);
			$rcnt = $rec;
		}
		//総ページ数を取得
		if($rcnt>0 && $vcnt>0 ) $pagecnt = ceil( $rcnt / $vcnt );
		
		$retstr = "<script>
					$(function() {
						var pagehash = location.hash;
						var pageno = pagehash.replace( /#page-/g , '' ) ;
					
						$('#paging').pagination({
							items:".$pagecnt.", //総ページ数
							displayPages: 1, //
							currentPage: pageno,
							cssStyle: 'light-theme',
							prevText: '<<',
							nextText: '>>',
							onPageClick: function(pageNumber){show(pageNumber)}
						});
					});
					function show(pageNumber)
					{

					  var page='#page-'+pageNumber;
					  $('.selection').hide()
					  $(page).show()

					}
					</script>";
		
		return $retstr;
	}
	
	
	
	
	
}
?>
