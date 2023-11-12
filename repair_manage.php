<?php 
    include("Fconnection.php");
    $Acc=$_GET['Acc'];
    $Ide=$_GET['Ide'];
    $query="SELECT * FROM 報修";
    $query_list=mysqli_query($link,$query);
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link rel="stylesheet" href="bulletinboard_list_use.css" type="text/css"/>
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
        <title>報修申請管理</title>
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
        <div class="container">
            <div id = "pic1" class = "jumbotron jumbotron-fluid">
                <h3 class = "display-1 text-center text_color"><strong>學生宿舍管理系統</strong></h3>
            </div>
        </div>
        <div class = "container">
            <h1 class="text-center" style = "color:#5151A2; font-weight:bold;background-color:#ECF5FF;">報修申請管理</h1>
        <table class="table table-striped text-center table-sm table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">報修編號</th>
                    <th scope="col">申請日期</th>
                    <th scope="col">設備編號</th>
                    <th scope="col">設備名稱</th>
                    <th scope="col">登記學生</th>
                    <th scope="col">學號</th>
                    <th scope="col">大樓</th>
                    <th scope="col">房間號碼</th>
                    <th scope="col">結案與否</th>
                    <th>
                        <a href="repair_manage_history.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>" class="btn-link"><button type="button" class="btn btn-outline-primary">報修紀錄</button></a>
                    </th>
                </tr>
                <tr>
                    <th colspan="10">回覆內容</th>
                </tr>
            </thead>
            <tbody>
            <?php
				if(mysqli_num_rows($query_list) > 0)
				{
					foreach($query_list as $row)
					{
                        if($row['結案與否']=='是')continue;
			?>
							<tr>
                                <?php $equipID=$row['報修編號'];?>
                                <?php $replyID=$row['姓名'];?>
                                <?php $usrNum=$row['學號'];?>
								<td style = "vertical-align:middle;"><?php echo $row['報修編號']; ?></td> 
								<td style = "vertical-align:middle;"><?php echo $row['申請日期']; ?></td> 
								<td style = "vertical-align:middle;"><?php echo $row['設備編號']; ?></td> 
								<td style = "vertical-align:middle;"><?php echo $row['設備名稱']; ?></td>
								<td style = "vertical-align:middle;"><?php echo $row['姓名']; ?></td>
								<td style = "vertical-align:middle;"><?php echo $row['學號']; ?></td>
								<td style = "vertical-align:middle;"><?php echo $row['宿舍大樓名稱']; ?></td>
								<td style = "vertical-align:middle;"><?php echo $row['房間號碼']; ?></td>
								<td style = "vertical-align:middle;"><?php echo $row['結案與否']; ?></td>
                                <td style = "vertical-align:middle;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ReplyModal" data-number="<?php echo $equipID ?>" data-usrNum="<?php echo $usrNum?>" data-name="<?php echo $replyID?>" data-bs-whatever=" & 報修編號: <?php echo $equipID?>">回覆</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#FinishModal" data-number="<?php echo $equipID ?>" data-bs-whatever="結案確認">結案</button>
                                </td>
							</tr>
                            <tr>
                                <td style = "vertical-align:middle;" colspan="10">
                                    <?php
                                        if($row['回覆內容'] == NULL)echo "目前尚未回覆";
                                        else echo $row['回覆內容'];
                                    ?>
                                </td>
                            </tr>
			<?php
                    }

                }
            ?>
            </tbody>
        </table>
        </div>
    </body>
</html>

<!-- 回覆Modal -->
<div class="modal fade" id="ReplyModal" tabindex="-1" aria-labelledby="ReplyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form method="post" action="repairsql_manage.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">
            <div class="modal-header">
                <h5 class="modal-title" id="ReplyModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="hidden" class="form-conrtrol" name="usrNum">
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">回覆對象:</label>
                        <input type="text" class="form-control" id="recipient-name" name="usrNam" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">回覆內容:</label>
                        <textarea class="form-control" id="message-text" name="content"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="equNum">
                <input type="hidden" value='0' class="form-control" name="isFinish">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <button type="submit" class="btn btn-primary">發送</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- javascript for 回覆Modal -->
<script>
    var replyModal = document.getElementById('ReplyModal')
    replyModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var name = button.getAttribute('data-name') 
    var number = button.getAttribute('data-number')
    var usrNum = button.getAttribute('data-usrNum')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = replyModal.querySelector('.modal-title')
    var modalBodyInput = replyModal.querySelector('.modal-body input')
    var modalheaderInput = replyModal.querySelector('.modal-header input')
    var modalfooterInput = replyModal.querySelector('.modal-footer input')
    
    modalTitle.textContent = '回覆 ' + name + recipient
    modalBodyInput.value = name
    modalheaderInput.value = usrNum
    modalfooterInput.value = number
    })
</script>

<!-- 結案Modal -->
<div class="modal fade" id="FinishModal" tabindex="-1" aria-labelledby="FinishModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FinishModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                報修確認結案?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <form method="post" action="repairsql_manage.php?Acc=<?=$Acc?>&Ide=<?=$Ide?>">
                    <input type="hidden" class="form-control" name="equNum">
                    <input type="hidden" value='' class="form-control" name="content">
                    <input type="hidden" value='1' class="form-control" name="isFinish">
                    <button type="submit" class="btn btn-danger">結案</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- javascript for 結案Modal -->
<script>
    var finishModal = document.getElementById('FinishModal')
    finishModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var number = button.getAttribute('data-number') 
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = finishModal.querySelector('.modal-title')
    var modalBodyInput = finishModal.querySelector('.modal-footer input')
    
    modalTitle.textContent =  recipient 
    modalBodyInput.value = number
    })
</script>