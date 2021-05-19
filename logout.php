<?
	/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
	 * ログイン画面
	 * 
	 * @author Toshihiro Tanaka
	 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
	//ini_set("display_errors",1);
	session_start();
	// session_reset();
	$_SESSION =[];
	echo "<script>window.location.href='./index.php';</script>";
?>