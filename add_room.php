<?php
include("Fconnection.php");
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
//$usrCheck="SELECT * FROM 學生 WHERE 學生帳號=$Acc;";
//$usrCheck="SELECT * FROM 申請住宿的資料 WHERE 學生帳號=$Acc;";
//$usrAll=mysqli_query($link,$usrCheck);
//$result=mysqli_fetch_assoc($usrAll)
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="bulletinboard.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>新增房間</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0066CCAA;">
        <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_page.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_apply.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">審核住宿資料 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="building.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">宿舍大樓管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="announcement_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">公告消息管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_accman.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">帳號管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_progress_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">設備報修</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="notice_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">通知管理 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_manage.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">報修申請管理</a>
                </li>
            </ul>
            <div class="d-flex change">
                <a class="nav-link" style="color:white;" href="enter.php">登出</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="pic1" class="jumbotron jumbotron-fluid">
            <h3 class="display-1 text-center text_color"><strong>學生宿舍管理系統</strong></h3>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center" style="background-color:#ECF5FF; border-bottom:#5151A2 solid 2px;">
                <p></p>
                <h1 class="text-center" style="color:#5151A2; font-weight:bold;">新增房間</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center" style="background-color:#ECF5FF;">
                <p></p>
                <form method="post" action="addsql_room.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>" style="color:#5151A2; font-weight:bold; font-size:20px;">
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">宿舍大樓</label>
                        <br>
                        <div class="col-sm-9" style="margin:auto;">
                            <select class="form-control" name="usrBui" required>
                                <option value="">請選擇大樓</option>
                                <option value="綜合">綜合</option>
                                <option value="學一OA1(男宿)">學一OA1(男宿)</option>
                                <option value="學一OA2(女宿)">學一OA2(女宿)</option>
                                <option value="學一OB(女宿)">學一OB(女宿)</option>
                                <option value="學二OE(男宿)">學二OE(男宿)</option>
                                <option value="學二OF(女宿)">學二OF(女宿)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">房間號碼</label>

                        <br>
                        <div class="col-sm-9" style="margin:auto;">
                            <input type="text" class="form-control" name="usrNum" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">可容納人數</label>
                        <br>
                        <div class="col-sm-9" style="margin:auto;">
                            <input type="text" class="form-control" name="usrCou" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">房間住宿費用</label>
                        <br>
                        <div class="col-sm-9" style="margin:auto;">
                            <input type="text" class="form-control" name="usrFee" required>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </form>
                <p></p>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    &nbsp;
</body>

</html>