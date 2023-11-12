<?php
$Acc = $_GET['Acc'];
$Ide = $_GET['Ide'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="bulletinboard.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <title>通知新增</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#0066CCAA;">
        <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_page.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_apply.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">審核住宿資料 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="building.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">宿舍大樓管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="announcement_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">公告消息管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="system_accman.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">帳號管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_progress_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">設備報修</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="notice_list.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">通知管理 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="repair_manage.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>">報修申請管理</a>
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
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center" style="background-color:#ECF5FF; border-bottom:#5151A2 solid 2px;">
                <p></p>
                <h1 class="text-center" style="color:#5151A2; font-weight:bold;">~新增通知~</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-center" style="background-color:#ECF5FF;">
                <p></p>
                <form method="post" action="noticesql_add.php?Acc=<?= $Acc ?>&Ide=<?= $Ide ?>" style="color:#5151A2; font-weight:bold; font-size:20px;">
                    <!-- <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">日期</label>
                            <br>
                            <div class="col-sm-10" style = "margin:auto;"> 
                                <input type="Date" class="form-control" name="usrDate" placeholder="日期" required>
                            </div>
                        </div> -->
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">通知類型</label>
                        <div class="col-sm-9" style="margin:auto;">
                            <select class="form-control" name="usrTyp" required>
                                <option value="宿舍費用催繳">宿舍費用催繳</option>
                                <option value="維修完成">維修完成</option>
                                <option value="報修回覆">報修回覆</option>
                                <!-- 在這裡添加更多選項 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">通知對象</label>
                        <div class="col-sm-9" style="margin:auto;">
                            <select class="form-control" name="usrWho" id="usrWhoSelect" required>
                                <option value="student">學生</option>
                                <option value="dmanger">舍監</option>
                                <!-- 在這裡添加更多選項 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label" id="usrNumLabel">學號</label>
                        <br>
                        <div class="col-sm-9" style="margin:auto;">
                            <input type="text" class="form-control" name="usrNum" id="usrNumInput" placeholder="學號" required>
                        </div>
                    </div>

                    <script>
                        // 監聽選擇身分的變更事件
                        document.getElementById('usrWhoSelect').addEventListener('change', function() {
                            var selectedValue = this.value; // 取得選擇的身分值

                            // 根據選擇的身分值來更改下方學號的內容
                            if (selectedValue === 'student') {
                                document.getElementById('usrNumLabel').textContent = '學號';
                            } else if (selectedValue === 'dmanger') {
                                document.getElementById('usrNumLabel').textContent = '舍監\n帳號';
                            }
                            // 可以在這裡添加更多身分對應的判斷和更改內容的程式碼
                        });
                    </script>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-3 col-form-label">通知內容</label>
                        <div class="col-sm-9" style="margin:auto;">
                            <textarea rows="7" type="textarea" class="form-control" name="usrCon" placeholder="通知內容" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn offset-3" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">新增</button>
                        <a href="notice_list.php" class="btn-link offset-1"><button type="button" class="btn" style="background-color:#5151A2; color:white; font-weight:bold; width:125px; height:40px;">清除</button></a>
                    </div>
                </form>
                <p></p>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    &nbsp;
</body>

</html>