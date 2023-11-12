<?php
    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="warden_enroll_page_use.css" type="text/css"/>
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
        <title>學生新增頁面</title>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style = "background-color:#0066CCAA;">
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_page.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_apply.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">審核住宿資料 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="building.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">宿舍大樓管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="announcement_list.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">公告消息管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style = "color:white;" href="system_accman.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">帳號管理</a>
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
                <div class = "d-flex change">
                    <a class="nav-link" style = "color:white;" href="enter.php">登出</a>
                </div>
            </div>
        </nav>
        <br><br><br>
            <div class = "jumbotron jumbotron-fluid jumbotron-primary pic2 center">
                <div class = "container">
                <div class="row">
                    <div class="col-2"></div>
                        <div style = "background-color:white;" class="col-4 text-center">

                        <div class="col">
                            <h2></h2>
                        <h2 class="card text-center" style = "font-size:25px; font-weight:bold; color:#5151A2;">&emsp;學生新增&emsp;</h2>
                        <form method = "post" action="studentsql_add.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>" class ="card-body">
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrName" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">姓名</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrID" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">學號</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrGru" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">系級</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrYear" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">學年度</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrMail" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">電子郵件</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrPho" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">電話</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">性別</label>
                                        </div>
                                        </br>
                                        <div class = "row">
                                            <select class="form-control form-control-sm" name="usrSex" aria-label="Default select" required = "required">
                                                <option value="" selected>請選擇性別</option>
                                                <option value="男性">男性</option>
                                                <option value="女性">女性</option>
                                            </select>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="text" name="usrAcc" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">帳號</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="password" name="usrPwd" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">密碼</label>
                                        </div>
                                        <div class="row mb-2 login">
                                            <input class = "col-sm-8" type="password" name="usrPwdc" required="required">
                                            <label for="inputaccount" class=" col-form-label text_label_color text-left">確認密碼</label>
                                        </div>
                                        <br>
                                        <div class="row mb-2 login" style = "text-align:start;">
                                            <button type="submit" class="btn col-sm-3 offset-5" style ="background-color:#5151A2; color:white; font-weight:bold;">新增</button>
                                            
                                        </div>
                                    </form>
                                    
                                    </div>
                </div>
                <div style = "background-color:rgba(255,255,255,0.6);" class="col-4 text-center">
                    <br><br><br><br>
                    <img src="f8da6d7d81af1246.png" width=250px height=250px>       
                </div>
                <div class="col-4"></div>
            </div>
        </div>

    </body>
</html>