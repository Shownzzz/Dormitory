<?php
    include("Fconnection.php");
    $usrAcc=$_GET['Acc'];
    $sql="SELECT * FROM 舍監 WHERE 舍監帳號=$usrAcc;";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="warden_page_use.css" type="text/css"/>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
            crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>舍監管理首頁</title>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg bg-white navbar-dark fixed-top">
                <a class="navbar-brand text-dark" href="/">首頁</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="enter.php">登出</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/Home/Privacy">學生資料 </a>
                        </li>
                    </ul>
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
                                        <h1><span class = "badge rounded-pill" style ="background-color:#5151A2; color:white;"><?php echo $row['舍監姓名']; ?></span></h1>
                                        &emsp;
                                        <h1><span class = "badge rounded-pill" style ="color:#5151A2; font-size:26px"> 舍監</span></h1>
                                    </div>
                                    <br>
                                <h3><span class = "badge rounded-pill" style ="background-color:#5151A2; color:white;"><?php echo $row['Email']; ?></span></h3>
                                </div>
                                <div class = "col-lg-4">
                                    <br><br><br><br>
                                    <a href="dmanger_edit.php?Acc=<?=$row['舍監帳號']?>"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold;">修改資料</button></a>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            </div>
            <br>
            <div class = "row">
                <div class="col-md-6 col-lg-4"> 
                    <div class="card" style = "background-color:#ECF5FF">
                        <div class="card-body">
                            <h4 class="card-title text-center" style = "font-weight:bold;">學生違規紀錄表</h4>
                            <div class = "row">
                                <div class = "col-md-6 d-flex justify-content-around"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">新增</button> </div>
                                <div class = "col-md-6 d-flex justify-content-around"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">修改</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6 col-lg-4"> 
                    <div class="card" style = "background-color:#ECF5FF">
                        <div class="card-body">
                            <h4 class="card-title text-center" style = "font-weight:bold;">留言板</h4>
                            <div class = "row">
                                <div class = "col-md-6 d-flex justify-content-around"><a href="bulletinboard_add.php"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">新增</button></a></div>
                                <div class = "col-md-6 d-flex justify-content-around"><a href="bulletinboard_list.php"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">檢視</button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6 col-lg-4"> 
                    <div class="card" style = "background-color:#ECF5FF">
                        <div class="card-body">
                            <h4 class="card-title text-center" style = "font-weight:bold;">公告消息</h4>
                            <div class = "row">
                                <div class = "col-md-6 d-flex justify-content-around"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">新增</button> </div>
                                <div class = "col-md-6 d-flex justify-content-around"><button class="btn"  style ="background-color:#5151A2; color:white; font-weight:bold;">修改</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
    </body>
</html>