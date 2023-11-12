<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="student_page_use.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5d59c158a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>學生首頁</title>
    <?php
    include("Fconnection.php");
    $Acc = $_GET['Acc'];
    $Ide = $_GET['Ide'];

    $usrCheck = "SELECT * FROM 學生 WHERE 學生帳號='$Acc';";
    $usrAll = mysqli_query($link, $usrCheck);
    $result = mysqli_fetch_assoc($usrAll);

    $usrNum = $result['學號'];
    $notice = "SELECT COUNT(*) AS count FROM 通知 WHERE 學號 = '$usrNum' AND 已讀 = '否'";
    $notice_num = mysqli_query($link, $notice);
    $notice_personal = "SELECT * FROM 通知 WHERE 學號 = '$usrNum'";
    $notice_personal_list = mysqli_query($link, $notice_personal);

    $textCheck = "SELECT * FROM 公告消息 WHERE 公告編號=(SELECT MAX(公告編號) FROM 公告消息) 
                        OR 公告編號=(SELECT MAX(公告編號) FROM 公告消息)-1 ORDER BY 公告編號 DESC";
    $textAll = mysqli_query($link, $textCheck);

    $messageCheck = "SELECT * FROM 留言板 WHERE 留言編號=(SELECT MAX(留言編號) FROM 留言板) 
            OR 留言編號=(SELECT MAX(留言編號) FROM 留言板) -1 ORDER BY 留言編號 DESC";
    $messageAll = mysqli_query($link, $messageCheck);
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0066CCAA;">
        <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="student_page.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="data_violation.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">學生違規紀錄表 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="data_announcement.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">公告消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="student_bulletinboard.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">留言板</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="apply_repair.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">設備報修</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="apply_dormitory.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>">宿舍申請</a>
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
    <div class="container">
        <div id="pic1" class="jumbotron jumbotron-fluid">
            <h1 class="display-4 text_color"><strong>歡迎使用</strong></h1>
            <h3 class="display-1 text-center text_color"><strong>學生宿舍系統</strong></h3>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            if ($notice_num) {
                $row = mysqli_fetch_assoc($notice_num);
                $count = $row['count'];
                if ($count > 0) {
            ?>
                    <div id="alertContainer" class="alert alert-primary d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-bell"></i>
                        <div>&nbsp;你目前有<?php echo $count; ?>則通知未讀，請盡快到通知頁面查看</div>
                    </div>
                <?php
                } else {
                ?>
                    <div id="alertContainer" class="alert alert-primary d-flex align-items-center" role="alert">
                        <i class="fa-solid fa-bell"></i>
                        <div>&nbsp;你目前沒有未讀通知</div>
                    </div>
            <?php
                }
            } else {
                // 發生錯誤，處理錯誤情況
                echo "查詢通知數量失敗";
            }
            ?>

            <script>
                // 取得警告元素
                var alertElement = document.getElementById('alertContainer');

                // 設定計時器，在 5 秒後隱藏警告元素
                setTimeout(function() {
                    alertElement.parentNode.removeChild(alertElement);
                }, 5000);
            </script>
            <div class="col-md-12">
                <div class="card" style="background-color:#ECF5FF;">
                    &emsp;
                    <h2 class="card-title" style="font-weight:bold;">&emsp;個人資料</h2>
                    <div class="row">
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <img src="f1.png" style="display:block; width:150px; height:150px;">
                        <h2>&emsp;</h2>
                        <div class="col-lg-4">
                            <h3></h3>
                            <div class="row">
                                &emsp;
                                <h1><span class="badge rounded-pill" style="background-color:#5151A2; color:white;"><?php echo $result['姓名']; ?></span></h1>
                                &emsp;
                                <h1><span class="badge rounded-pill" style="color:#5151A2; font-size:26px">學生</span></h1>
                            </div>
                            <br>
                            <h3><span class="badge rounded-pill" style="background-color:#5151A2; color:white;"><?php echo $result['Email']; ?></span></h3>
                            <br>
                            <h3><span class="badge rounded-pill" style="background-color:#5151A2; color:white;">
                                    <?php
                                    if ($result['房間號碼']) {
                                        echo $result['宿舍大樓名稱'], "\t", $result['房間號碼'];
                                    } else echo "目前沒有房間";
                                    ?>
                                </span></h3>
                        </div>
                        &emsp;&emsp;&emsp;
                        <div class="col-lg-4">
                            <p></p>
                            <div class="row justify-content-center">
                                <a href="student_bulletinboard.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">留言板</button></a>
                                &emsp;&emsp;&emsp;
                                <a href="data_announcement.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">公告欄</button></a>
                            </div>
                            <br>
                            <div class="row row justify-content-center">
                                <a href="data_violation.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">違規紀錄</button></a>
                                &emsp;&emsp;&emsp;
                                <a href="data_student.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">修改資料</button></a>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <a href="apply_dormitory.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">宿舍申請</button></a>
                                &emsp;&emsp;&emsp;
                                <a href="apply_repair.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">設備報修</button></a>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card" style="background-color:#ECF5FF">
                    <div class="card-header">
                        <p></p>
                        <h4 class="card-title text-center" style="font-weight:bold; color:#5151A2; font-size:26px;">公告消息</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (mysqli_num_rows($textAll) > 0) {
                            foreach ($textAll as $row) {
                        ?>
                                <div class="card">
                                    <p></p>
                                    <div class="card-title" style=" width:460px; margin:auto; border-bottom:solid #5151A2;">
                                        <div class="row" style="font-size:18px;">
                                            <span class="col-6 text-left" style="font-weight:bold;"><?php echo $row['標題'] ?></span>
                                            <span class="col-6 text-right" style="font-weight:bold;"><?php echo $row['日期'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row card-body">
                                        <p class="card-text">&emsp;&emsp;<?php echo $row['內容'] ?></p>
                                    </div>
                                    <p></p>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card" style="background-color:#ECF5FF">
                    <div class="card-header">
                        <p></p>
                        <h4 class="card-title text-center" style="font-weight:bold; color:#5151A2; font-size:26px;">留言板</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (mysqli_num_rows($messageAll) > 0) {
                            foreach ($messageAll as $row) {
                        ?>
                                <div class="card">
                                    <p></p>
                                    <div class="card-title" style=" width:460px; margin:auto; border-bottom:solid #5151A2;">
                                        <div class="row" style="font-size:18px;">
                                            <span class="col-6 text-left" style="font-weight:bold;"><?php echo $row['標題'] ?></span>
                                            <span class="col-6 text-right" style="font-weight:bold;"><?php echo $row['日期'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row card-body">
                                        <p class="card-text">&emsp;&emsp;<?php echo $row['內容'] ?></p>
                                    </div>
                                    <p></p>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                <a href="student_notice.php?Acc=<?php echo $Acc ?>&Ide=<?php echo $Ide ?>&usrNum=<?php echo $usrNum ?>"><button class="btn btn-primary">通知頁面</button></a>
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