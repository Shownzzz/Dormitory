<?php
    include("Fconnection.php");

    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    $Building=$_GET['Building'];
    $roomID=$_GET['roomID'];

    $usrDelete1 = "DELETE FROM 設備 WHERE 設備編號 in (select 設備編號 from 包含 where 宿舍大樓名稱='$Building' and 房間號碼=$roomID) ";
    $usrDelete2 = "DELETE FROM 宿舍大樓基本資料 WHERE 宿舍大樓名稱='$Building' and 房間號碼=$roomID";
    if(!mysqli_query($link,$usrDelete1)||!mysqli_query($link,$usrDelete2)){
        die("wrong");
    }
    else{
        echo "<script language='JavaScript'>alert('刪除成功');location.href='building.php?Acc=$Acc&Ide=$Ide'</script>"; 
    }
?>