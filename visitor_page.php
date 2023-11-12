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
        <title>訪客瀏覽</title>
        <?php
            include("Fconnection.php");
            $usrCheck="SELECT * FROM `公告消息`";
            $usrCheck="SELECT * FROM `留言板`";
            $usrAll=mysqli_query($link,$usrCheck);
            $result = mysqli_fetch_assoc($usrAll);

            $textCheck="SELECT * FROM 公告消息 WHERE 公告編號=(SELECT MAX(公告編號) FROM 公告消息) 
                        OR 公告編號=(SELECT MAX(公告編號) FROM 公告消息)-1 ORDER BY 公告編號 DESC";
            $textAll=mysqli_query($link,$textCheck);

            $messageCheck="SELECT * FROM 留言板 WHERE 留言編號=(SELECT MAX(留言編號) FROM 留言板) 
            OR 留言編號=(SELECT MAX(留言編號) FROM 留言板) -1 ORDER BY 留言編號 DESC";
            $messageAll=mysqli_query($link,$messageCheck);
        ?>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style = "background-color:#0066CCAA;">
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="visitor_page.php">首頁</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="visitor_announcement.php">公告消息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="visitor_bulletinboard.php">留言板</a>
                    </li>
                </ul>
                <div class = "d-flex change">
                    <a class="nav-link" style = "color:white;" href="enter.php">退出</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id = "pic1" class = "jumbotron jumbotron-fluid">
                <h1 class = "display-4 text_color"><strong>歡迎使用</strong></h1>
                <h3 class = "display-1 text-center text_color"><strong>學生宿舍系統</strong></h3>
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
                                        <h1><span class = "badge rounded-pill" style ="color:#5151A2; font-size:26px">訪客☎</span></h1>
                                        &emsp;
                                    </div>
                                </div>
                                &emsp;&emsp;&emsp;
                                <div class = "col-lg-4">
                                    <p></p>
                                    <div class = "row justify-content-center">
                                        <a href="visitor_bulletinboard.php"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">留言板</button></a>
                                        &emsp;&emsp;&emsp;
                                        <a href="visitor_announcement.php"><button class="btn float-right" style ="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">公告欄</button></a>
                                    </div>
                                              
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            </div>
            <br>
            <div class = "row">
                <div class="col-md-6 col-lg-6"> 
                    <div class="card" style = "background-color:#ECF5FF">
                        <div class = "card-header">
                            <p></p>
                            <h4 class="card-title text-center" style = "font-weight:bold; color:#5151A2; font-size:26px;">公告消息</h4>
                        </div>
                        <div class = "card-body">
                            <?php
                                if(mysqli_num_rows($textAll) > 0)
                                {
                                    foreach($textAll as $row)
                                    {
                            ?>
                                <div class = "card">
                                    <p></p>
                                    <div class = "card-title" style =" width:460px; margin:auto; border-bottom:solid #5151A2;">
                                        <div class = "row" style = "font-size:18px;">
                                            <span class = "col-6 text-left" style = "font-weight:bold;"><?php echo $row['標題']?></span>
                                            <span class = "col-6 text-right" style = "font-weight:bold;"><?php echo $row['日期']?></span>
                                        </div>
                                    </div>
                                    <div class = "row card-body">
                                        <p class = "card-text">&emsp;&emsp;<?php echo $row['內容']?></p>
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
                    <div class="card" style = "background-color:#ECF5FF">
                        <div class = "card-header">
                            <p></p>
                            <h4 class="card-title text-center" style = "font-weight:bold; color:#5151A2; font-size:26px;">留言板</h4>
                        </div>
                        <div class = "card-body">
                            <?php
                                if(mysqli_num_rows($messageAll) > 0)
                                {
                                    foreach($messageAll as $row)
                                    {
                            ?>
                            <div class = "card">
                                <p></p>
                                <div class = "card-title" style =" width:460px; margin:auto; border-bottom:solid #5151A2;">
                                    <div class = "row" style = "font-size:18px;">
                                        <span class = "col-6 text-left" style = "font-weight:bold;"><?php echo $row['標題']?></span>
                                        <span class = "col-6 text-right" style = "font-weight:bold;"><?php echo $row['日期']?></span>
                                    </div>
                                </div>
                                <div class = "row card-body">
                                    <p class = "card-text">&emsp;&emsp;<?php echo $row['內容']?></p>
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
    <body>    
<html>        