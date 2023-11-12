<?php 
    include("Fconnection.php");
    $query="SELECT * FROM 留言板";
    $query_list=mysqli_query($link,$query);
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

        <P><h1 class="text-center text-dark">留言板</h1></P>
        <table class="table">
            <thead>
                <tr>
                    <th>留言板編號</th>
                    <th>日期</th>
                    <th>姓名</th>
                    <th>學號</th>
                    <th>標題</th>
                    <th>內容</th>
                </tr>
            </thead>
            <?php
				if(mysqli_num_rows($query_list) > 0)
				{
					foreach($query_list as $row)
					{
			?>
							<tr>
                                <?php $phpID=$row['留言編號'];?>
								<td><?php echo $row['留言編號']; ?></td> 
								<td><?php echo $row['日期']; ?></td>
								<td><?php echo $row['姓名']; ?></td>
								<td><?php echo $row['學號']; ?></td>
								<td><?php echo $row['標題']; ?></td>
								<td><?php echo $row['內容']; ?></td> 
                                <td>
                                    <a href="bulletinboard_edit.php?ID=<?=$phpID?>" class="btn-link"><button type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="bulletinboardsql_delete.php?ID=<?=$phpID?>" class="btn-link"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
							</tr>
			<?php
                    }

                }
            ?>
            </tbody>
        </table>
    </body>
</html>