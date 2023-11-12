<?php
include("Fconnection.php");
$usrAcc = $_GET['Acc'];
$value = $_GET['Ide'];
$query = "SELECT * FROM 學生";
$query_list = mysqli_query($link, $query);
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
    <title>學生名單</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0066CCAA;">
        <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_page.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_apply.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">審核住宿資料 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="building.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">宿舍大樓管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="announcement_list.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">公告消息管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_accman.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">帳號管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_progress_list.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">設備報修</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="notice_list.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">通知管理 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_manage.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">報修申請管理</a>
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
        <h1 class="text-center" style="color:#5151A2; font-weight:bold;background-color:#ECF5FF;">學生名單</h1>
        <a href="student_add.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>" class="btn-link"><button type="button" class="btn col-sm-1 offset-11" style="background-color:#5151A2; color:white; font-weight:bold;">新增學生</button></a>

        <p></p>
        <table class="table table-striped text-center table-sm table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">學生姓名</th>
                    <th scope="col">學號</th>
                    <th scope="col">宿舍大樓名稱</th>
                    <th scope="col">房號</th>
                    <th scope="col">性別</th>
                    <th scope="col">Mail</th>
                    <th scope="col">電話</th>
                    <th scope="col">帳號</th>
                    <th scope="col">密碼</th>
                    <th scope="col">功能</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_list) > 0) {
                    foreach ($query_list as $row) {
                ?>
                        <tr>
                            <?php $phpID = $row['學生帳號']; ?>
                            <td style="vertical-align:middle;"><?php echo $row['姓名']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['學號']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['宿舍大樓名稱']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['房間號碼']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['性別']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Email']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['連絡電話']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['學生帳號']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['密碼']; ?></td>
                            <td style="vertical-align:middle;">
                                <a href="student_edit.php?Acc=<?= $usrAcc ?>&ID=<?= $phpID ?>&Ide=<?= $value ?>" class="btn-link"><button type="button" class="btn btn-primary">編輯</button></a>
                                <a href="studentsql_delete.php?Acc=<?= $usrAcc ?>&ID=<?= $phpID ?>&Ide=<?= $value ?>" class="btn-link"><button type="button" class="btn btn-danger">刪除</button></a>
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
s
</html>