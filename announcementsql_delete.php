<?php 
    $ID=$_GET['ID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    include("Fconnection.php");
    $sql="DELETE FROM 公告消息 WHERE 公告編號=$ID";
    if($query_del=mysqli_query($link,$sql)){
        echo "<script language='JavaScript'>;alert('刪除成功');location.href='announcement_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
    else echo ":<"
?>