<?php 
    $ID=$_GET['ID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    include("Fconnection.php");
    $sql="DELETE FROM 留言板 WHERE 留言編號=$ID";
    if($query_del=mysqli_query($link,$sql)){
        echo "<script language='JavaScript'>;alert('刪除成功');location.href='bulletinboard_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
    else echo ":<"
?>