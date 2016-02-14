<?php 
session_start();

//セッション情報の削除
$SESSION = array();
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(),'',time() -42000,
		$paramas["path"], $paramas["domain"],
		$paramas["secure"], $paramas["httponly"]);
}
session_destroy();

//cookieの情報も削除
setcookie('email', '',time()-3600);
setcookie('password', '',time()-3600);

header('Location: login.php');
exit();

 ?>