<?php
include("Fconnection.php");
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
$usrCheck = "SELECT * FROM 學生違規紀錄 WHERE 學生帳號='$Acc';";
$usrAll = mysqli_query($link, $usrCheck);
$usrCheck_bell = "SELECT * FROM 學生 WHERE 學生帳號='$Acc';";
$usrAll_bell = mysqli_query($link, $usrCheck_bell);
$result = mysqli_fetch_assoc($usrAll_bell);

$usrNum = $result['學號'];
$notice = "SELECT COUNT(*) AS count FROM 通知 WHERE 學號 = '$usrNum' AND 已讀 = '否'";
$notice_num = mysqli_query($link, $notice);
$notice_personal = "SELECT * FROM 通知 WHERE 學號 = '$usrNum'";
$notice_personal_list = mysqli_query($link, $notice_personal);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="bulletinboard_list_use.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5d59c158a6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>個人違規紀錄</title>
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
            <h3 class="display-1 text-center text_color"><strong>學生宿舍系統</strong></h3>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center" style="color:#5151A2; font-weight:bold;background-color:#ECF5FF;">個人違規紀錄</h1>
        <table class="table table-striped text-center table-sm table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">帳號</th>
                    <th scope="col">學生</th>
                    <th scope="col">日期</th>
                    <th scope="col">紀錄編號</th>
                    <th scope="col">違規內容</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                if (mysqli_num_rows($usrAll) > 0) {
                    foreach ($usrAll as $row) {
                ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $count; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['學生帳號']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['學生']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['日期']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['紀錄編號']; ?></td>
                            <td class="name" style="vertical-align:middle;"><?php echo $row['違規內容']; ?></td>
                        </tr>
                <?php
                        $count += 1;
                    }
                }
                ?>
            </tbody>
        </table>
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