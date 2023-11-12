<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="enter_page_use.css" type="text/css"/>
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
        <title>宿舍管理登入頁面</title>
    </head>

    <body>
        <br><br><br><br><br><p></p>
            <div class = "jumbotron jumbotron-fluid jumbotron-primary pic2 center">
            <div class = "container">
                <div class="row">
                    <div class="col-2"></div>
                        <div  style = "background-color:white;" class="col-4 text-center">
                        <p></p>
                        <form method="post" action ="entersql.php">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">帳號</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAccount3" placeholder="請輸入帳號" name="Acc" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">密碼</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="請輸入密碼" name="Pwd" required>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-10 text-left">身分別</legend>
                            <div class="col-md-9">
                                <div class="form-check col-sm-10">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        學生身分
                                    </label>
                                </div>
                                <div class="form-check col-sm-10">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        舍監身分
                                    </label>
                                </div>
                                <div class="form-check col-sm-10">    
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                    <label class="form-check-label" for="gridRadios3">
                                        系統身分
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-outline-primary col-sm-5">登入</button>
                        <button onclick="redirectToPage()" class="btn btn-outline-primary col-sm-5">訪客瀏覽</button>
                        <p></p>
                    </form>
                </div>
                <div style = "background-color:rgba(255,255,255,0.6);" class="col-4 text-center">
                    <br><br>
                    <img src="f8da6d7d81af1246.png" width=250px height=250px>       
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        &nbsp;
            </div>

    </body>
</html>
<script>
function redirectToPage() {
  window.location.href = "visitor_page.php";
}
</script>