<?php
	include("Fconnection.php");
	$usrName=$_POST["usrName"];
	$usrID=$_POST["usrID"];
	$usrGru=$_POST["usrGru"];
	$usrYear=$_POST["usrYear"];
	$usrMail=$_POST["usrMail"];
	$usrPho=$_POST["usrPho"];
	$usrSex=$_POST["usrSex"];
	$usrAcc=$_POST["usrAcc"];
	$usrPwd=$_POST["usrPwd"];
	$usrPwdc=$_POST["usrPwdc"];
    $Acc=$_GET['Acc'];
    $ID=$_GET["Ide"];
    if($usrPwd!=$usrPwdc){
        echo "<script language='JavaScript'>;alert('密碼不相同');location.href='student_add.php?Acc=$Acc&Ide=$ID';</script>;";
    }
    //$usrCheck = "SELECT 舍監帳號,管理員帳號,學生帳號 FROM 舍監,系統管理員,學生 WHERE 學生帳號=$usrAcc,管理員帳號=$usrAcc,舍監帳號=$usrAcc;";
    $usrWar = "SELECT 學生帳號 FROM 學生 WHERE 學生帳號='$usrAcc';";
    $result0=mysqli_query($link,$usrWar);
    if(mysqli_num_rows($result0)>0){
        echo "<script language='JavaScript'>;alert('帳號重複');location.href='student_add.php?Acc=$Acc&Ide=$ID';</script>;";
    }
    else{
        $usrAdd = "INSERT INTO 學生(學生帳號,密碼,學號,姓名,性別,Email,連絡電話,學年度,系級) VALUE('$usrAcc','$usrPwd','$usrID','$usrName','$usrSex','$usrMail','$usrPho','$usrYear','$usrGru')";
    if(!mysqli_query($link,$usrAdd)){
        die("wrong");
    }
    echo "<script language='JavaScript'>;alert('註冊成功');location.href='system_page.php?Acc=$Acc&Ide=$ID';</script>;";
    }

?>