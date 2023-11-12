<?php
    include("Fconnection.php");
    $Acc=$_GET["Acc"];
    $Ide=$_GET["Ide"];
    $usrAcc=$_POST["usrAcc"];
    $usrPwd=$_POST["usrPwd"];
    $usrNum=$_POST["usrNum"];
    $usrNam=$_POST["usrNam"];
    $usrMai=$_POST["usrMai"];
    $usrPho=$_POST["usrPho"];
    $usrYea=$_POST["usrYea"];
    $usrLev=$_POST["usrLev"];
    $usrUpdate = "UPDATE 學生 SET 密碼='".$usrPwd."',學號='".$usrNum."',姓名='".$usrNam."',Email='".$usrMai."',連絡電話='".$usrPho."',學年度='".$usrYea."',系級='".$usrLev."' WHERE 學生帳號='".$usrAcc."'";
    $result=mysqli_query($link,$usrUpdate);
    echo "<script language='JavaScript'>alert('修改成功');location.href='student_page.php?Acc=$Acc&Ide=$Ide'</script>";
?>