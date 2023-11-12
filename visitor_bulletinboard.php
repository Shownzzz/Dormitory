<?php 
    include("Fconnection.php");
    $query="SELECT * FROM 留言板 ORDER BY 留言編號 DESC;";
    $query_list=mysqli_query($link,$query);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="student_bulletinboard_use.css" type="text/css"/>
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
        <title>學生留言板</title>
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
                        <a class="nav-link" style = "color:white;" href="">留言板</a>
                    </li>
                </ul>
                <div class = "d-flex change">
                    <a class="nav-link" style = "color:white;" href="enter.php">退出</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id = "pic1" class = "jumbotron jumbotron-fluid">
                <h3 class = "display-1 text-center text_color"><strong>學生宿舍系統</strong></h3>
            </div>
        </div>
        <div class = "container">
            <h1 class="text-center" style = "color:#5151A2; font-weight:bold;background-color:#ECF5FF;">宿舍留言板</h1>
            <p></p>
            <hr>
            <?php
                if(mysqli_num_rows($query_list) > 0)
                {
                    foreach($query_list as $row)
                    {
            ?>
            <div class="container">
                <div class="row rounded-pill justify-content-between" style = "font-weight:bold;background-color:#F0F0F0;">
                    <div class= "col-12"><span class="badge rounded-circle" style = "font-size:30px; background-color:black; color:white;">NEW</span></div>
                    <div class="col-auto rounded-pill offset-1 text-left" style = "background-color:white;font-weight:bold; font-size:26px;"><?php echo $row['標題']; ?></div>
                    <div class ="col-auto align-self-end">
                        <span class="badge badge-pill" style = "background-color:white;font-weight:bold; font-size:20px;"><?php echo $row['姓名']; ?></span>
                    </div>
                    <div class ="col-auto align-self-end">
                        <span class="badge badge-pill" style = "background-color:white;font-weight:bold; font-size:16px;"><?php echo $row['日期']; ?></span>
                    </div>
                    <div class= "col-12"><p></p></div>
                    <div class="col-10 rounded-pill offset-1 text-left" style = "background-color:white;font-weight:bold; font-size:28px;"><?php echo $row['內容']; ?></div>
                    <div class= "col-12"><p></p></div>
                </div>
            </div>
            <hr>
            <?php
                    }
                }
            ?>
        </div>
    </body>
</html>