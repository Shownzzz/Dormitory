<?php 
    $usrID=$_GET['ID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $usrNum=$_GET['usrNum'];
    include("Fconnection.php");
    $sql="UPDATE 通知 SET 已讀 = '是' WHERE 事件編號 = $usrID";
    if($Ide == 'option1')
    {
        if($query_del=mysqli_query($link,$sql)){
            echo "<script language='JavaScript'>;alert('修改成功');location.href='student_notice.php?Acc=$Acc&Ide=$Ide&usrNum=$usrNum';</script>;";
        }
        else echo ":<";
    }else{
        if($query_del=mysqli_query($link,$sql)){
            echo "<script language='JavaScript'>;alert('修改成功');location.href='dmanger_notice.php?Acc=$Acc&Ide=$Ide';</script>;";
        }
        else echo ":<";
    }

?>