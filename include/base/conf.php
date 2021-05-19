<?php
/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * 設定ファイル読み込み
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
include_once "./include/extends/conf_ini.php";   //サーバー設定情報
include_once "./include/extends/conf_path.php";  //ファイルパス設定情報
include_once "./include/extends/conf_db.php";    //DB接続情報

/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * DBクラスファイル読み込み
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
include_once "./include/extends/mysqldb.php";    //DBクラス情報

/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * メールクラスファイル読み込み
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
include_once "./include/extends/mail.php";       //メールクラス情報

/*-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*
 * 拡張クラスファイル読み込み
 *-*∞∞∞∞∞∞∞∞∞∞∞∞∞∞*-*/
include_once "./include/extends/utl_login.php";  //ログインセッション拡張ライブラリ
include_once "./include/extends/utl_img.php";    //イメージ拡張ライブラリ
include_once "./include/extends/utl_system.php"; //汎用拡張ライブラリ
include_once "./include/extends/utl_view.php";   //テンプレート拡張ライブラリ

?>