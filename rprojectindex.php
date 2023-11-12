<?php
	include("Fconnection.php");

	$usrAcc=$_POST["usrAcc"];
	$usrPwd=$_POST["usrPwd"];
    $usrCheck = "SELECT 管理員帳號 FROM 系統管理員 WHERE 管理員帳號=$usrAcc;";
    $result=mysqli_query($link,$usrCheck);
    if($result){
        if(mysqli_num_rows($result)>0){
            echo "<script language='JavaScript'>;alert('帳號重複');location.href='projectindex.php';</script>;";
        }
        else{
            $usrAdd = "INSERT INTO 系統管理員(管理員帳號,密碼) VALUE('$usrAcc','$usrPwd')";
	    if(!mysqli_query($link,$usrAdd)){
            die("wrong");
        }
        echo "<script language='JavaScript'>;alert('新增成功');location.href='projectindex.php';</script>;";
        }
    }

        
?>