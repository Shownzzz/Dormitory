<?php
    include("Fconnection.php");

    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    $usrBui=$_POST['usrBui'];
    $usrNum=$_POST['usrNum'];
    $usrCou=$_POST['usrCou'];
    $usrFee=$_POST['usrFee'];

    $usrAdd = "INSERT INTO 宿舍大樓基本資料(宿舍大樓名稱,房間號碼,可容納人數,房間住宿費用,管理員帳號) VALUE('$usrBui','$usrNum','$usrCou','$usrFee','$Acc')";
    if(!mysqli_query($link,$usrAdd)){
        die("wrong");
    }
    else{
        echo "<script language='JavaScript'>alert('新增成功');location.href='building.php?Acc=$Acc&Ide=$Ide'</script>"; 
    }
?>