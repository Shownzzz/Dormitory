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
        <title></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" href="/">WebTest</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/Home/Privacy">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <P><h1 class="text-center text-dark">舍監註冊</h1></P>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center border">
                    <p></p>
                    <form method = "post" action="dmangersql_register.php">
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usrName" placeholder="姓名" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usrMail" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">電話</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usrPho" placeholder="電話" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">帳號</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="usrAcc" placeholder="帳號" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputaccount" class="col-sm-2 col-form-label">密碼</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="usrPwd" placeholder="密碼" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputaccount" class="col-sm-2 col-form-label">確認密碼</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="usrPwdc" placeholder="密碼" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">註冊</button>
                        <a href="dmanger_list.php" class="btn-link"><button type="button" class="btn btn-primary">列表</button></a>
                    </form>
                    <p></p>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        &nbsp;
    </body>
</html>

