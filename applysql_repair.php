<?php
    include("Fconnection.php");

    $Acc=$_GET["Acc"];
    $Ide=$_GET["Ide"];
    
    $usrNam=$_POST["usrNam"];
    $usrNum=$_POST["usrNum"];
    $usrDat=$_POST["usrDat"];
    $usrEqu=$_POST["usrEqu"];
    
    //date_default_timezone_set('Asia/Taipei');
    //$date=date('Y/m/d H:i:s');
    $usrCheck = "SELECT * FROM 學生 WHERE 姓名='$usrNam' AND 學號='$usrNum' ;";
    $usrAll=mysqli_query($link,$usrCheck);
    $result=mysqli_fetch_assoc($usrAll);

    $usrBui=$result['宿舍大樓名稱'];
    $usrRoo=$result['房間號碼'];

    $equCheck = "SELECT * FROM 設備 WHERE 設備編號='$usrEqu'";
    $equAll=mysqli_query($link,$equCheck);
    $equresult=mysqli_fetch_assoc($equAll);

    $equNam=$equresult['設備名稱'];

    if($result){
        //if(mysqli_num_rows($result)>0){
        //    echo "<script language='JavaScript'>alert('申請資料重複');location.href='apply_dormitory.php?Acc=$Acc&Ide=$Ide'</script>"; 
        //}
        //else{
            $usrAdd = "INSERT INTO 報修(設備編號,申請日期,設備名稱,姓名,學號,宿舍大樓名稱,房間號碼) VALUE('$usrEqu','$usrDat','$equNam','$usrNam','$usrNum','$usrBui','$usrRoo')";
            if(!mysqli_query($link,$usrAdd)){
                die("wrong");
            }
            else{
                echo "<script language='JavaScript'>alert('新增成功');location.href='student_page.php?Acc=$Acc&Ide=$Ide'</script>";
            }
        //}
    }
?>