<?php 
    $ID=$_GET['ID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    include("Fconnection.php");
    $sql="DELETE FROM 通知 WHERE 事件編號=$ID";
    if($query_del=mysqli_query($link,$sql)){
       echo "<script language='JavaScript'>;alert('刪除成功');location.href='notice_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
    else echo ":<"
?>