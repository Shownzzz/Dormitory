<?php
    include("Fconnection.php");

    $Acc=$_GET["Acc"];
    $Ide=$_GET["Ide"];
    
    date_default_timezone_set('Asia/Taipei');
    $today=date('Y-m-d');
    $content=$_POST["content"];
    $equNum=$_POST["equNum"];
    $isFinish=$_POST["isFinish"];
    $usrNam=$_POST["usrNam"];
    $usrNum=$_POST["usrNum"];
    //$usrNam=$_POST["usrNam"];

    //$usrCheck = "SELECT * FROM 學生 WHERE 姓名='$usrNam' AND 學號='$usrNum' ;";
    //$usrAll=mysqli_query($link,$usrCheck);
    //$result=mysqli_fetch_assoc($usrAll);

    //$usrBui=$result['宿舍大樓名稱'];
    //$usrRoo=$result['房間號碼'];

    //$equCheck = "SELECT * FROM 設備 WHERE 設備編號='$usrEqu'";
    //$equAll=mysqli_query($link,$equCheck);
    //$equresult=mysqli_fetch_assoc($equAll);

    //$equNam=$equresult['設備名稱'];
    if($isFinish == '0'){
        $update0 = "UPDATE 報修 SET 回覆內容='$content' WHERE 報修編號='$equNum'";
        $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$usrNum','否','報修回覆','$usrNam','$content')";
        if(!mysqli_query($link,$update0) || !mysqli_query($link,$update00)){
            die("wrong");
        }
        else{
            echo "<script language='JavaScript'>alert('回覆成功');location.href='repair_manage.php?Acc=$Acc&Ide=$Ide'</script>";
        }
    }
    else if($isFinish == '1'){
        $update1 = "UPDATE 報修 SET 結案與否='是',結案日期='$today' WHERE 報修編號='$equNum' ";
        if(!mysqli_query($link,$update1)){
            die("wrong");
        }
        else{
            echo "<script language='JavaScript'>alert('更新成功');location.href='repair_manage.php?Acc=$Acc&Ide=$Ide'</script>";
        }
    }
?>