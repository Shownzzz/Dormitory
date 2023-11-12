<?php
    include("Fconnection.php");
    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    //$usrCheck="SELECT * FROM 學生 WHERE 學生帳號=$Acc;";
    //$usrCheck="SELECT * FROM 申請住宿的資料 WHERE 學生帳號=$Acc;";
    //$usrAll=mysqli_query($link,$usrCheck);
    //$result=mysqli_fetch_assoc($usrAll)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="sample_style.css" type="text/css" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
            crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous"></script>
        <title>註冊學生帳號</title>
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
                        <a class="nav-link" style = "color:white;" href="repair_manage.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">報修申請管理</a>
                    </li>
                </ul>
                <div class = "d-flex change">
                    <a class="nav-link" style = "color:white;" href="enter.php">登出</a>
                </div>
            </div>
        </nav>
        <P><h1 class="text-center text-dark">學生帳號註冊</h1></P>
        <div class="container-fluid">
            <div class="row border">
                <div class="col-2"></div>
                    <div class="col-4 text-center">
                        <p></p>
                        <form method = "post" action="addsql_student.php">
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">帳號</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usrAcc" placeholder="學生帳號" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputaccount" class="col-sm-2 col-form-label">密碼</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="usrPwd" placeholder="密碼" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputaccount" class="col-sm-2 col-form-label">學號</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usrNum" placeholder="學號" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputaccount" class="col-sm-2 col-form-label">姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usrNam" placeholder="姓名" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputaccount" class="col-sm-2 col-form-label">性別</label>
                                <div class="col-sm-10">
                                <select class="form-select" name="usrSex" aria-label="Default select" required>
                                    <option value="" selected>請選擇性別</option>
                                    <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                </select>
                                </div>
                            </div>
                        <p></p>
                    </div>
                    <div class="col-4 text-center">
                        <p></p>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="usrMai" placeholder="信箱" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputphone" class="col-sm-2 col-form-label">電話</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usrPho" placeholder="電話" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputyear" class="col-sm-2 col-form-label">學年度</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control" name="usrYea" placeholder="學年度" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputlevel" class="col-sm-2 col-form-label">系級</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usrLev" placeholder="系級" required>
                                </div>
                            </div>
                            <div class="text-end"><button type="submit" class="btn btn-primary">新增</button></div>
                        </form>
                        <p></p>
                    </div>
                <div class="col-2"></div>
            </div>
        </div>
        &nbsp;
    </body>
</html>