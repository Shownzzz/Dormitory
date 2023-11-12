<?php
	include("Fconnection.php");
	$usrName=$_POST["usrName"];
	$usrCon=$_POST["usrCon"];
	$usrAcc=$_POST["usrAcc"];
	$usrDate=$_POST["usrDate"];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $usrAdd = "INSERT INTO 學生違規紀錄(學生,日期,違規內容,學生帳號) VALUE('$usrName','$usrDate','$usrCon','$usrAcc')";
    $sql="SELECT * FROM 學生 WHERE 學生帳號='$usrAcc'";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)<1){
        echo "<script language='JavaScript'>;alert('查無此學生');location.href='illegal_add.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
    if(mysqli_query($link,$usrAdd)){
        echo "<script language='JavaScript'>;alert('新增成功');location.href='illegal_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }else{
        echo "<script language='JavaScript'>;alert('失敗');location.href='illegal_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
?>