<?php 
    $ID=$_GET['ID'];
    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    include("Fconnection.php");
    $sql="DELETE FROM 學生 WHERE 學生帳號='$ID'";
    if($query_del=mysqli_query($link,$sql)){
       echo "<script language='JavaScript'>;alert('刪除成功');location.href='student_list.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
    else echo "<script language='JavaScript'>;alert('刪除失敗');location.href='student_list.php?Acc=$Acc&Ide=$Ide';</script>;";
?>