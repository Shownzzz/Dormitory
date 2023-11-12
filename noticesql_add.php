<?php
include("Fconnection.php");
$usrTyp = $_POST["usrTyp"];
$usrNum = $_POST["usrNum"];
$usrWho = $_POST["usrWho"];
$usrCon = $_POST["usrCon"];
$Ide = $_GET['Ide'];
$Acc = $_GET['Acc'];
$sql_student = "SELECT 姓名 FROM 學生 WHERE 學號 = '$usrNum'";
$sql_dmanger = "SELECT 舍監姓名 FROM 舍監 WHERE 舍監帳號 = '$usrNum'";
$result_student = mysqli_query($link, $sql_student);
$result_dmanger = mysqli_query($link, $sql_dmanger);
if ($usrWho == 'student') {
    if ($result_student && mysqli_num_rows($result_student) > 0) {
        $row_student = mysqli_fetch_assoc($result_student);
        $name_student = $row_student['姓名'];
        $usrAdd_student = "INSERT INTO 通知(通知類型,學號,對象姓名,通知內容,已讀) VALUE('$usrTyp','$usrNum','$name_student','$usrCon','否')";
        if (mysqli_query($link, $usrAdd_student)) {
            echo "<script language='JavaScript'>;alert('新增成功');location.href='notice_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        } else {
            echo "<script language='JavaScript'>;alert('失敗');location.href='notice_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        }
    }
    mysqli_free_result($result_student); // 釋放結果集的記憶體資源

} else {
    if ($result_dmanger && mysqli_num_rows($result_dmanger) > 0) {
        $row_dmanger = mysqli_fetch_assoc($result_dmanger);
        $name_dmanger = $row_dmanger['舍監姓名'];
        $usrAdd_dmanger = "INSERT INTO 通知(通知類型,學號,對象姓名,通知內容,已讀) VALUE('$usrTyp','無','$name_dmanger','$usrCon','否')";
        if (mysqli_query($link, $usrAdd_dmanger)) {
            echo "<script language='JavaScript'>;alert('新增成功');location.href='notice_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        } else {
            echo "<script language='JavaScript'>;alert('失敗');location.href='notice_list.php?Acc=$Acc&Ide=$Ide';</script>;";
        }
    }
    mysqli_free_result($result_dmanger); // 釋放結果集的記憶體資源

}
