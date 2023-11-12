<?php
    include("Fconnection.php");
    $usrID=$_GET['ID'];
    $Ide=$_GET['Ide'];
    $Acc=$_GET['Acc'];
    $room=$_GET['room'];
    $build=$_GET['build'];
    $option=$_GET['option'];
    
    if($option=="換宿"){
        $selectbuild="SELECT * FROM 學生 WHERE 學生帳號='$usrID'";
        $sqlbuild=mysqli_fetch_assoc(mysqli_query($link,$selectbuild));
        $buildname= $sqlbuild['宿舍大樓名稱'];
        $roomnum= $sqlbuild['房間號碼'];
        echo "宿舍大樓名稱: " . $buildname;
        echo "房間號碼: " . $roomnum;
        $selectSql = "SELECT 可容納人數 FROM 宿舍大樓基本資料 WHERE 宿舍大樓名稱='$buildname' AND 房間號碼='$roomnum'";
        $selectResult = mysqli_query($link, $selectSql);
        $row = mysqli_fetch_assoc($selectResult);
        $可容納人數 = $row['可容納人數'];
        echo "人數:" . $可容納人數;
        $新的可容納人數 = $可容納人數 + 1;
        echo "新人數:" . $新的可容納人數;
        $updateSql = "UPDATE 宿舍大樓基本資料 SET 可容納人數 = $新的可容納人數 WHERE 宿舍大樓名稱='$buildname' AND 房間號碼='$roomnum'";
        mysqli_query($link, $updateSql);
    
        $selectSql = "SELECT 可容納人數 FROM 宿舍大樓基本資料 WHERE 宿舍大樓名稱='$build' AND 房間號碼='$room'";
        $selectResult = mysqli_query($link, $selectSql);
        $row = mysqli_fetch_assoc($selectResult);
        $可容納人數 = $row['可容納人數'];
        $新的可容納人數 = $可容納人數 - 1;
        $updateSql = "UPDATE 宿舍大樓基本資料 SET 可容納人數 = $新的可容納人數 WHERE 宿舍大樓名稱='$build' AND 房間號碼='$room'";
        mysqli_query($link, $updateSql);
    }else{
        $selectSql = "SELECT 可容納人數 FROM 宿舍大樓基本資料 WHERE 宿舍大樓名稱='$build' AND 房間號碼='$room'";
        $selectResult = mysqli_query($link, $selectSql);
        $row = mysqli_fetch_assoc($selectResult);
        $可容納人數 = $row['可容納人數'];
        $新的可容納人數 = $可容納人數 - 1;
        $updateSql = "UPDATE 宿舍大樓基本資料 SET 可容納人數 = $新的可容納人數 WHERE 宿舍大樓名稱='$build' AND 房間號碼='$room'";
        mysqli_query($link, $updateSql);
    }

    $sql="UPDATE 學生 SET 管理員帳號='$Acc',宿舍大樓名稱='$build',房間號碼='$room' WHERE 學生帳號='$usrID'";
    mysqli_query($link,$sql);
    if(mysqli_affected_rows($link)){
        echo "<script language='JavaScript'>;alert('儲存成功');location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";
    }else{
        echo "<script language='JavaScript'>;alert('儲存失敗');location.href='system_apply.php?Acc=$Acc&Ide=$Ide';</script>;";
    }
        
?>