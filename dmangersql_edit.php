<?php
    include("Fconnection.php");
    $usrName=$_POST["usrName"];
	$usrMail=$_POST["usrMail"];
	$usrPho=$_POST["usrPho"];
	$usrAcc=$_POST["usrAcc"];
	$usrPwd=$_POST["usrPwd"];
	$usrPwdc=$_POST["usrPwdc"];
    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    if($usrPwd!=$usrPwdc){
        echo "<script language='JavaScript'>;alert('密碼不相同');location.href='dmanger_edit.php?Acc=$Acc&Ide=$Ide&ID=$usrAcc';</script>;";
    }
    $usrCheck = "SELECT 舍監帳號 FROM 舍監 WHERE 舍監帳號='$usrAcc';";
    $result=mysqli_query($link,$usrCheck);
    if($result){
        if(mysqli_num_rows($result)>0){
            $sql="UPDATE 舍監 SET 舍監姓名='".$usrName."',連絡電話='".$usrPho."',Email='".$usrMail."',密碼='".$usrPwd."' WHERE 舍監帳號='$usrAcc'";
	        if(!mysqli_query($link,$sql)){
                die("wrong");
            }
            if($Ide=='option2'){
                echo "<script language='JavaScript'>;alert('儲存成功');location.href='dmanger_page.php?Acc=$Acc&Ide=$Ide';</script>;";
            }
            else echo "<script language='JavaScript'>;alert('儲存成功');location.href='system_page.php?Acc=$Acc&Ide=$Ide';</script>;";
        }
        else{
            $usrAdd = "INSERT INTO 舍監(舍監姓名,Email,連絡電話,舍監帳號,密碼) VALUE('$usrName','$usrMail','$usrPho','$usrAcc','$usrPwd')";
	        if(!mysqli_query($link,$usrAdd)){
                die("wrong");
            }
            echo "<script language='JavaScript'>;alert('新增成功');location.href='dmanger_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        }
    }
?>