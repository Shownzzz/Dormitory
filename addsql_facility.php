<?php
    include("Fconnection.php");

    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    $usrBui=$_POST['usrBui'];
    $usrNum=$_POST['usrNum'];
    $usrNam=$_POST['usrNam'];
    $usrSit=$_POST['usrSit'];
    $usrQua=$_POST['usrQua'];

    $usrAdd2 = "INSERT INTO 包含(宿舍大樓名稱,房間號碼) VALUE('$usrBui','$usrNum')";
    $usrAdd1 = "INSERT INTO 設備(設備名稱,設備狀況,數量) VALUE('$usrNam','$usrSit','$usrQua')";
    if(!mysqli_query($link,$usrAdd1)||!mysqli_query($link,$usrAdd2)){
        die("wrong");
    }
    else{
        echo "<script language='JavaScript'>alert('新增成功');location.href='facility.php?Acc=$Acc&Ide=$Ide&Building=$usrBui&roomID=$usrNum'</script>"; 
    }
?>