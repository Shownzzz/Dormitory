<?php
    include("Fconnection.php");
    $usrID=$_GET['ID'];
    $usrTit=$_POST["usrTit"];
	$usrCon=$_POST["usrCon"];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $sql="UPDATE 公告消息 SET 標題='$usrTit',內容='$usrCon' WHERE 公告編號=$usrID";
	if(!mysqli_query($link,$sql)){
        die("wrong");
    }
    echo "<script language='JavaScript'>;alert('更改成功');location.href='announcement_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        
?>