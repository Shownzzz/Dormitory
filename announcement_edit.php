<?php
include("Fconnection.php");
$usrID = $_GET['ID'];
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
$sql = "SELECT * FROM 公告消息 WHERE 公告編號='$usrID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
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
    <title>留言板新增</title>
</head>

<body>
    <?php
    if ($Ide == 'option3') {
    ?>
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
                        <a class="nav-link" style = "color:white;" href="notice_list.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">通知管理 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="repair_manage.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">報修申請管理</a>
                    </li>
                </ul>
                <div class="d-flex change">
                    <a class="nav-link" style="color:white;" href="enter.php">登出</a>
                </div>
            </div>
        </nav>
    <?php
    } else {
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0066CCAA;">
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="dmanger_page.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="illegal_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">學生違規紀錄表 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="announcement_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">公告消息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="bulletinboard_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">留言板</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="browse.php?Acc=<? $Acc ?>&Ide=<?= $Ide ?>">宿舍房間人員</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="repair_progress_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">設備報修</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="notice_list.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">通知管理 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="repair_manage.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">報修申請管理</a>
                    </li>
                </ul>
                <div class="d-flex change">
                    <a class="nav-link" style="color:white;" href="enter.php">登出</a>
                </div>
            </div>
        </nav>
    <?php
    }
    ?>
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
                <h1 class="text-center" style="color:#5151A2; font-weight:bold;">編輯公告消息</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center" style="background-color:#ECF5FF;">
                <p></p>
                <form method="post" action="announcementsql_edit.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>&ID=<?= $usrID ?>" style="color:#5151A2; font-weight:bold; font-size:20px;">
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">標題</label>
                        <br>
                        <div class="col-sm-10" style="margin:auto;">
                            <input type="text" class="form-control" name="usrTit" value=<?php echo $row['標題'] ?> required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">內容</label>
                        <div class="col-sm-10" style="margin:auto;">
                            <textarea rows="7" type="textarea" class="form-control" name="usrCon" required><?php echo $row['內容'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn offset-3" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">儲存</button>
                        <button type="reset" class="btn  offset-1" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">清除</button>
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