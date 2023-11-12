<?php
    include("Fconnection.php");
    $ID=$_GET['ID'];
    $usrID=$_GET['usrID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $yon=$_GET['yon'];
    $option=$_GET['option'];
    $selectbuild="SELECT * FROM 學生 WHERE 學生帳號='$usrID'";
    $build=mysqli_fetch_assoc(mysqli_query($link,$selectbuild));
    $studentID=$build['學號'];
    $usrNam=$build['姓名'];

    $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$studentID','否','宿舍審核','$usrNam','請盡速繳交住宿費用')";
    mysqli_query($link, $update00);
    
    echo "<script language='JavaScript'>;location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";
?>