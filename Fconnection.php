
<?php
	$location = "localhost";//伺服器
	$account="root";//使用者
	$password="";//密碼
	$name = "dormitory";

	$link=mysqli_connect($location,$account,$password,$name);

	if($link){
		//echo "<script language='JavaScript'>;alert('連結資料庫:$name');</script>;";
	}
	else{
		die("無法連結資料庫");
	}
?>