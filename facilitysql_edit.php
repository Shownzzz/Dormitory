<?php
include("Fconnection.php");
$editfacilityNo = $_POST["editfacilityNo"];
$editfacillityName = $_POST["editfacillityName"];
$editfacilityCondition = $_POST["editfacilityCondition"];
$editfacilityQuantity = $_POST["editfacilityQuantity"];
$editfacilitybuilding = $_POST["editfacilitybuilding"];
$editfacilityroomID = $_POST["editfacilityroomID"];
$Ide = $_GET['Ide'];
$Acc = $_GET['Acc'];
$sql = "UPDATE 設備 SET 設備名稱='$editfacillityName',設備狀況='$editfacilityCondition',數量='$editfacilityQuantity' WHERE  設備編號='$editfacilityNo' ";
mysqli_query($link, $sql);
if (mysqli_affected_rows($link)) {
    echo "<script language='JavaScript'>;alert('儲存成功');location.href='facility.php?Acc=$Acc&Building=$editfacilitybuilding&roomID=$editfacilityroomID&Ide=$Ide';</script>;";
} else {
    echo "<script language='JavaScript'>;alert('儲存失敗');location.href='facility.php?Acc=$Acc&Building=$editfacilitybuilding&roomID=$editfacilityroomID&Ide=$Ide';</script>;";
}
