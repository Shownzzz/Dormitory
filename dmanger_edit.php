<?php
include("Fconnection.php");
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
$usrID = $_GET['ID'];
$sql = "SELECT * FROM 舍監 WHERE 舍監帳號='$usrID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$notice_personal = "SELECT * FROM 通知 WHERE 對象姓名 = (SELECT 舍監姓名 FROM 舍監 WHERE 舍監帳號 = '$Acc')";
$notice_personal_list = mysqli_query($link, $notice_personal);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="warden_enroll_page_use.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5d59c158a6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>舍監編輯頁面</title>
</head>

<body>
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
            </ul>
            <div class="d-flex">
                <a class="nav-link change" style="color:white;" href="enter.php">登出</a>
                &nbsp;
                <button type="button" class=" btn btn-link change" style="background-color:rgba(0, 102, 204, 0.05); color:white;" data-bs-toggle="modal" data-bs-target="#NoticeModal">
                    <i class="fas fa-bell"></i> <!-- FontAwesome bell icon -->
                </button>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="jumbotron jumbotron-fluid jumbotron-primary pic2 center">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div style="background-color:white;" class="col-4 text-center">

                    <div class="col">
                        <h2></h2>
                        <h2 class="card text-center" style="font-size:25px; font-weight:bold; color:#5151A2;">&emsp;編輯資料&emsp;</h2>
                        <form method="post" action="dmangersql_edit.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>" class="card-body">
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="text" name="usrName" value=<?php echo $row['舍監姓名'] ?> required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">姓名</label>
                            </div>
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="text" name="usrMail" value=<?php echo $row['Email'] ?> required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">電子郵件</label>
                            </div>
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="text" name="usrPho" value=<?php echo $row['連絡電話'] ?> required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">電話</label>
                            </div>
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="text" name="usrAcc" readonly="readonly" value=<?php echo $row['舍監帳號'] ?> readonly="readonly" required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">帳號</label>
                            </div>
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="password" name="usrPwd" value=<?php echo $row['密碼'] ?> required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">密碼</label>
                            </div>
                            <div class="row mb-2 login">
                                <input class="col-sm-8" type="password" name="usrPwdc" value=<?php echo $row['密碼'] ?> required="required">
                                <label for="inputaccount" class=" col-form-label text_label_color text-left">確認密碼</label>
                            </div>
                            <br>
                            <div class="row mb-2 login" style="text-align:start;">
                                <button type="submit" class="btn col-sm-3 offset-5" style="background-color:#5151A2; color:white; font-weight:bold;">儲存</button>

                            </div>
                        </form>

                    </div>
                </div>
                <div style="background-color:rgba(255,255,255,0.6);" class="col-4 text-center">
                    <br><br><br><br>
                    <img src="f8da6d7d81af1246.png" width=250px height=250px>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

</body>

</html>

<!-- 通知Modal -->
<div class="modal fade" id="NoticeModal" tabindex="-1" aria-labelledby="NoticeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="NoticeModalLabel">通知欄</h2>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped text-center table-sm table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">通知類型</th>
                            <th scope="col">學號</th>
                            <th scope="col">姓名</th>
                            <th scope="col">通知內容</th>
                            <th scope="col">已讀</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($notice_personal_list) > 0) {
                            foreach ($notice_personal_list as $row) {
                        ?>
                                <tr>
                                    <td style="vertical-align:middle;"><?php echo $row['通知類型']; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $row['學號']; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $row['對象姓名']; ?></td>
                                    <td class="name" style="vertical-align:middle;"><?php echo $row['通知內容']; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $row['已讀']; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="dmanger_notice.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn btn-primary">通知頁面</button></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>

<!-- javascript for 回覆Modal -->
<script>
    var noticeModal = document.getElementById('NoticeModal')
    noticeModal.addEventListener('show.bs.modal', function(event) {

    })
</script>