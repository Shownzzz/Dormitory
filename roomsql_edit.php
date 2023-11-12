<?php
include("Fconnection.php");
$editbuilding = $_POST["editbuilding"];
$editroomID = $_POST["editroomID"];
$editcapacity = $_POST["editcapacity"];
$editfee = $_POST["editfee"];
$Ide = $_GET['Ide'];
$Acc = $_GET['Acc'];
$sql = "UPDATE 宿舍大樓基本資料 SET 宿舍大樓名稱='$editbuilding',房間號碼='$editroomID',可容納人數='$editcapacity',房間住宿費用='$editfee' WHERE 宿舍大樓名稱='$editbuilding' AND 房間號碼='$editroomID' ";
mysqli_query($link, $sql);
if (mysqli_affected_rows($link)) {
    echo "<script language='JavaScript'>;alert('儲存成功');location.href='building.php?Acc=$Acc&Ide=$Ide';</script>;";
} else {
    echo "<script language='JavaScript'>;alert('儲存失敗');location.href='building.php?Acc=$Acc&Ide=$Ide';</script>;";
}
