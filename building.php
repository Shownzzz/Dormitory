<?php
include("Fconnection.php");
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
$usrCheck = "SELECT * FROM 宿舍大樓基本資料 ORDER BY 宿舍大樓名稱,房間號碼;";
$query_list = mysqli_query($link, $usrCheck);
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="warden_list_use.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>宿舍大樓房間清單</title>
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
        <p></p>
        <h1 class="text-center" style="color:#5151A2; font-weight:bold;background-color:#ECF5FF;">宿舍大樓房間清單</h1>
        <a href="add_room.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>" class="btn-link">
            <button type="button" class="btn col-sm-1 offset-11" style="background-color:#5151A2; color:white; font-weight:bold;">新增房間</button>
        </a>
        <p></p>
        <table class="table table-striped text-center table-sm table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">宿舍大樓名稱</th>
                    <th scope="col">房間號碼</th>
                    <th scope="col">可容納人數</th>
                    <th scope="col">房間住宿費用</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_list) > 0) {
                    foreach ($query_list as $row) {
                        $Building = $row['宿舍大樓名稱'];
                        $roomID = $row['房間號碼'];
                ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['宿舍大樓名稱']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['房間號碼']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['可容納人數']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['房間住宿費用']; ?></td>
                            <td style="vertical-align:middle;">
                                <a href="facility.php?Acc=<?= $Acc ?>&Building=<?= $Building ?>&roomID=<?= $roomID ?>&Ide=<?= $Ide ?>" class="btn-link"><button type="button" class="btn btn-info">設備</button></a>
                                <a href="room_edit.php?Acc=<?= $Acc ?>&Building=<?= $Building ?>&roomID=<?= $roomID ?>&Ide=<?= $Ide ?>" class="btn-link"><button type="button" class="btn btn-info">編輯</button></a>
                                <a href="deletesql_room.php?Acc=<?= $Acc ?>&Building=<?= $Building ?>&roomID=<?= $roomID ?>&Ide=<?= $Ide ?>" class="btn-link"><button type="button" class="btn btn-danger">刪除</button></a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>