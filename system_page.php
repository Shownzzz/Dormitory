<?php
    include("Fconnection.php");
    $usrAcc=$_GET['Acc'];
    $value=$_GET['Ide'];
    $sql="SELECT * FROM 系統管理員 WHERE 管理員帳號=$usrAcc;";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="student_page_use.css" type="text/css"/>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>系統管理員首頁</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style = "background-color:#0066CCAA;">
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_page.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_apply.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>">審核住宿資料 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="building.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>">宿舍大樓管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="announcement_list.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>&ID=<?=$row['管理員帳號']?>">公告消息管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_accman.php?Acc=<?=$row['管理員帳號']?>&Ide=<?=$value?>">帳號管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="repair_progress_list.php?Acc=<?= $usrAcc ?>&Ide=<?= $value ?>">設備報修</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="notice_list.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>">通知管理 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="repair_manage.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>">報修申請管理</a>
                    </li>
                </ul>
                <div class = "d-flex change">
                    <a class="nav-link" style = "color:white;" href="enter.php">登出</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id = "pic1" class = "jumbotron jumbotron-fluid">
                <h1 class = "display-4 text_color"><strong>歡迎使用</strong></h1>
                <h3 class = "display-1 text-center text_color"><strong>學生宿舍管理系統</strong></h3>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class = "card" style = "background-color:#ECF5FF;">
                            &emsp;
                            <h2 class="card-title" style = "font-weight:bold;">&emsp;個人資料</h2>
                            <div class="row">
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <img src = "f1.png" style = "display:block; width:150px; height:150px;">
                                <h2>&emsp;</h2>
                                <div class = "col-lg-4">
                                    <h3></h3>
                                    <div class = "row">
                                        &emsp;
                                        &emsp;
                                        <h1><span class = "badge rounded-pill" style ="color:#5151A2; font-size:26px">系統管理員⚜</span></h1>
                                    </div>
                                    <br>
                                </div>
                                &emsp;&emsp;&emsp;
                                <div class = "col-lg-4">
                                    <p></p>
                                    <div class = "row justify-content-center">
                                        <a href="system_apply.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">審核住宿資料</button></a>
                                        &emsp;&emsp;&emsp;
                                        <a href="building.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">宿舍大樓管理</button>
                                    </div>
                                    <br>
                                    <div class = "row row justify-content-center">
                                        <a href="announcement_list.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>&ID=<?=$row['管理員帳號']?>"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">公告消息管理</button></a>
                                        &emsp;&emsp;&emsp;
                                        <a href="system_accman.php?Acc=<?=$row['管理員帳號']?>&Ide=<?=$value?>"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">帳號管理</button></a>
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <a href="notice_list.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>&ID=<?=$row['管理員帳號']?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">發送通知管理</button></a>
                                        &emsp;&emsp;&emsp;
                                        <a href="repair_manage.php?Acc=<?=$usrAcc?>&Ide=<?=$value?>&ID=<?=$row['管理員帳號']?>"><button class="btn float-right" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">報修申請管理</button></a>
                                    </div>
                                    <br>           
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            </div>
    </body>
</html>