<?php
/*-*∞∞∞∞∞∞∞∞∞∞∞*-*
 *
 * テンプレート操作クラス
 *
 *-*∞∞∞∞∞∞∞∞∞∞∞*-*/
class utl_view{
	
	var $tmp_vars;
	var $tpl_path;
	
	/* テンプレートに表示する変数を格納 */
	function parts($name,$val){
		$this->tmp_vars[$name] = $val;
	}
	
	/* テンプレートの表示 */
	function show($tpl_file_path){
		if($this->tmp_vars) extract($this->tmp_vars);
		
		if( file_exists( $this->tpl_path.$tpl_file_path ) ) {
			require( $this->tpl_path.$tpl_file_path );
		}else{
			print "テンプレート表示エラー<br>".$this->tpl_path.$tpl_file_path."<br>";
		}
	}
	
}

