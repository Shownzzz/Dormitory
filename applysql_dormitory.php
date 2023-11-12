<?php
    include("Fconnection.php");

    $Acc=$_GET["Acc"];
    $Ide=$_GET["Ide"];
    $usrAcc=$_POST["usrAcc"];
    $usrNam=$_POST["usrNam"];
    $usrYea=$_POST["usrYea"];
    $usrDat=$_POST["usrDat"];
    $usrFee=$_POST["usrFee"];
    $usrOpt=$_POST["usrOpt"];
    date_default_timezone_set('Asia/Taipei');
    $date=date('Y/m/d H:i:s');
    $usrCheck = "SELECT 學生帳號 FROM 申請住宿的資料 WHERE 學生帳號='$usrAcc' AND 學年度='$usrYea' AND 申請項目='$usrOpt';";
    $usrroom = "SELECT 房間號碼 FROM 學生 WHERE 學生帳號='$usrAcc';";
    $result=mysqli_query($link,$usrCheck);
    $roomresult=mysqli_query($link,$usrroom);
    $row = mysqli_fetch_assoc($roomresult);
    $roomNumber = $row['房間號碼'];
    if($result){
        if(mysqli_num_rows($result)>0){
            echo "<script language='JavaScript'>alert('申請資料重複');location.href='apply_dormitory.php?Acc=$Acc&Ide=$Ide'</script>"; 
        }
        else if(($usrOpt=="換宿"||$usrOpt=="退宿") && $roomNumber===NULL){
            echo "<script language='JavaScript'>alert('你目前還沒有房間');location.href='apply_dormitory.php?Acc=$Acc&Ide=$Ide'</script>";
        }
        else{
            $usrAdd = "INSERT INTO 申請住宿的資料(學生帳號,申請的學生,學年度,申請日期,費用繳交狀況,申請項目) VALUE('$usrAcc','$usrNam','$usrYea','$usrDat','$usrFee','$usrOpt')";
            if(!mysqli_query($link,$usrAdd)){
                die("wrong");
            }
            else{
                echo "<script language='JavaScript'>alert('新增成功');location.href='apply_dormitory.php?Acc=$Acc&Ide=$Ide'</script>";
            }
        }
    }
?>