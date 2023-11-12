<?php
    include("Fconnection.php");

    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    $Building=$_GET['Building'];
    $roomID=$_GET['roomID'];
    $facilityID=$_GET['facilityID'];

    $usrDelete = "DELETE FROM 設備 WHERE 設備編號=$facilityID";
    if(!mysqli_query($link,$usrDelete)){
        die("wrong");
    }
    else{
        echo "<script language='JavaScript'>alert('刪除成功');location.href='facility.php?Acc=$Acc&Ide=$Ide&Building=$Building&roomID=$roomID'</script>"; 
    }
?>