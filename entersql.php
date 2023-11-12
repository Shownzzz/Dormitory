<?php
    include("Fconnection.php");
    $usrAcc=$_POST['Acc'];
    $usrPwd=$_POST['Pwd'];
    $value=$_POST['gridRadios'];
    if($value=='option1'){
        $sql="SELECT 學生帳號 FROM 學生 WHERE 學生帳號='$usrAcc' AND 密碼='$usrPwd';";
        $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)==1){
            echo "<script language='JavaScript'>;location.href='student_page.php?Acc=$usrAcc&Ide=$value';</script>;";
        }else{
            echo "<script language='JavaScript'>;alert('登入失敗');location.href='enter.php'</script>;";
        }
    }else if($value == 'option2'){
        $sql="SELECT 舍監帳號 FROM 舍監 WHERE 舍監帳號='$usrAcc' AND 密碼='$usrPwd';";
        $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)==1){
            echo "<script language='JavaScript'>;location.href='dmanger_page.php?Acc=$usrAcc&Ide=$value';</script>;";
        }else{
            echo "<script language='JavaScript'>;alert('登入失敗');location.href='enter.php'</script>;";
        }
    }
    else{
        $sql="SELECT 管理員帳號 FROM 系統管理員 WHERE 管理員帳號='$usrAcc' AND 密碼='$usrPwd';";
        $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)==1){
            echo "<script language='JavaScript'>;location.href='system_page.php?Acc=$usrAcc&Ide=$value';</script>;";
        }else{
            echo "<script language='JavaScript'>;alert('登入失敗');location.href='enter.php'</script>;";
        }
    }
?>