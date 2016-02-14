<?php 
session_start();
require('dbconnect.php');

//ログインしているかチェックする
if(isset($_SESSION['member_id']) && $_SESSION['time'] + 3600 > time()){
	$id = $_REQUEST['id'];

		//投稿を検査する
	$sql = sprintf('SELECT * FROM `tweets` WHERE tweet_id = %d',mysqli_real_escape_string($db,$id));
	$record = mysqli_query($db,$sql) or die(mysqli_error($db));
	$table = mysqli_fetch_assoc($record);
	if($table['member_id'] == $_SESSION['member_id']){
	//削除処理
	$sql = sprintf('DELETE FROM `tweets` WHERE `tweet_id` = %d',mysqli_real_escape_string($db,$id));
		//sqlを実行する文
		mysqli_query($db,$sql) or die (mysqli_error($db));
		// var_dump($sql);
	}
}

header('Location: index.php');
exit();

?>
