<?php
ini_set("display_errors",0);												//エラー表示レベル

define( "ADMIN_ID", "hoiku" );												//CMS管理者ID
define( "ADMIN_PASS", "system" );											//CMS管理者パスワード

define( "SITE_TITLE", "Global-Communications Solution" );					//CMSヘッダー表示タイトル

define( "WEB_URL", "https://www.atami-aiphone.com/index.php" );								//webサイトURL
define( "WEB_ADMIN_URL", WEB_URL."admin/" );								//管理ページルートURL
define( "WEB_ROOT", htmlspecialchars($_SERVER["DOCUMENT_ROOT"])."/" );		//サイトルートパス
define( "WEB_ADMIN_ROOT", WEB_ROOT."admin/" );								//管理ページルートパス
define( "WEB_ADMIN_TEMPLATE", WEB_ADMIN_ROOT."template/" );					//テンプレートパス（管理画面）
?>