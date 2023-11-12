<?php
    include("Fconnection.php");
    $ID=$_GET['ID'];
    $usrID=$_GET['usrID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $yon=$_GET['yon'];
    $option=$_GET['option'];

    $sql="SELECT 申請項目 FROM 申請住宿的資料 WHERE 資料編號=$ID";
    $row = mysqli_fetch_assoc(mysqli_query($link,$sql));
    $option = $row['申請項目'];
    $selectbuild="SELECT * FROM 學生 WHERE 學生帳號='$usrID'";
    $build=mysqli_fetch_assoc(mysqli_query($link,$selectbuild));
    $buildname= $build['宿舍大樓名稱'];
    $roomnum= $build['房間號碼'];
    $studentID=$build['學號'];
    $usrNam=$build['姓名'];
    if($yon=="1"){
        $sql="UPDATE 申請住宿的資料 SET 核可與否='是' WHERE 資料編號=$ID";}
    else  {
        $sql="UPDATE 申請住宿的資料 SET 核可與否='否' WHERE 資料編號=$ID";
        $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$studentID','否','宿舍審核','$usrNam','申請遭到拒絕')";
        mysqli_query($link, $update00);
    }
    mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)){
        if($yon == '1'){
            if($option=="住宿" ){//申請項目是住宿或換宿，等到選完房間在處理可容納人數
                $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$studentID','否','宿舍審核','$usrNam','通過住宿申請')";
                mysqli_query($link, $update00);
                echo "<script language='JavaScript'>;location.href='selectroom.php?Acc=$Acc&Ide=$Ide&ID=$usrID&option=$option';</script>;";
            }
            elseif($option=="換宿"){
                $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$studentID','否','宿舍審核','$usrNam','通過換宿申請')";
                mysqli_query($link, $update00);
                echo "<script language='JavaScript'>;location.href='selectroom.php?Acc=$Acc&Ide=$Ide&ID=$usrID&option=$option';</script>;";
            }
            else {//申請項目是退宿，會把該房間可容納人數+1
                
                $sql="UPDATE 學生 SET 宿舍大樓名稱 = NULL,房間號碼=NULL WHERE 學生帳號='$usrID'";
                mysqli_query($link,$sql);

                $selectSql = "SELECT 可容納人數 FROM 宿舍大樓基本資料 WHERE 宿舍大樓名稱='$buildname' AND 房間號碼='$roomnum'";
                $selectResult = mysqli_query($link, $selectSql);
                $row = mysqli_fetch_assoc($selectResult);
                $可容納人數 = $row['可容納人數'];
                $新的可容納人數 = $可容納人數 + 1;
                $updateSql = "UPDATE 宿舍大樓基本資料 SET 可容納人數 = $新的可容納人數 WHERE 宿舍大樓名稱='$buildname' AND 房間號碼='$roomnum'";
                mysqli_query($link, $updateSql);
                
                $update00 = "INSERT INTO 通知(學號,已讀,通知類型,對象姓名,通知內容) VALUE('$studentID','否','宿舍審核','$usrNam','通過退宿申請')";
                mysqli_query($link, $update00);
                echo "<script language='JavaScript'>;alert('儲存成功');location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";
            }
        }else {
            echo "<script language='JavaScript'>;alert('儲存成功');location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";}
    
    }else{
        echo "<script language='JavaScript'>;alert('儲存失敗');location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
        
?>