<?php
    include("Fconnection.php");

    $usrAcc=$_POST["usrAcc"];
    $usrPwd=$_POST["usrPwd"];
    $usrNum=$_POST["usrNum"];
    $usrNam=$_POST["usrNam"];
    $usrSex=$_POST["usrSex"];
    $usrMai=$_POST["usrMai"];
    $usrPho=$_POST["usrPho"];
    $usrYea=$_POST["usrYea"];
    $usrLev=$_POST["usrLev"];
    $usrCheck = "SELECT 學生帳號 FROM 學生 WHERE 學生帳號='$usrAcc';";
    $result=mysqli_query($link,$usrCheck);
    if($result){
        if(mysqli_num_rows($result)>0){
            echo "<script language='JavaScript'>alert('帳號重複');location.href='add_student.php'</script>"; 
        }
        else{
            $usrAdd = "INSERT INTO 學生(學生帳號,密碼,學號,姓名,性別,Email,連絡電話,學年度,系級) VALUE('$usrAcc','$usrPwd','$usrNum','$usrNam','$usrSex','$usrMai','$usrPho','$usrYea','$usrLev')";
        if(!mysqli_query($link,$usrAdd)){
            die("wrong");
        }
        header('Location: add_student.php'); 
        }
    }


?>