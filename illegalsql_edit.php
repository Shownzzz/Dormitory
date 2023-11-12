<?php
    include("Fconnection.php");
    $usrID=$_GET['ID'];
    $usrDate=$_POST["usrDate"];
	$usrCon=$_POST["usrCon"];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $sql="UPDATE 學生違規紀錄 SET 日期='$usrDate',違規內容='$usrCon' WHERE 紀錄編號=$usrID";
    mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)){
        echo "<script language='JavaScript'>;alert('儲存成功');location.href='illegal_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }else{
        echo "<script language='JavaScript'>;alert('儲存失敗');location.href='illegal_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
        
?>