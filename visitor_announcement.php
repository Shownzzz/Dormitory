<?php 
    include("Fconnection.php");
    $query="SELECT * FROM 公告消息 Order By 公告編號 DESC";
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
        <title>公告消息</title>
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
                <h3 class = "display-1 text-center text_color"><strong>學生宿舍系統</strong></h3>
            </div>
        </div>
        <div class = "container">
            <h1 class="text-center" style = "color:#5151A2; font-weight:bold;background-color:#ECF5FF;">公告消息</h1>
        <table class="table table-striped text-center table-sm table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">公告編號</th>
                    <th scope="col">日期</th>
                    <th scope="col">標題</th>
                    <th scope="col">內容</th>
                </tr>
            </thead>
            <tbody>
            <?php
				if(mysqli_num_rows($query_list) > 0)
				{
					foreach($query_list as $row)
					{
			?>
							<tr>
                                <?php $phpID=$row['公告編號'];?>
								<td style = "vertical-align:middle;"><?php echo $row['公告編號']; ?></td> 
								<td style = "vertical-align:middle;"><?php echo $row['日期']; ?></td> 
								<td style = "vertical-align:middle;"><?php echo $row['標題']; ?></td>
								<td class = "name" style = "vertical-align:middle;"><?php echo $row['內容']; ?></td>
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