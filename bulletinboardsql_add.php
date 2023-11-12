<?php
	include("Fconnection.php");
	$usrName=$_POST["usrName"];
	$usrTit=$_POST["usrTit"];
	$usrCon=$_POST["usrCon"];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    date_default_timezone_set('Asia/Taipei');
    $date=date('Y/m/d H:i:s');
    $usrAdd="INSERT INTO 留言板(日期,姓名,標題,內容) VALUE('$date','$usrName','$usrTit','$usrCon')";
    if($result=mysqli_query($link,$usrAdd)){
        if($Ide == 'option1')
        echo "<script language='JavaScript'>;alert('新增成功');location.href='student_bulletinboard.php?Acc=$Acc&Ide=$Ide';</script>;";
        else
        echo "<script language='JavaScript'>;alert('新增成功');location.href='bulletinboard_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
?>