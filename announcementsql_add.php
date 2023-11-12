<?php
	include("Fconnection.php");
	$usrTit=$_POST["usrTit"];
	$usrCon=$_POST["usrCon"];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    date_default_timezone_set('Asia/Taipei');
    $date=date('Y/m/d H:i:s');
    $usrAdd = "INSERT INTO 公告消息(標題,日期,內容,管理員帳號) VALUE('$usrTit','$date','$usrCon','$Acc')";
    if(mysqli_query($link,$usrAdd)){
        echo "<script language='JavaScript'>;alert('新增成功');location.href='announcement_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }else{
        echo "<script language='JavaScript'>;alert('失敗');location.href='announcement_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
?>